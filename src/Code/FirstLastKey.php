<?php declare(strict_types=1);

namespace App\Code;

// PHP 7.3
final class FirstLastKey
{
    public function getFirstItem($items)
    {
        reset($items);
        $firstKey = key($items);

        return $items[$firstKey];
    }
}
