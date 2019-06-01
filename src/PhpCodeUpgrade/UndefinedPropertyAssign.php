<?php

namespace App\PhpCodeUpgrade;

// php71
// php72
// php74
final class UndefinedPropertyAssign
{
    private $property;

    public function run()
    {
        $this->property = '';
        $this->property[] = 1;
    }
}
