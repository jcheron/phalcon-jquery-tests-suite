<?php
namespace Ajax;
use Ajax\config\DefaultConfig;
use Ajax\config\Config;
use Ajax\lib\CDNJQuery;
use Ajax\lib\CDNGuiGen;
use Ajax\lib\CDNBootstrap;
use Ajax\service\JArray;
use Ajax\service\PhalconUtils;
use Phalcon\DiInterface;
use Phalcon\Version;
require_once 'lib/CDNJQuery.php';
require_once 'lib/CDNGuiGen.php';
require_once 'lib/CDNBootstrap.php';
require_once 'service/JArray.php';
require_once 'config/DefaultConfig.php';
require_once 'Jquery.php';

/**
 * JQuery Phalcon library
 *
 * @author		jcheron
 * @version 	1.001
 * @license Apache 2 http://www.apache.org/licenses/
 */

/**
 * JsUtils Class : Phalcon service to be injected
 **/
abstract class _JsUtils implements \Phalcon\DI\InjectionAwareInterface{
	protected $_di;
	protected $js;
	protected $cdns;

	/**
	 * @var JqueryUI
	 */
	protected $_ui;

	/**
	 * @var Bootstrap
	 */
	protected $_bootstrap;

	/**
	 * @var Ajax\config\Config
	 */
	protected $config;


}
if(Version::get()==="1.3.4"){
	class JsUtils extends _JsUtils{
		public function setDi($di)
		{
			$this->_di = $di;
			if($this->js!=null && $di!=null)
				$this->js->setDi($di);
		}
	}
}else{
	class JsUtils extends _JsUtils{
		public function setDi(DiInterface $di)
		{
			$this->_di = $di;
			if($this->js!=null && $di!=null)
				$this->js->setDi($di);
		}
	}
}
// END Javascript Class

/* End of file Javascript.php */
/* Location: ./library/ajax/jsUtils.php */