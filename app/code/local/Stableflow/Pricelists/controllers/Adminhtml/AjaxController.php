<?php

class Stableflow_Pricelists_Adminhtml_AjaxController extends Mage_Adminhtml_Controller_Action {

    public function previewAction(){

        return json_encode(['a' => 'action']);
    }
}