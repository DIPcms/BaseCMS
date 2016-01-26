<?php

namespace App\Forms;

use Nette;
use Nette\Application\UI\Form;
use DIPcms\LightTextManager\TextManager;


class EditTextFactory extends Nette\Object
{
	/** @var TextManager */
	private $textManager;


	public function __construct(TextManager $manager)
	{
		$this->textManager = $manager;
	}
        /**
         *
         * @var \DIPcms\LightTextManager\Entits\Texts 
         */
        public $text;
        
        
	/**
	 * @return Form
	 */
	public function create($name)
	{
		$form = new Form;
                $form->enableLocalized();
                $text = $this->textManager->getText($name);
                $this->text = $text;
                
		$form->addTextArea('text')
                        ->setValue($text->text)
                        ->setAttribute('id','ckeditor');


		$form->addSubmit('submit', 'save')
                        ->setAttribute('class','btn btn-primary btn-purple btn-flat');

		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}


	public function formSucceeded(Form $form, $values){
            $this->textManager->editText($this->text->name,$this->text->page, $values->text);
	}

}
