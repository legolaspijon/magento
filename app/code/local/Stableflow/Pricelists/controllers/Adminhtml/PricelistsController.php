<?php

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
        $id = $request->getParam('id');
        $row = $request->getParam('row');

        /** @var $pricelist Stableflow_Pricelists_Model_Pricelist */
        $pricelist = Mage::getModel('pricelists/pricelist')->load($id);

        $lettersRange = $pricelist->getLettersRange();
        $types = $pricelist->getTypes();

        $config = $request->getParam('config');

        if(!empty($config['delete']) && in_array(1, $config['delete'])) {
            foreach ($config['delete'] as $key => $value) {
                if ($value == 1) {
                    unset($config['value'][$key]);
                }
            }
        }

        $arrToSerrialize = array();
        foreach ($config['value'] as $option => $values) {
            $column = $types[$values['column']];
            $letter = $lettersRange[$values['letter']];
            $arrToSerrialize['types'][$column] = $letter;
        }


        $pricelist->config = $arrToSerrialize['types'];
        echo $pricelist->configurations;
        exit;

        if($pricelist->save()) {
            Mage::getSingleton('core/session')->addSuccess(Mage::helper('stableflow_pricelists')->__('Configuration successfully save'));
        }

        return $this->_redirect('*/*/');
    }

    public function gridAction() {
        $this->loadLayout();
        $this->getResponse()->setBody($this->getLayout()->createBlock('stableflow_pricelists/adminhtml_pricelists_grid')->toHtml());
    }
}
