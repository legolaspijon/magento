<?php
class Stableflow_Pricelists_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'stableflow_pricelists';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';

        $pricelist_id = (int)$this->getRequest()->getParam($this->_objectId);

        if(!$pricelist_id) {
            Mage::throwException($this->__('Price list with this id does not exists'));
        }
        $pricelist = Mage::getModel('pricelists/pricelist')->load($pricelist_id);

        Mage::register('current_pricelist', $pricelist);
        $this->_removeButton('reset');
    }
 
    public function getHeaderText()
    {
        $pricelist = Mage::registry('current_pricelist');
        if ($pricelist->getId()) {
            return Mage::helper('stableflow_pricelists')->__("Edit Price list '%s' configuration", $pricelist->getFilename());
        } else {
            return Mage::helper('stableflow_pricelists')->__("Add new Price list");
        }
    }
}
