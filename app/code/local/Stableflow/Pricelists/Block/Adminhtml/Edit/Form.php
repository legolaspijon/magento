<?php
class Stableflow_Pricelists_Block_Adminhtml_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

	protected function _prepareForm()
    {

        $request = $this->getRequest();

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

        $fieldset->addField('id', 'hidden', array(
            'required' => true,
            'name' => 'id',
        ));


        $fieldset->addField('row', 'text', array(
            'required' => true,
            'name' => 'row',
            'label' => 'Row'
        ));

        $fieldset->addField('config', 'text', array(
            'name'      => 'config',
            'label'     => Mage::helper('stableflow_pricelists')->__('Mapping'),
            'required'  => false,
        ));

        $elem = $form->getElement('config');

        $elem->setRenderer(
            $this->getLayout()->createBlock('stableflow_pricelists/adminhtml_edit_renderer_options')
        );

        if($id = $request->getParam('id')) {
            $pricelist = Mage::getModel('pricelists/pricelist')->load($id);
            if($config = unserialize($pricelist->configurations)) {
                $config = array_merge($config, ['id' => $id]);
                $form->setValues($config);
            }
        }

        $form->setUseContainer(true);
        $this->setForm($form);

    }

}
