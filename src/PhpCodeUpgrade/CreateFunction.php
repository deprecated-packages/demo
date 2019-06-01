<?php

namespace App\PhpCodeUpgrade;

// run: vendor/bin/rector process src/PhpCodeUpgrade/CreateFunction.php --set php72 -n
final class CreateFunction
{
    public function sort(array $items)
    {
        // level: Wordpress!
        $map_xmlns_func = create_function('$p,$n', '$xd = "xmlns"; if(strlen($n[0])>0) $xd .= ":{$n[0]}"; return "{$xd}=\"{$n[1]}\"";');

        usort($items, $map_xmlns_func);

        return $items;
    }
}
