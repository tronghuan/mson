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
//    function buildMenu($menu, $parentId=0){
//        $menuList = "<ul>";
//        if (array_key_exists($parentId, $menu)) {
//            foreach($menu as $sub) {
//                if($sub[parentId] == $parentId){
//                $menuList .= "<li>".$sub['name'];
//                $menuList .= $this->buildMenu($menu, $sub['id']);
//                $menuList.="</li>";
//                }
//            }
//        }
//        $menuList .= "</ul>";
//        return $menuList;
//    }
    public function getChildMenu(){
        $listMenu = Mage::getModel('megamenu/menu')->getCollection()->getData();
        $menuData=array();
        foreach ($listMenu as $value)
        {
            $menuData['menu'][$value['menu_id']] = $value;
            $menuData['parent'][$value['parent_id']][] = $value['menu_id'];
        }

        return $menuData ;
    }
    public function getMenu($parent=0, $menuData=null)
    {

        $menuData = $this->getChildMenu();
        $html = "";
        if (isset($menuData['parent'][$parent])) {
            if($parent==0){
                $html .= "<ul><li><a href='".$this->getBaseUrl()."'>Home</a></li>";
            }else{
                $html .= "<ul class='submenu one_col'>";
            }

            foreach ($menuData['parent'][$parent] as $value) {
                $html .= "<li>";
                $html .= "<a href='".$menuData['menu'][$value]['custom_link']."'>" . $menuData['menu'][$value]['menu_name'] . "</a>";
                $html .= $this->getMenu($value, $menuData);
                $html .= "</li>";
            }
            $html .= "</ul>";
        }
        return $html;
    }
//    function getMenu(){
//        $menu=Mage::getModel('megamenu/menu')->getCollection();
//        $ids = $menu->getAllIds();
//        $arr = array();
//        if($ids){
//            foreach($ids as $id){
//                $menu = Mage::getModel('megamenu/menu');
//                $menu->load($id);
//                $arr[]=array(   'id'=>$id,
//                                'name'=>$menu->getMenuName(),
//                                'parentId'=>$menu->getParentId());
//            }
//        }
////        echo "<pre>";
////        print_r($arr);
////        die();
//    }
}