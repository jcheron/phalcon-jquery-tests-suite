<?php

/*
 +--------------------------------------------------------------------------+
 | Zephir Language                                                          |
 +--------------------------------------------------------------------------+
 | Copyright (c) 2013-2016 Zephir Team and contributors                     |
 +--------------------------------------------------------------------------+
 | This source file is subject the MIT license, that is bundled with        |
 | this package in the file LICENSE, and is available through the           |
 | world-wide-web at the following url:                                     |
 | http://zephir-lang.com/license.html                                      |
 |                                                                          |
 | If you did not receive a copy of the MIT license and are unable          |
 | to obtain it through the world-wide-web, please send a note to           |
 | license@zephir-lang.com so we can mail you a copy immediately.           |
 +--------------------------------------------------------------------------+
*/

namespace Zephir\Operators\Other;

use Zephir\Operators\BaseOperator;
use Zephir\CompilationContext;
use Zephir\Expression;
use Zephir\Expression\Builder\BuilderFactory;
use Zephir\CompilerException;
use Zephir\CompiledExpression;
use Zephir\Builder\FunctionCallBuilder;
use Zephir\Builder\Operators\CastOperatorBuilder;

/**
 * RangeExclusive
 *
 * Exclusive range operator
 */
class RangeExclusiveOperator extends BaseOperator
{
    /**
     * @param array $expression
     * @param CompilationContext $compilationContext
     * @return CompiledExpression
     * @throws CompilerException
     */
    public function compile(array $expression, CompilationContext $compilationContext)
    {
        if (!isset($expression['left'])) {
            throw new CompilerException("Invalid 'left' operand for 'irange' expression", $expression['left']);
        }

        if (!isset($expression['right'])) {
            throw new CompilerException("Invalid 'right' operand for 'irange' expression", $expression['right']);
        }

        $exprBuilder = BuilderFactory::getInstance();

        /**
         * Implicit type coercing
         */
        $castBuilder = $exprBuilder->operators()->cast('array', $exprBuilder->statements()
            ->functionCall('range', array($expression['left'], $expression['right'])));

        $expression = new Expression($castBuilder->build());
        $expression->setReadOnly($this->_readOnly);
        return $expression->compile($compilationContext);
    }
}
