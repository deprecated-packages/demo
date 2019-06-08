<?php declare(strict_types=1);

namespace App\PhpCodeUpgrade;

use App\ValueObjects\AnotherClass;

// run: vendor/bin/rector process src/PhpCodeUpgrade/TypedProperties.php --set php74 -n
// check "rector.yaml" update config with "php7.4"

// run: vendor/bin/rector proces src/PhpCodeUpgrade/TypedProperties.php --set type-declaratoin
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
     * @var string
     */
    public $surname;

    /**
     * @var bool
     */
    public $name = 'not_a_bool';

    /**
     * @var iterable
     */
    public $iterable = [1, 2, 3];

    public function run()
    {
        if ($this->string !== '') {
            return $this->string;
        }

        return $this->surname;
    }

    public function anonymous()
    {
        $value = function($name) {
            return $name . ', lets party!';
        };

        return $value('People');
    }
}
