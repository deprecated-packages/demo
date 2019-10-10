<?php declare(strict_types=1);

namespace App\PhpCodeUpgrade;

// show: https://3v4l.org/v1pdC
// run: vendor/bin/rector process src/PhpCodeUpgrade/Regular.php --set php73 -n
final class Regular
{
    private const NON_COMPAT_PATTERN = '#[\w-()]#';

    public function winnerFunction(string $value)
    {
        return preg_match("#[\w-()]#", $value);
    }

    public function matchConstant(string $value)
    {
        return preg_match_all(self::NON_COMPAT_PATTERN, $value);
    }
}
