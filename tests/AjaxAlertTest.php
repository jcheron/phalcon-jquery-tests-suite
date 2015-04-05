<?php

namespace Test;

use Phalcon\DiInterface;
use Phalcon\Config;
/**
 * Class UnitTest
 */
class UnitTest extends AjaxUnitTest {

	public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL) {
		parent::setUp($di,$config);
		$this->webDriver->get($this->url);
	}

    public function testHome(){
        $this->assertContains('It works', $this->webDriver->getPageSource());
    }

    public function testClick(){
    	$this->webDriver->get($this->url);
    	$search = $this->webDriver->findElement(\WebDriverBy::id('alert1'));
    	$search->click();
    	$btn=$this->webDriver->findElement(\WebDriverBy::id('newButton'));
    	$this->assertNotNull($btn);
    }
}