<?php
namespace Ajax\common;

use Ajax\JsUtils;

/**
 * Base component for JQuery UI visuals components
 * @author jc
 * @version 1.001
 */

abstract class SimpleComponent extends BaseComponent {
	protected $attachTo;
	protected $uiName;
	protected $events;

	public function __construct(JsUtils $js){
		parent::__construct($js);
		$this->events=array();
	}

	protected function compileEvents(){
		foreach ($this->events as $event=>$jsCode){
			$this->jquery_code_for_compile[]="$( \"".$this->attachTo."\" ).on(\"".$event."\" , function( event, data ) {".$jsCode."});";
		}
	}
	protected function compileJQueryCode(){
		$result= implode("\n", $this->jquery_code_for_compile);
		$result=str_ireplace("\"%", "", $result);
		$result=str_ireplace("%\"", "", $result);
		$result = str_replace(array("\\n", "\\r","\\t"), '', $result);
		return $result;
	}

	public function getScript(){
		$allParams=$this->params;
		$this->jquery_code_for_compile=array();
		$this->jquery_code_for_compile[]="$( \"".$this->attachTo."\" ).{$this->uiName}(".$this->getParamsAsJSON($allParams).");";
		$this->compileEvents();
// 		foreach ($this->events as $event=>$jsCode){
// 			$this->jquery_code_for_compile[]="$( \"".$this->attachTo."\" ).on(\"{$event}\",function( event, data ) {".$jsCode."});";
// 		}
		return $this->compileJQueryCode();
	}

	/**
	 * @param String $identifier identifiant CSS
	 */
	public function attach($identifier){
		$this->attachTo=$identifier;
	}

	public function addEvent($event,$jsCode){
		return $this->setParam($event, "%function( event, ui ) {".$jsCode."}%");
	}

	public function on($event,$jsCode){
		$this->events[$event]=$jsCode;
		return $this;
	}

	protected function setParamCtrl($key,$value,$typeCtrl){
		if(is_array($typeCtrl)){
			if(array_search($value, $typeCtrl)===false)
				throw new \Exception("La valeur passée a propriété `".$key. "` pour le composant `".$this->uiName."` ne fait pas partie des valeurs possibles : {".implode(",", $typeCtrl)."}");
		}else{
			if(!$typeCtrl($value)){
				throw new \Exception("La fonction ".$typeCtrl." a retourné faux pour l'affectation de la propriété ".$key." au composant ".$this->uiName);
			}
		}
		return $this->setParam($key, $value);
	}
	public function getAttachTo() {
		return $this->attachTo;
	}

}