<?php

namespace App\PhpCodeUpgrade;

// php71
// php72
// php74
final class CountOnNullable
{
    // https://3v4l.org/KiGFs - @todo show for php71 in config and php74 in config + autodetection
    public function countList(?array $items)
    {
        return count($items);
    }
}
