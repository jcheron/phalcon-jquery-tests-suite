<?php

namespace Test;

use Phalcon\DiInterface;
use Phalcon\Config;
/**
 * Class UnitTest
 */
class UnitTest extends \UnitTestCase {
	protected $webDriver;
	protected $url = 'https://github.com';

	public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL) {
		$capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
		$this->webDriver = \RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
		// You now have the option. You can leave out this setUp to use the defaults
		// in the abstract class UnitTestCase.php call, however if this test has
		// specific requirements you can set a new DI with those services. Then when it gets
		// passed up the inheritance chain the defaults will be applied.
		$di = new \Phalcon\DI\FactoryDefault();
		// Here is where you take advantage of inheritance the use of the abstract object
		parent::setup($di, $config);
	}
    public function testTestCase() {
		$application = new \Phalcon\Mvc\Application($this->di);
		$content=$application->handle("index")->getContent();
		$this->assertContains("alert1", $content,"Alert1 non trouvé");

        $this->assertEquals('works',
            'works',
            'This is OK'
        );
    }

    public function testGitHubHome()
    {
    	$this->webDriver->get($this->url);
    	// checking that page title contains word 'GitHub'
    	$this->assertContains('GitHub', $this->webDriver->getTitle());
    }
}