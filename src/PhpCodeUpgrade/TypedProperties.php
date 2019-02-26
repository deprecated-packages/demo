<?php declare(strict_types=1);

namespace App\PhpCodeUpgrade;

use App\ValueObjects\AnotherClass;

// php74
final class TypedProperties
{
    /**
     * @var AnotherClass|null
     */
    public $anotherClass = null;

    /**
     * @var string
     */
    public $string;

    /**
     * @var object
     */
    public $object;

    /**
     * @var bool
     */
    public $name = 'not_a_bool';

    /**
     * @var iterable
     */
    public $iterable = [1, 2, 3];

    public $withoutDocBlock;

    public function run(string $value)
    {
        $this->withoutDocBlock = $value;
    }
}
