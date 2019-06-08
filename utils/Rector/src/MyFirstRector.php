<?php declare(strict_types=1);

namespace Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use PhpParser\Node\Identifier;
use PHPStan\Analyser\Scope;
use PHPUnit\Framework\Constraint\Attribute;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\RectorDefinition;

final class MyFirstRector extends AbstractRector
{
    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [Node\Stmt\ClassMethod::class];
    }

    /**
     * @param Node\Stmt\ClassMethod $node
     */
    public function refactor(Node $node): ?Node
    {
        $variablesPassedToMysqlQuery = $this->getVariablenamesInMysqlQuery($node);

        /** @var Node\Expr\Variable[] $variablesWithPossibleSqlInjection */
        $this->traverseNodesWithCallable($node->stmts, function (Node $node) use ($variablesPassedToMysqlQuery) {
            if (! $node instanceof Node\Expr\Variable) {
                return null;
            }

            if (! $this->isNames($node, $variablesPassedToMysqlQuery)) {
                return null;
            }

            $parentNode = $node->getAttribute(AttributeKey::PARENT_NODE);
            if (! $parentNode instanceof Node\Expr\Assign) {
                return null;
            }

            // $where = "WHERE name = $name";
            // ↓
            // $where = "WHERE name = escape($name)";
            if ($parentNode->expr instanceof Node\Scalar\Encapsed) {
                foreach ($parentNode->expr->parts as $key => $part) {
                    if ($part instanceof Node\Expr\Variable) {
                        $parentNode->expr->parts[$key] = new Node\Expr\FuncCall(
                            new Node\Name('escape'), [$part]
                        );
                    }
                }
            }
        });

        return null;
    }

    public function getDefinition(): RectorDefinition
    {
        // for docs
    }

    private function getVariablenamesInMysqlQuery(Node $node): array
    {
        /** @var Node\Expr\FuncCall[] $mysqlQueryFuncCalls */
        $mysqlQueryFuncCalls = $this->betterNodeFinder->find($node->stmts, function ($node) {
            if (!$node instanceof Node\Expr\FuncCall) {
                return null;
            }

            return $this->isName($node, 'mysql_query');
        });

        // extract variable names from mysql_query
        $variablesPassedToMysqlQuery = [];
        foreach ($mysqlQueryFuncCalls as $mysqlQueryFuncCall) {
            foreach ($mysqlQueryFuncCall->args as $arg) {
                $argValue = $arg->value;
                if ($argValue instanceof Node\Expr\BinaryOp\Concat) {
                    if ($argValue->left instanceof Node\Expr\Variable) {
                        $variablesPassedToMysqlQuery[] = $this->getName($argValue->left);
                    }

                    if ($argValue->right instanceof Node\Expr\Variable) {
                        $variablesPassedToMysqlQuery[] = $this->getName($argValue->right);
                    }
                }
            }
        }
        return $variablesPassedToMysqlQuery;
    }
}
