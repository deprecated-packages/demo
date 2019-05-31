<?php declare(strict_types=1);

namespace App\PhpCodeUpgrade;

use Nette\Utils\Strings;

// php73
final class Regular
{
    private const NON_COMPAT_PATTERN = '#[\w-()]#';

    public function winnerFunction(string $value)
    {
        return preg_match("#[\w-()]#", $value);
    }

    public function matchStaticCall(string $value)
    {
        return Strings::match($value, "#[\w-()]#");
    }

    public function matchConstant(string $value)
    {
        return preg_match_all(self::NON_COMPAT_PATTERN, $value);
    }
}


