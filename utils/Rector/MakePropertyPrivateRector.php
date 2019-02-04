<?php declare(strict_types=1);

namespace Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Stmt\Property;
use Rector\PhpParser\Node\Maintainer\VisibilityMaintainer;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class MakePropertyPrivateRector extends AbstractRector
{
    /**
     * @var VisibilityMaintainer
     */
    private $visibilityMaintainer;

    public function __construct(VisibilityMaintainer $visibilityMaintainer)
    {
        $this->visibilityMaintainer = $visibilityMaintainer;
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Property::class];
    }

    /**
     * Process Node of matched type
     * @param Property $node
     */
    public function refactor(Node $node): ?Node
    {
        if ($node->isPrivate()) {
            return null;
        }

        $this->visibilityMaintainer->replaceVisibilityFlag($node, 'private');

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
        // ...
    }
}