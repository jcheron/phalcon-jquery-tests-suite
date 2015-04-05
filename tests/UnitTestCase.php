<?php
namespace Test;
use Phalcon\DI,\Phalcon\Test\UnitTestCase as PhalconTestCase;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;


abstract class UnitTestCase extends PhalconTestCase {

    /**
     * @var \Voice\Cache
     */
    protected $_cache;

    /**
     * @var \Phalcon\Config
     */
    protected $_config;

    /**
     * @var bool
     */
    private $_loaded = false;

    /**
     * Default fixture for each test
     */
    public function setUp(\Phalcon\DiInterface $di = NULL, \Phalcon\Config $config = NULL) {
        if(is_null($di)) {
            $di = new \Phalcon\DI\FactoryDefault();
        }
        // Load your additional dependencies and services here

        // We should check the config state also
        // We can put it into the DI also if we wanted to
        if(is_null($config)) {
            $this->_config = $config = include __DIR__ . "/../app/config/config.php";;
        } else {
            $this->_config = $config;
        }

        // Set it as default if anything else uses the DI::getDefault() static method
        DI::setDefault($di);

        $di->set('view', function () use ($config) {

        	$view = new View();

        	$view->setViewsDir($config->application->viewsDir);

        	$view->registerEngines(array(
        			'.volt' => function ($view, $di) use ($config) {

        				$volt = new VoltEngine($view, $di);

        				$volt->setOptions(array(
        						'compiledPath' => $config->application->cacheDir,
        						'compiledSeparator' => '_'
        				));

        				return $volt;
        			},
        			'.phtml' => 'Phalcon\Mvc\View\Engine\Php'
        		));
        	return $view;
        }, true);

        	$di->set('jquery',function(){
        		$jquery= new \Ajax\JsUtils(array("driver"=>"Jquery"));
        		$jquery->bootstrap(new \Ajax\Bootstrap());//Optional for Twitter Bootstrap
        		return $jquery;
        	});

        // Pass it up the chain
        parent::setUp($di, $this->_config);

        $this->_loaded = true;
    }

    /**
     * Check if the test case is setup properly
     * @throws \PHPUnit_Framework_IncompleteTestError;
     */
    public function __destruct() {
        if(!$this->_loaded) {
            throw new \PHPUnit_Framework_IncompleteTestError('Please run parent::setUp().');
        }
    }
}