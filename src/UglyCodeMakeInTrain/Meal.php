<?php declare(strict_types=1);

namespace App\UglyCodeMakeInTrain;

final class Meal
{
    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
