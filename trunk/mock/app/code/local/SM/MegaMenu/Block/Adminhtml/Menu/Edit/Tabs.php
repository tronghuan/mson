<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/8/14
 * Time: 2:53 PM
 */
class SM_MegaMenu_Block_Adminhtml_Menu_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('menu_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('megamenu')->__('Item Information'));
    }

    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label'     => Mage::helper('megamenu')->__('Item Information'),
            'title'     => Mage::helper('megamenu')->__('Item Information'),
            'content'   => $this->getLayout()->createBlock('megamenu/adminhtml_menu_edit_tab_form')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }
}
