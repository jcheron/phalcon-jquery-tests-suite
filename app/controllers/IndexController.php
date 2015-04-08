<?php

use Ajax\bootstrap\html\base\CssRef;
use Ajax\bootstrap\html\HtmlAlert;
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

		$alert4=new HtmlAlert("alert4","Alert 4",CssRef::CSS_WARNING);
		$this->jquery->click("#btNewAlert",$this->jquery->append("#newAlert",$alert4));

		$this->jquery->bootstrap()->htmlAlert("alert5","Alert 5 <button data-dismiss='alert' id='btnDismiss'>Fermer</button>",CssRef::CSS_INFO);
		$alert6=$this->jquery->bootstrap()->htmlAlert("alert6","Alert 6",CssRef::CSS_INFO);
		$this->jquery->click("#btCloseAlert6",$alert6->close());
		$alert6->onClose($this->jquery->append("#alert1","<div id='close-message-6'>Alert6 closed</div>"));
		$alert7=$this->jquery->bootstrap()->htmlAlert("alert7");
		$alert7->fromArray(array("message"=>"Contenu de alert 7","style"=>CssRef::CSS_WARNING,"closeable"=>true));
		$this->jquery->compile($this->view);
	}

	public function buttonAction(){
		$this->jquery->bootstrap()->htmlButton("bt1","Default button",CssRef::CSS_DEFAULT,$this->jquery->html("#message","'bt1 click event'"));
		$this->jquery->compile($this->view);
	}
}
