<?php declare(strict_types=1);

namespace App\Code;

// PHP 7.0
// PHP 7.1
final class LongCode
{
    private $property;

    public function getPath()
    {
        return dirname(dirname(__FILE__));
    }

    public function run()
    {
        $this->property = '';
        $this->property[] = 1;
    }
}


function someFunction() {
    $array = [1, 2, 3];
    $someString = '';
    foreach ($array as $item) {
        $someString[] = $item;
    }
}
