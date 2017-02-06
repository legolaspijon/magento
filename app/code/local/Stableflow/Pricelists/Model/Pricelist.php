<?php

class Stableflow_Pricelists_Model_Pricelist extends Mage_Core_Model_Abstract {

    protected function _construct() {
        $this->_init('pricelists/pricelist');
    }

    public function getLettersRange() {
        return array(
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'N', 'O', 'P', 'Q',
            'R', 'S', 'T', 'U', 'V', 'W',
            'X', 'Y', 'Z'
        );
    }

    public function getTypes(){
        return array('name', 'price', 'code');
    }

    public function getConfig() {
        return unserialize($this->configurations);
    }

    public function setConfig($configuration) {
        $this->configurations = serialize($configuration);
    }
}
