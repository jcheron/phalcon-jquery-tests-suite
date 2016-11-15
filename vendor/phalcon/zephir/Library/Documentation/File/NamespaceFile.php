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

namespace Zephir\Documentation\File;

use Zephir\ClassDefinition;
use Zephir\Documentation\AbstractFile;
use Zephir\CompilerFile;
use Zephir\Documentation\NamespaceHelper;

class NamespaceFile extends AbstractFile
{
    /**
     * @var \Zephir\Documentation\NamespaceHelper
     */
    protected $namespaceHelper;

    /**
     *
     * @var CompilerFile
     */
    protected $compilerFile;

    public function __construct($config, NamespaceHelper $nh)
    {
        $this->namespaceHelper = $nh;
    }

    public function getTemplateName()
    {
        return "namespace.phtml";
    }

    public function getData()
    {
        return array(

            "namespaceHelper" => $this->namespaceHelper,
            "subNamespaces" => $this->namespaceHelper->getNamespaces(),
            "subClasses" => $this->namespaceHelper->getClasses(),

        );
    }

    public function getOutputFile()
    {
        return \Zephir\Documentation::namespaceUrl($this->namespaceHelper->getFullNamespace());
    }
}
