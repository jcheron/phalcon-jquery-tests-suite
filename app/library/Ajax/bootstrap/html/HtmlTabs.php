<?php
namespace Ajax\bootstrap\html;

/**
 * Composant Twitter Bootstrap Tabs
 * @author jc
 * @version 1.001
 */
use Ajax\bootstrap\html\content\HtmlTabItem;
use Ajax\JsUtils;
use Ajax\bootstrap\Components\Tabs;
use Ajax\bootstrap\html\base\HtmlDoubleElement;
use Ajax\bootstrap\html\content\HtmlTabContent;
use Phalcon\Mvc\View;
class HtmlTabs extends HtmlDoubleElement {
	protected $tabs=array();
	protected $_tabsType="tabs";

	public function __construct($identifier, $tagName = "ul") {
		parent::__construct ( $identifier, $tagName);
		$this->_template="<%tagName% %properties%>%tabs%</%tagName%>%content%";
		$this->setProperty("class", "nav nav-".$this->_tabsType);
	}

	protected function addTab_($tab,$index=null){
		if(isset($index)){
			$inserted = array( $tab );
			array_splice( $this->tabs, $index, 0, $inserted );
		}else
			$this->tabs[]=$tab;
	}

	public function addTab($element,$index=null){
		$iid=$this->countTabs()+1;
		$tab=$element;
		if(is_string($element)){
			$tab=new HtmlTabItem("tab-".$this->identifier, $element."-".$iid);
			$this->addTab_($tab,$index);
		}elseif(is_array($element)){
			$tab=new HtmlTabItem("tab-".$this->identifier."-".$iid);
			$tab->fromArray($element);
			$this->addTab_($tab,$index);
		}else{
			$this->addTab_($tab,$index);
		}
	}

	/* (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\HtmlSingleElement::fromArray()
	 */
	public function fromArray($array) {
		$array=parent::fromArray($array);
		$this->addTabs($array);
		return $array;
	}

	public function addTabs($tabs) {
		foreach ($tabs as $tab){
			$this->addTab($tab);
		}
		return $this;
	}

	public function getTabstype() {
		return $this->_tabsType;
	}

	public function setTabstype($_tabsType="tabs") {
		$this->_tabsType = $_tabsType;
		return $this;
	}


	/* (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\BaseHtml::compile()
	 */
	public function compile(JsUtils $js=NULL,View $view=NULL) {
		$this->setProperty("class", "nav nav-".$this->_tabsType);
		return parent::compile($js,$view);
	}


	/* (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\HtmlDoubleElement::run()
	 */
	public function run(JsUtils $js) {
		$this->_bsComponent=new Tabs($js);
		foreach ($this->tabs as $tab){
			$this->_bsComponent->addTab($tab->run($js));
		}
		$this->addEventsOnRun($js);
		return $this->_bsComponent;
	}

	public function createTabContents(){
		$tabContent=new HtmlTabContent("tabcontent-".$this->identifier);
		foreach ($this->tabs as $tab){
			if($tab instanceof HtmlTabItem)
				$tabContent->addTabItem($tab->getHref());
			elseif($tab instanceof HtmlDropdown){
				foreach ($tab->getItems() as $dropdownItem){
					$tabContent->addTabItem($dropdownItem->getHref());
				}
			}
		}
		return $tabContent;
	}

	public function addTabContents(){
		$this->content=$this->createTabContents();
	}

	public function getTabContent($index){
		$this->content->getTabItem($index);
	}

	public function setContentToTab($index,$text){
		$tabContentItem=$this->content->getTabItem($index);
		if(isset($tabContentItem))
			$tabContentItem->setContent($text);
	}

	public function countTabs(){
		return sizeof($this->tabs);
	}
	public function getTabItem($index){
		if($index<sizeof($this->content->get))
			return $this->content;
	}
	public function fadeEffect(){
		if(sizeof($this->content->getTabItems())>0){
			$this->content->getTabItem(0)->addToProperty("class", "fade in");
			for($index=0;$index<sizeof($this->tabs);$index++){
				$this->content->getTabItem($index)->addToProperty("class", "fade");
			}
		}
	}




}