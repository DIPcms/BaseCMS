<?php

/**
 *
 * @author Mykola Chomenko <mykola.chomenko@dipcom.cz>
 */
namespace DIPcms\TemplateExtension;


interface ITemplateFactory {
    
    /**
     * @param string $name
     * @param mixins $value
     */
    public function setDefaultTemplateValue($name, $value);
    
    /**
     * @return array
     */
    public function getDefaultsTemplateValues();
}
