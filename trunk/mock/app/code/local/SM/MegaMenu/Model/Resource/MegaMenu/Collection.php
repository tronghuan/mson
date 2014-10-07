<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/7/14
 * Time: 4:09 PM
 */
class SM_MegaMenu_Model_Resource_MegaMenu_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract{
    public function _construct(){
        parrent::_contruct();
        $this->_init('megamenu/megamenu');
    }
}