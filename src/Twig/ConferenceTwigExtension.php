<?php declare(strict_types=1);

namespace App\Twig;

use App\Exception\InvalidLanguageException;
use Twig_Extension;
use Twig_Filter;

// run: vendor/bin/rector process src/Twig --set twig-underscore-to-namespace -n
final class ConferenceTwigExtension extends Twig_Extension
{
    /**
     * @return Twig_Filter[]
     */
    public function getFilters(): array
    {
        return [
            new Twig_Filter('filter_by_language', function (array $items, string $language) {
                $this->ensureLanguageIsValid($language);

                return array_filter($items, function ($item) use ($language) {
                    return $item['language'] === $language;
                });
            })
        ];
    }

    private function ensureLanguageIsValid(string $language): void
    {
        $allowedLanguages = ['uk', 'en'];

        if (in_array($language, $allowedLanguages, true)) {
            return;
        }

        throw new InvalidLanguageException(sprintf(
            'Language "%s" is invalid, pick one of "%s"',
            $language,
            implode('", "', $allowedLanguages)
        ));
    }
}
