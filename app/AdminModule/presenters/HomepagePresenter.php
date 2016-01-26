<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\Model;
use DIPcms\LightTextManager\TextManager;
use App\Forms\EditTextFactory;

class HomepagePresenter extends BasePresenter{
    
    /**
     *
     * @var TextManager
     */
    public $textManager;
    
    
    public function __construct(TextManager $textManager) {
        $this->textManager = $textManager;
    }
    

    public function renderDefault(){
        $this->template->texts = $this->textManager->getTexts();
    }
    
    public function renderEditText($name){
        $this->template->text = $this->textManager->getText($name);
    }
    
    
    public function handleRemoveText($name){
        $this->textManager->remove($name);
        $this->redirect('this');
    }
    
    
    
     /** @var EditTextFactory @inject */
        public $editText;
        
        
        /**
         * Register form factory.
         * @return Nette\Application\UI\Form
         */
        protected function createComponentEditTextForm()
	{
		$form = $this->editText->create($this->getParam('name'));
		$form->onSuccess[] = function ($form) {
			$form->getPresenter()->redirect('Homepage:');
		};
		return $form;
	}
    
    
}
