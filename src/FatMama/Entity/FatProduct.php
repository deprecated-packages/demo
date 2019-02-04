<?php declare(strict_types=1);

namespace App\FatMama\Entity;

final class FatProduct
{
    /**
     * @var string
     */
    public $name;

    public function getName(): string
    {
        return $this->name;
    }
}
