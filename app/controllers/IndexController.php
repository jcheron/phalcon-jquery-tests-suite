<?php

use Ajax\bootstrap\html\base\CssRef;
use Ajax\bootstrap\html\HtmlAlert;
use Ajax\bootstrap\html\HtmlButton;
use Ajax\bootstrap\html\HtmlGlyphButton;
use Ajax\bootstrap\html\HtmlDropdown;
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
		$alert7->fromArray(array("message"=>"Contenu de alert 7","style"=>CssRef::CSS_WARNING,"closeable"=>true,"click"=>$this->jquery->hide()));
		$this->jquery->compile($this->view);
	}

	public function buttonAction(){
		$this->jquery->bootstrap()->htmlButton("bt1","Default button",CssRef::CSS_DEFAULT,$this->jquery->html("#message","'bt1 click event'"));
		for($index=0;$index<6;$index++){
			$this->jquery->bootstrap()->htmlButton("bt-".$index,"Default button ".$index,$index);
		}
		$bt8=$this->jquery->bootstrap()->htmlButton("bt8");
		$bt8->fromArray(array("value"=>"bt8 value","style"=>CssRef::CSS_INFO));
		$bt8->setActive();
		$bt9=$this->jquery->bootstrap()->htmlButton("bt9","Button disabled");
		$bt9->onClick($this->jquery->hide());
		$bt9->setDisabled();
		$bt10=$this->jquery->bootstrap()->htmlButton("bt10","Button with label");
		$bt10->addLabel("I am a label",CssRef::CSS_SUCCESS);
		$bt11=$this->jquery->bootstrap()->htmlButton("bt11","Button with badge");
		$bt11->addBadge("I am a badge");
		$bt11->setSize("btn-lg");
		for($index=0;$index<4;$index++){
			$bt=$this->jquery->bootstrap()->htmlButton("bt-size".$index,"Default button with size ".$index."(".CssRef::sizes()[$index].")");
			$bt->setSize($index);
		}

		$bt11->onClick($this->jquery->append("#creation",new HtmlButton("bt12","Button 12")));
		$bt11->onClick($this->jquery->append("#creation",new HtmlButton("bt13","Button 13")));
		$this->jquery->compile($this->view);
	}

	public function buttonsGroupAction(){
		$bg1=$this->jquery->bootstrap()->htmlButtongroups("bg1",array("bouton 1","bouton 2"));
		$bg2=$this->jquery->bootstrap()->htmlButtongroups("bg2",array("bouton 1","bouton 2","bouton 3"),CssRef::CSS_INFO);
		$this->jquery->bootstrap()->htmlButtongroups("bg3",array("bouton 1","bouton 2","bouton 3"),CssRef::CSS_PRIMARY,CssRef::sizes()[0]);
		for($index=0;$index<4;$index++){
			$this->jquery->bootstrap()->htmlButtongroups("bg-size-".$index,array("bouton size 1","bouton size 2","bouton size 3"),CssRef::CSS_WARNING,$index);
		}
		for($index=0;$index<6;$index++){
			$this->jquery->bootstrap()->htmlButtongroups("bg-style-".$index,array("bouton style 1","bouton style 2","bouton style 3"),$index);
		}
		$bg1->getElement(0)->addBadge("This is a badge");
		$bg1->getElement("bg1-button-2")->addLabel("This is a label");
		$bg1->onClick("$('#message').append('<p>'+$(event.target).attr('id')+'</p>');");
		$bg2->addElement(new HtmlButton("button-g2-4","Bouton ajouté : hide bg1",CssRef::CSS_WARNING,$this->jquery->hide("#bg1")));
		$bg2->addElement(new HtmlGlyphButton("button-g2-5","star","Button glyph"));
		$bg4=$this->jquery->bootstrap()->htmlButtongroups("bg4");
		$bg4->addElements(array("Button 1",new HtmlButton("Button2","Bouton 2"),new HtmlGlyphButton("Button-glyph-3",20,"Bouton Glyph 20"),new HtmlDropdown("dd4","Dropdown",array("Item1","item2"),CssRef::CSS_SUCCESS,"$('#message').append('<p>'+$(event.target).attr('id')+'</p>');")));
		$bg4->getElement(3)->getItem(0)->onClick("$('#message').append('<p>'+$(event.target).text()+'</p>');");
		$this->jquery->compile($this->view);
	}

	public function buttonsToolbarAction(){
		$btb1=$this->jquery->bootstrap()->htmlButtontoolbar("btb1",array("Bouton 1","Bouton 2"));
		$btb2=$this->jquery->bootstrap()->htmlButtontoolbar("btb2",array("Bouton 1","Bouton 2"),CssRef::CSS_PRIMARY,CssRef::sizes()[0]);
		$btb1->getElement(0)->addBadge("This is a badge");
		$btb1->getElement(1)->addLabel("This is a label");
		$groupe1=$btb1->addGroup();
		$groupe1->addElements(array("Bouton 3","Bouton 4",new HtmlGlyphButton("bt5",12,"Bouton 5",CssRef::CSS_PRIMARY)));
		$groupe1->addElement(new HtmlDropdown("dd1","Dropdown button",array("Item 1","Item 2"),CssRef::CSS_SUCCESS));
		for($index=0;$index<4;$index++){
			$this->jquery->bootstrap()->htmlButtontoolbar("btb-size-".$index,array("bouton size 1","bouton size 2","bouton size 3"),CssRef::CSS_WARNING,$index);
		}
		for($index=0;$index<6;$index++){
			$this->jquery->bootstrap()->htmlButtontoolbar("btb-style-".$index,array("bouton style 1","bouton style 2","bouton style 3"),$index);
		}
		$btb1->onClick("$('#message').append('<p>'+$(event.target).text()+'</p>');");
		$btb2->addElement(new HtmlButton("button-tb2-4","Bouton ajouté : hide btb1",CssRef::CSS_WARNING,$this->jquery->hide("#btb1")));

		$btb3=$this->jquery->bootstrap()->htmlButtontoolbar("btb3");
		$btb3->addElements(array("Button 1",new HtmlButton("Button2","Bouton 2"),new HtmlGlyphButton("Button-glyph-3","remove","Bouton Glyph 20"),new HtmlDropdown("dd4","Dropdown",array("Item1","item2"),CssRef::CSS_SUCCESS,"$('#message').append('<p>'+$(event.target).attr('id')+'</p>');")));
		$btb3->getElement(3)->getItem(0)->onClick("$('#message').append('<p>'+$(event.target).text()+'</p>');");
		$this->jquery->compile($this->view);
	}

	public function accordionAction(){
		$accordion1=$this->jquery->bootstrap()->htmlAccordion("accordion1");
		$accordion1->addPanel("Titre1", "Contenu <strong>gras</strong>");
		$this->jquery->compile($this->view);
	}
}
