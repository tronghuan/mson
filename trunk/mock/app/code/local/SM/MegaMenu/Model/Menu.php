<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/7/14
 * Time: 4:08 PM
 */
class SM_MegaMenu_Model_Menu extends Mage_Core_Model_Abstract{
    protected function _construct(){
        parent::_construct();
        $this->_init('megamenu/menu');
    }
}