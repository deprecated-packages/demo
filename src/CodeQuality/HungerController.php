<?php declare(strict_types=1);

namespace App\CodeQuality;

// code-quality
final class HungerController
{
    private $myMeal;
    private $myFriendsMeal;

    public function getNearestMeal()
    {
         if (null !== $this->myMeal) {
             return $this->myMeal;
         }

         if (null !== $this->myFriendsMeal) {
             return $this->myFriendsMeal;
         }

        return null;
    }

    public function whatShouldIEatNow($meal)
    {
        if (! ($meal !== 'dinner')) {
            return 'lets have lunch';
        }

        $meal = 'breakfast it it';
        return $meal;
    }
}
