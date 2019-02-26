<?php declare(strict_types=1);

namespace App\CodeQuality;

// code-quality
final class HungerController
{
    private $first;
    private $second;

    public function getNearestMeal()
    {
         if (null !== $this->first) {
             return $this->first;
         }

         if (null !== $this->second) {
             return $this->second;
         }

        return null;
    }

    public function whatShouldIEatNow($meal)
    {
        if (! ($meal !== 'dinner')) {
            return 'lets have lunch';
        }

        return 'breakfast it it';
    }
}
