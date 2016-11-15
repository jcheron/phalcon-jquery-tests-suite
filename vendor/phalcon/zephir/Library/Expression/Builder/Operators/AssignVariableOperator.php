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
namespace Zephir\Expression\Builder\Operators;

use Zephir\Expression\Builder\AbstractBuilder;

/**
 * Class AssignVariableOperator
 * @package Zephir\Builder\Operators
 */
class AssignVariableOperator extends AbstractOperator
{
    // =
    const OPERATOR_ASSIGN = 'assign';

    // +=
    const OPERATOR_ADD = 'add-assign';

    // -=
    const OPERATOR_SUB = 'sub-assign';

    // *=
    const OPERATOR_MUL = 'mul-assign';

    // /=
    const OPERATOR_DIV = 'div-assign';

    // .=
    const OPERATOR_CONCAT = 'concat-assign';

    // %=
    const OPERATOR_MOD = 'mod-assign';


    private $variable;
    private $operator = self::OPERATOR_ASSIGN;
    private $expression;

    /**
     * @param null $variable
     * @param AbstractBuilder|null $expression
     */
    public function __construct($variable = null, AbstractBuilder $expression = null)
    {
        if ($variable !== null) {
            $this->setVariable($variable);
        }

        if ($expression !== null) {
            $this->setExpression($expression);
        }
    }


    /**
     * @return string
     */
    public function getVariable()
    {
        return $this->variable;
    }

    /**
     * @param string $variable
     * @return $this
     */
    public function setVariable($variable)
    {
        $this->variable = $variable;
        return $this;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param $operator
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * @param $expression
     * @return $this
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function preBuild()
    {
        return array(
            'assign-type' => 'variable',
            'variable'    => $this->getVariable(),
            'operator'    => $this->getOperator(),
            'expr'        => $this->getExpression()
        );
    }
}
