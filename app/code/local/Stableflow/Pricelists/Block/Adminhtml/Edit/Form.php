<?php
class Stableflow_Pricelists_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

	protected function _prepareForm()
    {

        $pricelist_conf = Mage::getModel('pricelists/config');
        if($id = $this->getRequest()->getParam('id')) {
            $pricelist_conf->load($id, 'id_pricelist');
        }

        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/saveConfig'),
                'method' => 'post'
            )
        );

        $fieldset = $form->addFieldset('edit_pricelist', array(
            'legend' => Mage::helper('stableflow_pricelists')->__('Price List Configuration')
        ));

        $fieldset->addField('id_pricelist', 'hidden', array(
            'required' => true,
            'name' => 'id_pricelist',
            'value' => $id,
        ));

        $fieldset->addField('column', 'select', array(
            'required' => true,
            'name' => 'column',
            'values' => ['Select'] + $pricelist_conf->getLetters(),
            'label' => 'Column'
        ));

        $fieldset->addField('attribute', 'select', array(
            'required' => true,
            'name' => 'attribute',
            'values' => ['Select'] + $pricelist_conf->getAttributes(),
            'label' => 'Attribute'
        ));

        $fieldset->addField('row', 'text', array(
            'required' => true,
            'name' => 'row',
            'label' => 'Row'
        ));

        $form->setUseContainer(true);
        $form->setValues($pricelist_conf->getData());
        $this->setForm($form);

    }

}
