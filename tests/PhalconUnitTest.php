<?php

namespace Test;

use Phalcon\DiInterface;
use Phalcon\Config;
/**
 * Class PhalconUnitTest
 */
abstract class PhalconUnitTest extends \Test\UnitTestCase {
	protected $application;
	public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL) {
		// You now have the option. You can leave out this setUp to use the defaults
		// in the abstract class UnitTestCase.php call, however if this test has
		// specific requirements you can set a new DI with those services. Then when it gets
		// passed up the inheritance chain the defaults will be applied.
		$di = new \Phalcon\DI\FactoryDefault();
		// Here is where you take advantage of inheritance the use of the abstract object
		parent::setup($di, $config);
		$this->application = new \Phalcon\Mvc\Application($this->di);
	}
}