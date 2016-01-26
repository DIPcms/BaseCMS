<?php


/**
 * @author Mykola Chomenko <mykola.chomenko@dipcom.cz>
 */

namespace DIPcms\TemplateExtension\DI;


use Nette;
use Nette\DI\CompilerExtension;

class TemplateExtension extends CompilerExtension{
    
    
    /**
     *
     * @var array 
     */
    public $defaults = array(
        'namespace' => 'DIPcms\TemplateExtension\TemplateFactory'
    );
    

    
    public function loadConfiguration() {
        
        $builder = $this->getContainerBuilder();
        $config = $this->getConfig($this->defaults);

        $builder->addDefinition($this->prefix('templateFactory'))
        ->setClass($config['namespace'])
        ->setAutowired(FALSE);
        
    }
    

    
    public function beforeCompile(){
       
        $builder = $this->getContainerBuilder();
        
        $builder->getDefinition('latte.templateFactory')
                ->addSetup('$f = ?; if($f instanceof '.$this->defaults['namespace'].'){$service = $f;}else{throw new \Exception(get_class($f)." has to implement '.$this->defaults['namespace'].'"); };', array($this->prefix('@templateFactory')));
        
        
    }
    
    
    
     /**
     * @param \Nette\Configurator $configurator
     */
    public static function register(Nette\Configurator $configurator){
   
        $configurator->onCompile[] = function ($config, Nette\DI\Compiler $compiler){
                $compiler->addExtension('templateExtensions', new TemplateExtensions());
        };
    } 
    
  
}
