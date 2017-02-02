<?php


class Stableflow_Pricelists_Model_Config extends Mage_Core_Model_Abstract {

    const TYPE_CODE = 'column_code';
    const TYPE_NAME = 'column_name';
    const TYPE_PRICE = 'column_price';

    protected $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    protected function _construct() {
        $this->_init('pricelists/config');
    }

    public function getAttributes() {
        return array(
            self::TYPE_CODE => 'Code',
            self::TYPE_NAME => 'Name',
            self::TYPE_PRICE => 'Price',
        );
    }

    public function getLetters() {
        $lettersArr = [];
        for ($i = 0; $i < strlen($this->letters); $i++) {
            $lettersArr[$this->letters[$i]] = $this->letters[$i];
        }
        return $lettersArr;
    }
}