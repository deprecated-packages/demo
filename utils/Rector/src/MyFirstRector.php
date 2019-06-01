<?php declare(strict_types=1);

namespace Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class MyFirstRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [MethodCall::class];
    }

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isName($node, 'renameMe')) {
            return null;
        }

        $node->name = new Identifier('newName');

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // for docs
    }
}
