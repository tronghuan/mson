<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/8/14
 * Time: 7:00 AM
 */
class SM_MegaMenu_Block_Adminhtml_Menu extends Mage_Adminhtml_Block_Widget_Grid_Container{
    public function __construct(){
        $this->_controller = 'adminhtml_menu';
        $this->_blockGroup = 'megamenu';
        $this->_headerText = Mage::helper('megamenu')->__('Menu Manager');
        parent::__construct();
        //$this->_removeButton('add');
    }
}