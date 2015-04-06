<?php

use Ajax\bootstrap\html\base\CssRef;
class IndexController extends ControllerBase
{

	public function indexAction(){
	}

	public function alertAction(){
		$alert=$this->jquery->bootstrap()->htmlAlert("alert1","It works !",CssRef::CSS_SUCCESS);
		$alert->onClick($this->jquery->append('this',"<button id='newButton'>Button</button>"));

		$alert2=$this->jquery->bootstrap()->htmlAlert("alert2");
		$alert2->setStyle(CssRef::CSS_DANGER);
		$alert2->setContent("Nouveau contenu");

		$alert3=$this->jquery->bootstrap()->htmlAlert("alert3","Alert 3",CssRef::CSS_SUCCESS);
		$alert3->addCloseButton();
		$alert3->onClose($this->jquery->append("#alert1","<div id='close-message'>Alert3 closed</div>"));

		$this->jquery->compile($this->view);
	}
}
