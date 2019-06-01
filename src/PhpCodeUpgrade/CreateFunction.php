<?php

namespace App\PhpCodeUpgrade;

// php71
// php72
// php74
final class CreateFunction
{
    // https://3v4l.org/KiGFs - @todo show for php71 in config and php74 in config + autodetection
    public function countOnNullable(?array $items)
    {
        return count($items);
    }

    public function sort(array $items)
    {
        // level: Wordpress!
        $map_xmlns_func = create_function('$p,$n', '$xd = "xmlns"; if(strlen($n[0])>0) $xd .= ":{$n[0]}"; return "{$xd}=\"{$n[1]}\"";');

        usort($items, $map_xmlns_func);

        return $items;
    }
}
