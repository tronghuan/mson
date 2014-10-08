<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/8/14
 * Time: 7:00 AM
 */
class SM_MegaMenu_Block_Adminhtml_Menu_Grid extends Mage_Adminhtml_Block_Widget_Grid{
    public function __construct(){
        parent::__construct();
        $this->setId('menuGrid');
        $this->setDefaultSort('menu_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection(){
        $collection = Mage::getModel('megamenu/menu')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {
        $this->addColumn('menu_id', array(
            'header'    => Mage::helper('megamenu')->__('ID'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'menu_id',
        ));

        $this->addColumn('menu_title', array(
            'header'    => Mage::helper('megamenu')->__('Title'),
            'align'     =>'left',
            'index'     => 'menu_title',
        ));

        $this->addColumn('menu_name', array(
            'header'    => Mage::helper('megamenu')->__('Name'),
            'width'     => '150px',
            'index'     => 'menu_name',
        ));
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('megamenu')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('megamenu')->__('Delete'),
                        'url'       => array('base'=> '*/*/delete'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
            ));

        return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}