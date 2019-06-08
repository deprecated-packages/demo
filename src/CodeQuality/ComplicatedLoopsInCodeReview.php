<?php declare(strict_types=1);

namespace App\CodeQuality;

// run: vendor/bin/rector process src/CodeQuality/ComplicatedLoopsInCodeReview.php --set code-quality -n
final class ComplicatedLoopsInCodeReview
{
    public function tooComplexArrayVerification(array $items, string $name)
    {
        foreach ($items as $item) {
            if ($item === $name) {
                return true;
            }
        }

        return false;
    }

    public function isNullOrValue($oldToNewFunctions, string $currentFunction)
    {
        foreach ($oldToNewFunctions as $oldFunction => $newFunction) {
            if ($currentFunction === $oldFunction) {
                return $newFunction;
            }
        }

        return null;
    }
}
