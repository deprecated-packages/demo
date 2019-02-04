<?php declare(strict_types=1);

namespace App\Code;

use Nette\Utils\Strings;

// PHP 7.3
final class PregChange
{
    public function sort($item)
    {
        // @todo refactor to constant
        return (bool) Strings::match($item, '#[\w-()]');
    }
}
