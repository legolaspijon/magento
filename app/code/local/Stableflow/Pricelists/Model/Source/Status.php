<?php

class Stableflow_Pricelists_Model_Source_Status
{
    const STATUS_NOT_APPROVED = 0;
    const STATUS_APPROVED = 1;


    public function toOptionArray() {
        return array(
            array('value' => self::STATUS_APPROVED, 'label' => 'Approved'),
            array('value' => self::STATUS_NOT_APPROVED, 'label' => 'Not Approved'),
        );
    }

    public function toArray() {
        return array(
            self::STATUS_APPROVED => Mage::helper('stableflow_pricelists')->__('Approved'),
            self::STATUS_NOT_APPROVED => Mage::helper('stableflow_pricelists')->__('Not Approved'),
        );
    }
}