<?php
class Stableflow_Pricelists_Model_Resource_Pricelist extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('pricelists/pricelist', 'id');
    }
}