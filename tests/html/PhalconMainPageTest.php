<?php

namespace Tests\html;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\PhalconUnitTest;
/**
 * Class UnitTest
 */
class PhalconMainPageTest extends PhalconUnitTest {

	public function testIndex() {
		$content=$this->application->handle("/index")->getContent();
		$this->assertContains("Congratulations", $content,"Page index not ok");

        $this->assertEquals('works',
            'works',
            'This is OK'
        );
    }
}