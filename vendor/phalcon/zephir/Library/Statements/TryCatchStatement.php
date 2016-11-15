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

namespace Zephir\Statements;

use Zephir\CompilationContext;
use Zephir\CompilerException;
use Zephir\Expression\Builder\BuilderFactory;
use Zephir\Expression\Builder\Operators\BinaryOperator;
use Zephir\StatementsBlock;
use Zephir\Builder\StatementsBlockBuilder;
use Zephir\Builder\Operators\BinaryOperatorBuilder;
use Zephir\Builder\Statements\IfStatementBuilder;
use Zephir\Builder\VariableBuilder;
use Zephir\Statements\IfStatement;

/**
 * TryCatchStatement
 *
 * Try/Catch statement the same as in PHP
 */
class TryCatchStatement extends StatementAbstract
{
    /**
     * @param CompilationContext $compilationContext
     */
    public function compile(CompilationContext $compilationContext)
    {
        $codePrinter = $compilationContext->codePrinter;

        $compilationContext->insideTryCatch++;
        $currentTryCatch = ++$compilationContext->currentTryCatch;

        $codePrinter->outputBlankLine();
        $codePrinter->output('/* try_start_' . $currentTryCatch . ': */');
        $codePrinter->outputBlankLine();

        if (isset($this->_statement['statements'])) {
            $st = new StatementsBlock($this->_statement['statements']);
            $st->compile($compilationContext);
        }

        $codePrinter->outputBlankLine();
        $codePrinter->output('try_end_' . $currentTryCatch . ':');

        /**
         * If 'try' is the latest statement add a 'dummy' statement to avoid compilation errors
         */
        $codePrinter->outputBlankLine();

        $compilationContext->insideTryCatch--;

        if (isset($this->_statement['catches'])) {
            /**
             * Check if there was an exception
             */
            $codePrinter->output('if (EG(exception)) {');
            $codePrinter->increaseLevel();

            $exprBuilder = BuilderFactory::getInstance();

            foreach ($this->_statement['catches'] as $catch) {
                if (isset($catch['variable'])) {
                    $variable = $compilationContext->symbolTable->getVariableForWrite($catch['variable']['value'], $compilationContext, $catch['variable']);
                    if ($variable->getType() != 'variable') {
                        throw new CompilerException('Only dynamic variables can be used to catch exceptions', $catch['exception']);
                    }
                } else {
                    $variable = $compilationContext->symbolTable->getTempVariableForWrite('variable', $compilationContext, $compilationContext);
                }

                $compilationContext->backend->copyOnWrite($variable, 'EG(exception)', $compilationContext);

                /**
                 * @TODO, use a builder here
                 */
                $variable->setIsInitialized(true, $compilationContext, $catch);
                $variable->setMustInitNull(true);

                /**
                 * Check if any of the classes in the catch block match the thrown exception
                 */
                foreach ($catch['classes'] as $class) {
                    $ifCheck = $exprBuilder->statements()->ifX()
                        ->setCondition(
                            $exprBuilder->operators()->binary(
                                BinaryOperator::OPERATOR_INSTANCEOF,
                                $exprBuilder->variable($variable->getName()),
                                $exprBuilder->variable($class['value'])
                            )
                        )
                        ->setStatements($exprBuilder->statements()->block(array_merge(
                            array($exprBuilder->statements()->rawC('zend_clear_exception(TSRMLS_C);')),
                            isset($catch['statements']) ? $catch['statements'] : array()
                        )));

                    $ifStatement = new IfStatement($ifCheck->build());
                    $ifStatement->compile($compilationContext);
                }

                if ($variable->isTemporal()) {
                    $variable->setIdle(true);
                }
            }

            $codePrinter->decreaseLevel();
            $codePrinter->output('}');
        } else {
            $codePrinter->output('zend_clear_exception(TSRMLS_C);');
        }
    }
}
