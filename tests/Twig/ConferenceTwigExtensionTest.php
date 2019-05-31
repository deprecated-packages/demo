<?php declare(strict_types=1);

namespace App\Tests\Twig;

use Twig\Extension\ExtensionInterface;
// phpunit70
use App\Twig\ConferenceTwigExtension;
use PHPUnit\Framework\TestCase;

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
        ['name' => 'Docker', 'language' => 'ru'],
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

        $russianTalks = $filterCallable($this->talks, 'ru');
        $this->assertCount(1, $russianTalks);

        $englishTalks = $filterCallable($this->talks, 'en');
        $this->assertCount(1, $englishTalks);
    }

    /**
     * @expectedException \App\Exception\InvalidLanguageException
     * @expectedExceptionMessageRegExp 'Language "\w+" is invalid, pick one of "ru", "en"'
     */
    public function testInvalidLanguage()
    {
        $filters = $this->conferenceTwigExtension->getFilters();
        $this->assertCount(1, $filters);

        $filterCallable = $filters[0]->getCallable();
        $filterCallable($this->talks, 'cs');
    }
}
