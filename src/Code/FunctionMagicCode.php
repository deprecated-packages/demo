<?php declare(strict_types=1);

namespace App\Code;

// PHP 7.2
final class FunctionMagicCode
{
    public function sort(array $items)
    {
        // level: Wordpress
        $map_xmlns_func = create_function('$p,$n', '$xd = "xmlns"; if(strlen($n[0])>0) $xd .= ":{$n[0]}"; return "{$xd}=\"{$n[1]}\"";');


        usort($items, $map_xmlns_func);

        return $items;
    }
}
