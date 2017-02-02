<?php

include '';

class Stableflow_Pricelists_Adminhtml_PricelistsController extends Mage_Adminhtml_Controller_Action {


    public function indexAction() {

        $this->_title($this->__('Price Lists'));
        $this->loadLayout();
        $this->_setActiveMenu('stableflow_pricelists');
        $this->_addBreadcrumb(Mage::helper('stableflow_pricelists')->__('Price Lists'), Mage::helper('stableflow_pricelists')->__('Price Lists'));
        $this->renderLayout();
    }

    public function newAction() {
        $this->_title($this->__('Add new price list'));
        $this->loadLayout();
        $this->_setActiveMenu('stableflow_pricelists');
        $this->_addBreadcrumb(Mage::helper('stableflow_pricelists')->__('Add new price list'), Mage::helper('stableflow_pricelists')->__('Add new price list'));
        $this->renderLayout();
    }

    public function editAction() {

        $this->_title($this->__('Edit price list'));
        $this->loadLayout();
        $this->_setActiveMenu('stableflow_pricelists');
        $this->_addBreadcrumb(Mage::helper('stableflow_pricelists')->__('Edit price list'), Mage::helper('stableflow_pricelists')->__('Edit Price list'));
        $this->renderLayout();
    }

    public function deleteAction() {
        $tipId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('pricelists/pricelist')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('stableflow_pricelists')->__('Price list successfully deleted'));

            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirectReferer();
    }

    public function saveConfigAction() {


        $request = $this->getRequest();
        $column = $request->getParam('column');
        $attribute = $request->getParam('attribute');

        $pricelist_config = Mage::getModel('pricelists/config');

        if($id = $request->getParam('id_pricelist')) {
            $pricelist_config->load($id, 'id_pricelist');
        }
        if($attribute !== 0 || $column !== 0) {
            $pricelist_config->{'set'.$attribute}($column);
        }

        $pricelist_config->setRow($request->getParam('row'));

        if($pricelist_config->save()) {
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('stableflow_pricelists')->__('Configuration successfully save'));
        }

        return $this->_redirect('*/*/');
    }

    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody($this->getLayout()->createBlock('stableflow_pricelists/adminhtml_pricelists_grid')->toHtml());
    }
}
