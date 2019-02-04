<?php declare(strict_types=1);

namespace App\Code;

// PHP 7.2
final class EachLast
{
    public function iteratre()
    {
        while (list($module) = each($module_list)) {
        }

        while (list($key, $callback) = each($callbacks)) {
            // comment
        }
        $module_list = ['a', 'b'];

        while (list($module) = each($module_list)) {
            echo $module;
        }
    }
}
