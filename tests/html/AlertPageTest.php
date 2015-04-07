<?php

namespace Tests\html;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\PhalconUnitTest;
/**
 * Class AlertPageTest
 */
class AlertPageTest extends PhalconUnitTest {

	public function testAlert() {
		$content=$this->application->handle("/index/alert")->getContent();
		$this->assertContains("It works !", $content,"Page Alert not ok");
    }
}