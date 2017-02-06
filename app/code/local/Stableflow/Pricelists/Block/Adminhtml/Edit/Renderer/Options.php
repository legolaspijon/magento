<?php

class Stableflow_Pricelists_Block_Adminhtml_Edit_Renderer_Options extends Mage_Adminhtml_Block_Widget implements Varien_Data_Form_Element_Renderer_Interface
{

    public function __construct()
    {
        $this->setTemplate('stableflow/pricelists/pricelist.phtml');
        parent::__construct();
    }

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $this->setElement($element);
        return $this->toHtml();
    }

}