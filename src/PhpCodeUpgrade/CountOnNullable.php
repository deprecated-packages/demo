<?php

namespace App\PhpCodeUpgrade;

// show: https://3v4l.org/KiGFs
// run: vendor/bin/rector process src/PhpCodeUpgrade/CountOnNullable.php --set php71 -n
// check: "rector.yaml" config for PHP version
final class CountOnNullable
{

    public function countList(?array $items)
    {
        return count($items);
    }
}
