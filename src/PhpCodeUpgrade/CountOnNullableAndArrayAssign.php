<?php

namespace App\PhpCodeUpgrade;

// show: https://3v4l.org/KiGFs
// run: vendor/bin/rector process src/PhpCodeUpgrade/CountOnNullableAndArrayAssign.php --set php71 -n
// check: "rector.yaml" config for PHP version
final class CountOnNullableAndArrayAssign
{
    public function countList(?array $items)
    {
        return count($items);
    }

    private $property;

    public function run()
    {
        $this->property = '';
        $this->property[] = 1;
    }
}
