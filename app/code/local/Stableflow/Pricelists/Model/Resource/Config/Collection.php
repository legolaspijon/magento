<?php
class Stableflow_Pricelists_Model_Resource_Config_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('pricelists/config');
    }
}
