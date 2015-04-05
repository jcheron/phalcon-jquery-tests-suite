<?php

namespace Test;

/**
 * Class AjaxUnitTest
 */
abstract class AjaxUnitTest extends \Test\UnitTestCase {
	use \WebDriverAssertions;
	use \WebDriverDevelop;
	protected $url = 'http://127.0.0.1/phalcon-jquery-tests-suite/';
	/**
	* @var \RemoteWebDriver
	*/
	protected $webDriver;

	public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL) {
		parent::setup($di, $config);
		$capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'chrome');
		$this->webDriver = \RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
	}
    public function tearDown()
    {
    	if($this->webDriver!=null)
    		$this->webDriver->close();
    }
}