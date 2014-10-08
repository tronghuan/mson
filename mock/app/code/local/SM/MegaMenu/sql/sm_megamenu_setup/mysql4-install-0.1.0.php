<?php
/**
 * Created by PhpStorm.
 * User: gatre
 * Date: 10/8/14
 * Time: 6:55 AM
 */

$installer = $this;

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('sm_menu')};
CREATE TABLE {$this->getTable('sm_menu')} (
  `menu_id` int(11) unsigned NOT NULL auto_increment,
  `menu_title` varchar(255) NOT NULL default '',
  `menu_name` varchar(255) NOT NULL default '',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    ");

$installer->endSetup();