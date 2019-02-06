<?php declare(strict_types=1);

namespace Utils\Rector;

use App\UglyCodeMakeInTrain\Visitor;
use PhpParser\Node;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class ChangeSomeMethodRector extends AbstractRector
{
    /**
     * List of nodes this class checks, classes that implement @see \PhpParser\Node
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Node\Expr\New_::class];
    }

    /**
     * @param Node\Expr\New_ $node
     * Process Node of matched type
     */
    public function refactor(Node $node): ?Node
    {
        if ($this->isType($node, Visitor::class) === false) {
            return null;
        }

        $surname = $node->args[0]->value;
        $name = $node->args[1]->value;

        $node->args[1]->value = $surname;
        $node->args[0]->value = $name;

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // not needed for demo
    }
}
