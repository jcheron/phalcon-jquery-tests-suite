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

namespace Zephir\Commands;

use Zephir\BaseBackend;
use Zephir\CommandArgumentParser;
use Zephir\Config;
use Zephir\Logger;
use Zephir\Compiler;

/**
 * CommandAbstract
 *
 * Provides a superclass for commands
 */
abstract class CommandAbstract implements CommandInterface
{
    private $_parameters = null;

    /**
     * Returns parameter named $name if specified
     * on the command line else null
     *
     * @param string $name
     * @param string $value
     * @return void
     */
    protected function setParameter($name, $value)
    {
        if (!isset($this->_parameters)) {
            $this->_parameters = array();
        }
        $this->_parameters[$name] = $value;
    }

    /**
     * Returns parameter named $name if specified
     * on the command line else null
     * @param string $name
     * @return string
     */
    public function getParameter($name)
    {
        return (isset($this->_parameters[$name])) ? $this->_parameters[$name] : null;
    }


    /**
     * Parse the input arguments for the command and returns theme as an associative array
     * @return array the list of the parameters
     */
    public function parseArguments()
    {
        if (count($_SERVER['argv']) > 2) {
            $commandArgs = array_slice($_SERVER['argv'], 2);
            $parser = new CommandArgumentParser();
            $params = $parser->parseArgs(array_merge(array("command"), $commandArgs));
        } else {
            $params = array();
        }

        return $params;
    }

    /**
     * Executes the command
     * @param Config $config
     * @param Logger $logger
     */
    public function execute(Config $config, Logger $logger)
    {
        $params = $this->parseArguments();
        $backend = null;
        if (!isset($params['backend'])) {
            $params['backend'] = BaseBackend::getActiveBackend();
        }
        $className = 'Zephir\\Backends\\'.$params['backend'].'\\Backend';
        if (!class_exists($className)) {
            throw new \InvalidArgumentException('Backend '.$params['backend'].' does not exist');
        }
        $backend = new $className();
        $compiler = new Compiler($config, $logger, $backend);
        if (isset($params['parser-compiled'])) {
            if ($params['parser-compiled'] !== 'force') {
                $compiler->parserCompiled = true;
            } else {
                $compiler->parserCompiled = 'force';
            }
        }
        $command = $this->getCommand();
        $compiler->$command($this);
    }
}
