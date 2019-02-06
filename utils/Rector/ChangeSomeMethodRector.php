<?php declare(strict_types=1);

namespace Utils\Rector;

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
        // TODO: Implement getNodeTypes() method.
    }

    /**
     * Process Node of matched type
     */
    public function refactor(Node $node): ?Node
    {
        // TODO: Implement refactor() method.
    }

    public function getDefinition(): RectorDefinition
    {
        // TODO: Implement getDefinition() method.
    }
}