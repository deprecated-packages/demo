<?php declare(strict_types=1);

namespace App\UglyCodeMakeInTrain;

final class Meetup
{
    public function create()
    {
        $visitors = [];
        $visitors[] = new Visitor('Votruba', 'Tom');
        $visitors[] = new Visitor('Prokeš', 'Jan');
        $visitors[] = new Visitor('Grudl', 'David');

        $food = [];
        $food[] = new Meal('bagetky');
        $food[] = new Meal('rohlík');
        $food[] = new Meal('pivo');

        $this->createSpaceForVisitors($visitors, $food);
    }

    private function createSpaceForVisitors(array $visitors, array $food)
    {
        // in progress
    }
}