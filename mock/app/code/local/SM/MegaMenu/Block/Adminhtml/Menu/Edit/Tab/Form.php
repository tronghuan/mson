<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/8/14
 * Time: 2:37 PM
 */
class SM_MegaMenu_Block_Adminhtml_Menu_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('web_form', array('legend'=>Mage::helper('megamenu')->__('Item information')));

        $fieldset->addField('menu_title', 'text', array(
            'label'     => Mage::helper('megamenu')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'menu_title',
        ));

        $fieldset->addField('menu_name', 'text', array(
            'label'     => Mage::helper('megamenu')->__('Name'),
            'class'     => 'required-entry',
            'required'  => false,
            'name'      => 'menu_name',
        ));

        if ( Mage::getSingleton('adminhtml/session')->getWebData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getWebData());
            Mage::getSingleton('adminhtml/session')->setWebData(null);
        } elseif ( Mage::registry('menu_data') ) {
            $form->setValues(Mage::registry('menu_data')->getData());
        }
        return parent::_prepareForm();
    }
}