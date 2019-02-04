<?php declare(strict_types=1);

// @todo use for gifs
// --level code-quality
// --level php70
// --level php71
// --level php74

namespace App;

final class SomeDemoService
{
    // @todo should be autocompleted by php74
    private $value;

    public function someMethod()
    {
        $this->value = 'abc';

        $value = 125;

        return $value;
    }

    public function getName()
    {
        return 'Tom' . " & " . 'Jerry';
    }

    public function getDefalutValue($value)
    {
        return $value === null ? 10 : $value;
    }

    public function isCourseFull(?array $visitors)
    {
        if (count($visitors)) {
            return true;
        }

        return false;
    }
}
