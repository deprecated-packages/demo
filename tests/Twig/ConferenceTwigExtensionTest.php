<?php declare(strict_types=1);

namespace App\Tests\Twig;

use Twig\Extension\ExtensionInterface;
// phpunit70
use App\Twig\ConferenceTwigExtension;
use PHPUnit\Framework\TestCase;

// run: vendor/bin/rector process tests --set phpunit70 -n
final class ConferenceTwigExtensionTest extends TestCase
{
    /**
     * @var ExtensionInterface
     */
    private $conferenceTwigExtension;

    /**
     * @var mixed[][]
     */
    private $talks = [
        ['name' => 'Docker', 'language' => 'uk'],
        ['name' => 'PHP 7.4 types', 'language' => 'en'],
    ];

    protected function setUp()
    {
        $this->conferenceTwigExtension = new ConferenceTwigExtension();
    }

    public function testFilterByLangaugeFunction(): void
    {
        $filters = $this->conferenceTwigExtension->getFilters();
        $this->assertCount(1, $filters);

        $filterCallable = $filters[0]->getCallable();

        $ukrainianTalks = $filterCallable($this->talks, 'uk');
        $this->assertCount(1, $ukrainianTalks);

        $englishTalks = $filterCallable($this->talks, 'en');
        $this->assertCount(1, $englishTalks);
    }

    public function testInvalidLanguage()
    {
        $this->expectException('App\Exception\InvalidLanguageException');
        $this->expectExceptionMessageRegExp('\'Language "\w+" is invalid, pick one of "uk", "en"\'');
        $filters = $this->conferenceTwigExtension->getFilters();
        $this->assertCount(1, $filters);

        $filterCallable = $filters[0]->getCallable();
        $filterCallable($this->talks, 'cs');
    }
}
