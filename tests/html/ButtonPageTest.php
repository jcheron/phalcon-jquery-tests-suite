<?php

namespace Tests\html;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\PhalconUnitTest;
/**
 * Class ButtonPageTest
 */
class ButtonPageTest extends PhalconUnitTest {

	public function testIndex() {
		$content=$this->application->handle("/index/button")->getContent();
		$this->assertContains("Button page", $content,"page Button not ok");
    }
}