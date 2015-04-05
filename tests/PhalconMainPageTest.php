<?php

namespace Test;

use Phalcon\DiInterface;
use Phalcon\Config;
/**
 * Class UnitTest
 */
class PhalconMainPageTest extends PhalconUnitTest {

	public function testTestCase() {
		$content=$this->application->handle("index")->getContent();
		$this->assertContains("alert1", $content,"Alert1 non trouvé");

        $this->assertEquals('works',
            'works',
            'This is OK'
        );
    }
}