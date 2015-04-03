<?php

use Ajax\bootstrap\html\base\CssRef;
class IndexController extends ControllerBase
{

    public function indexAction()
    {
		$this->jquery->bootstrap()->htmlAlert("alert1","It works !",CssRef::CSS_SUCCESS);
		$this->jquery->hide("#alert1",15000,'',true);
		$this->jquery->compile($this->view);
    }

}

