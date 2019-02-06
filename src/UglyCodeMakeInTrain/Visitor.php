<?php declare(strict_types=1);

namespace App\UglyCodeMakeInTrain;

final class Visitor
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    public function __construct(string $name, string $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }
}
