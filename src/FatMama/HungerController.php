<?php declare(strict_types=1);

namespace App\FatMama;

// code-quality
final class HungerController
{
    private $stomatchContent;
    private $plateContent;

    public function getNearestMeal()
    {
         if (null !== $this->stomatchContent) {
             return $this->stomatchContent;
         }

         if (null !== $this->plateContent) {
             return $this->plateContent;
         }

        return null;
    }

    public function amIHungry($stomachContents)
    {
        if (is_array($stomachContents) && empty($stomachContents)) {
            return 'yes';
        }

        return 'yes';
    }

    public function whatShouldIEatNow($meal)
    {
        if (! ($meal !== 'dinner')) {
            return 'lets have lunch';
        }

        return 'any other meal is fine';
    }
}
