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

namespace Zephir\Builder\Operators;

use Zephir\Builder\Operators\AbstractOperatorBuilder;

/**
 * CastOperatorBuilder
 *
 * Allows to manually build a 'cast' operator AST node
 */
class CastOperatorBuilder extends AbstractOperatorBuilder
{
    protected $leftOperand;

    protected $rightOperand;

    /**
     * @param $left
     * @param $right
     * @param null $file
     * @param int $line
     * @param int $char
     */
    public function __construct($left, $right, $file = null, $line = 0, $char = 0)
    {
        $this->leftOperand = $left;
        $this->rightOperand = $right;
        $this->file = $file;
        $this->line = $line;
        $this->char = $char;
    }

    /**
     * Returns a builder definition
     *
     * @return array
     */
    public function get()
    {
        return array(
            'type'       => 'cast',
            'left'       => $this->leftOperand,
            'right'      => $this->rightOperand->get(),
            'file'       => $this->file,
            'line'       => $this->line,
            'char'       => $this->char
        );
    }
}
