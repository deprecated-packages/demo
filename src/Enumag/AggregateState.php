<?php declare(strict_types=1);

namespace App\Enumag;

use App\Enumag\Contract\AggregateStateInterface;

final class AggregateState implements AggregateStateInterface
{
    public function apply(): self
    {
        return $this->with(
            function () {
                $someCode = 5;
            }
        );
    }

    public function with(callable $callable)
    {
    }
}
