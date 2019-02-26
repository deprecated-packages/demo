<?php declare(strict_types=1);

namespace App\VeryOldPhpCode;

// code-quality
final class TypeDeclarations
{
    private $value;

    private $usedValue = 5;

    /**
     * @var string
     */
    private $rank = 5;

    public function someMethod()
    {
        $this->value = 'abc';

        if ('show_html') { ?> Let me <br> this <strong>piece</strong> of code ! <?php }

        $value = 125;

        return $value;
    }

    public function getDefalutValue($value)
    {
        return $value === null ? 10 : $value;
    }

    public function isCourseFull(array $visitors)
    {
        if (count($visitors)) {
            return true;
        }

        return false;
    }

    public function tooComplexArrayVerification(array $items, string $name)
    {
        foreach ($items as $item) {
            if ($item === $name) {
                return true;
            }
        }

        return false;
    }

    public function isNullOrValue($oldToNewFunctions, string $currentFunction)
    {
        foreach ($oldToNewFunctions as $oldFunction => $newFunction) {
            if ($currentFunction === $oldFunction) {
                return $newFunction;
            }
        }

        return null;
    }
}
