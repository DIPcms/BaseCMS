<?php

namespace DIPcms\TemplateExtension;

use Nette\Application\UI;
use Nette\Bridges\ApplicationLatte;


class TemplateFactory extends ApplicationLatte\TemplateFactory implements ITemplateFactory{       
    
        /** @var array */
        private $defaults = array();
        
        /**
         * 
         * @param \Nette\Application\UI\Control $control
         * @return \Nette\Bridges\ApplicationLatte\Template
         */
        public function createTemplate(UI\Control $control = NULL) {
            $template =  parent::createTemplate($control);
            
            foreach ($this->defaults as $name => $value){
                $template->$name = $value;
            }
            
            return $template;
        }
        
        /**
         * @param string $name
         * @param mixins $value
         */
        public function setDefaultTemplateValue($name, $value){
            $this->defaults[$name] = $value;
        }
        
        
        /**
         * 
         * @return array
         */
        public function getDefaultsTemplateValues(){
            return $this->defaults;
        }
        

}

