<?php declare(strict_types=1);

namespace Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\Closure;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Expr\Variable;
use PhpParser\Node\Identifier;
use PhpParser\Node\Stmt\ClassMethod;
use PhpParser\Node\Stmt\Return_;
use Rector\Exception\ShouldNotHappenException;
use Rector\NodeTypeResolver\Node\Attribute;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class UnwrapRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [ClassMethod::class];
    }

    /**
     * @param ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        if (! $this->isName($node, 'apply')) {
            return null;
        }

        // "return $x;"
        $returnNode = $node->stmts[0];
        if (! $returnNode instanceof Return_) {
            throw new ShouldNotHappenException();
        }

        // "$this->with()"
        $methodCallNode = $returnNode->expr;
        if (! $methodCallNode instanceof MethodCall) {
            throw new ShouldNotHappenException();
        }
        if (! $this->isName($methodCallNode, 'with')) {
            throw new ShouldNotHappenException();
        }

        // first argument should be closure
        $callableNode = $methodCallNode->args[0]->value;
        if (! $callableNode instanceof Closure) {
            throw new ShouldNotHappenException();
        }

        // move all nested lines to class method statements
        $node->stmts = $callableNode->stmts;

        // @todo, what should happend with return type "self" with no "return" node?
        // pick one:
        // 1. either remove return type declaration
        // $node->returnType = new Identifier('void');
        // 2. or use "return $this" in the end
        $node->stmts[] = new Return_(new Variable('this'));

        return $node;
    }

    public function getDefinition(): RectorDefinition
    {
    }
}
