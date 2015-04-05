<?php

use Ajax\bootstrap\html\base\CssRef;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
		$alert=$this->jquery->bootstrap()->htmlAlert("alert1","It works !",CssRef::CSS_SUCCESS);
		$alert->onClick($this->jquery->append('this',"<button id='newButton'>Button</button>"));
		$this->jquery->compile($this->view);
    }
}

