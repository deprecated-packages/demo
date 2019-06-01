<?php declare(strict_types=1);

namespace App\CodeQuality;

// run: vendor/bin/rector process src/CodeQuality/AnEarlyReturns.php --set code-quality -n
final class AnEarlyReturns
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
