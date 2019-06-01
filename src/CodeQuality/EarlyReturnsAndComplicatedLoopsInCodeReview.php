<?php declare(strict_types=1);

namespace App\CodeQuality;

// code-quality
final class EarlyReturnsAndComplicatedLoopsInCodeReview
{
    public function getDefalutValue($value)
    {
        return $value === null ? 10 : $value;
    }

    public function isCourseFull(array $visitors)
    {
        if (count($visitors)) {
            return true;
        }

        return false;
    }

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
