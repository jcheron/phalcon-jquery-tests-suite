<?php
namespace Ajax;
use Phalcon\Version;
use Phalcon\DiInterface;
require_once 'lib/CDNJQuery.php';
require_once 'lib/CDNGuiGen.php';
require_once 'lib/CDNBootstrap.php';
require_once 'service/JArray.php';
require_once 'config/DefaultConfig.php';
abstract class _Foo2 implements \Phalcon\DI\InjectionAwareInterface{
	public function __construct($params = array()){
		$defaults = array('driver' => 'Jquery');

		foreach ($defaults as $key => $val){
			if (isset($params[$key]) && $params[$key] !== ""){
				$defaults[$key] = $params[$key];
			}
		}

		extract($defaults);
		$this->js=new Jquery();
		$this->cdns=array();
	}
	public function getDI(){}
}

if(Version::get()==="1.3.4"){
	class Foo2 extends _Foo2{
		public function setDi($di)
		{
		}
	}
}else{
	class Foo2 extends _Foo2{
		public function setDi(DiInterface $di)
		{

		}
	}
}