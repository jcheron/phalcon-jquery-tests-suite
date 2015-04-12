<?php

namespace Tests\html;

use Phalcon\DiInterface;
use Phalcon\Config;
use Tests\PhalconUnitTest;
/**
 * Class ButtonPageTest
 */
class ButtonsGroupPageTest extends PhalconUnitTest {

	public function testIndex() {
		$content=$this->application->handle("/index/buttonsGroup")->getContent();
		$this->assertContains("bg1", $content,"ButtonsGroup1 not ok");
		$this->assertContains("bg1-button-1", $content,"Button1 not ok");
		$this->assertContains("bg1-button-2", $content,"Button2 not ok");

		$this->assertContains("bg2", $content,"ButtonsGroup2 not ok");
		$this->assertContains("bg2-button-1", $content,"Button1 not ok");
		$this->assertContains("bg2-button-2", $content,"Button2 not ok");
		$this->assertContains("bg2-button-3", $content,"Button3 not ok");

		$this->assertContains("bg3", $content,"ButtonsGroup2 not ok");
		$this->assertContains("bg3-button-1", $content,"Button1 not ok");
		$this->assertContains("bg3-button-2", $content,"Button2 not ok");
		$this->assertContains("bg3-button-3", $content,"Button3 not ok");

		for($index=0;$index<4;$index++){
			$this->assertContains("bg-size-".$index, $content,"bg-size-".$index." not ok");
			$this->assertContains("bg-size-".$index."-button-1", $content,"bg-size-".$index."-button-1 not ok");
			$this->assertContains("bg-size-".$index."-button-2", $content,"bg-size-".$index."-button-2 not ok");
			$this->assertContains("bg-size-".$index."-button-3", $content,"bg-size-".$index."-button-3 not ok");
		}
		for($index=0;$index<6;$index++){
			$this->assertContains("bg-style-".$index, $content,"bg-style-".$index." not ok");
			$this->assertContains("bg-style-".$index."-button-1", $content,"bg-style-".$index."-button-1 not ok");
			$this->assertContains("bg-style-".$index."-button-2", $content,"bg-style-".$index."-button-2 not ok");
			$this->assertContains("bg-style-".$index."-button-3", $content,"bg-style-".$index."-button-3 not ok");		}
    }
}