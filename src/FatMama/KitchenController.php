<?php declare(strict_types=1);

namespace App\FatMama;

// code-quality
final class KitchenController
{
    public function stealMeal(string $policePosition)
    {
        if (in_array(strtolower($policePosition), ['toilet'], true)) {
                return 'food';
            }

        return 'jail';
    }

    public function defaultHealthyFood()
    {
        $meals = ['fat chicken', 'healthy chicken', 'fat 25 healthy chickends'];

        $healthMeals = [];
        foreach ($meals as $meal) {
           if (file_exists($meal)) {
                $healthMeals[] = $meal;
            }
        }

       return $healthMeals;
    }
}
