<?php

namespace Tests;

/**
 * Class AjaxUnitTest
 */
abstract class AjaxUnitTest extends \Tests\UnitTestCase {
	use \WebDriverAssertions;
	use \WebDriverDevelop;
	protected static $url = 'http://localhost/phalcon-jquery-tests-suite/';
	/**
	* @var \RemoteWebDriver
	*/
	protected static $webDriver;


	/* (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUpBeforeClass()
	 */
	public static function setUpBeforeClass() {
		$capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox',\WebDriverCapabilityType::VERSION=>'32.0');
		self::$webDriver = \RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
	}

	public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL) {
		parent::setup($di, $config);
	}

	/* (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::tearDownAfterClass()
	 */
	public static function tearDownAfterClass() {
    	if(self::$webDriver!=null)
    		self::$webDriver->close();
	}


    /**
     * Loads the relative url $url in web browser
     * @param string $url
     */
    public static function get($url=""){
   		$url=self::$url.$url;
    	self::$webDriver->get($url);
    }

    /**
     * Returns a given element by id
     * @param string $id HTML id attribute of the element to return
     * @return RemoteWebElement
     */
    public function getElementById($id){
    	return self::$webDriver->findElement(\WebDriverBy::id($id));
    }

    /**
     * Tests if an element exist
     * @param string $css_selector
     * @return boolean
     */
    public function elementExists($css_selector){
    	return sizeof($this->getElementsBySelector($css_selector))!==0;
    }

    /**
     * Returns a given element by css selector
     * @param string $css_selector
     * @return RemoteWebElement
     */
    public function getElementBySelector($css_selector){
    	return self::$webDriver->findElement(\WebDriverBy::cssSelector($css_selector));
    }

    /**
     * Returns the given elements by css selector
     * @param string $css_selector
     * @return RemoteWebElement
     */
    public function getElementsBySelector($css_selector){
    	return self::$webDriver->findElements(\WebDriverBy::cssSelector($css_selector));
    }

    /**
     * Return true if the actual page contains $text
     * @param string $text The text to search for
     */
    public function assertPageContainsText($text){
    	$this->assertContains($text, self::$webDriver->getPageSource());
    }
}