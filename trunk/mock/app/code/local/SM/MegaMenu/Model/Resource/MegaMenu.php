<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/7/14
 * Time: 4:08 PM
 */
class SM_MegaMenu_Model_Resource_MegaMenu extends Mage_Core_Model_Resource_Db_Abstract{
    public function _construct(){
        // Note that the web_id refers to the key field in your database table.
        $this->_init('megamenu/megamenu', 'menu_id');
    }
}