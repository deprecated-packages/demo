<?php declare(strict_types=1);

namespace App\DeadCode;

// run: vendor/bin/rector process src/DeadCode --set dead-code -n
final class RottenCode
{
    private $property;
    private const SOME_CONSTANT = 5;

    public function dig(array $items)
    {
        foreach ($items as $key => $value) {
            $value = $value;
            $result = $value;
        }

        $item = [
            1 => 'A',
            1 => 'B'
        ];

        return $item;

        echo 'I am not here';
    }

    private function skip()
    {
        return 10;
    }
}
