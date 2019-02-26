<?php

namespace App\PhpCodeUpgrade;

// php71
// php72
// php74
final class FunctionMagicCode
{
    private $property;

    public function run()
    {
        $this->property = '';
        $this->property[] = 1;
    }

    public function sort(array $items)
    {
        // level: Wordpress!
        $map_xmlns_func = create_function('$p,$n', '$xd = "xmlns"; if(strlen($n[0])>0) $xd .= ":{$n[0]}"; return "{$xd}=\"{$n[1]}\"";');

        usort($items, $map_xmlns_func);

        return $items;
    }
}
