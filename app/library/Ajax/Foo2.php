<?php
namespace Ajax;
use Phalcon\Version;
use Phalcon\DiInterface;
abstract class _Foo2 implements \Phalcon\DI\InjectionAwareInterface{
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