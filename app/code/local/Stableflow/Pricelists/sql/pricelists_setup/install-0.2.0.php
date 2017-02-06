<?php

$installer = $this;
$installer->startSetup();


$installer->run("
CREATE TABLE `{$this->getTable('pricelists/pricelist')}` (
 `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `id_company` int(10) NOT NULL,
 `filename` varchar(255) NOT NULL,
 `date` date NOT NULL,
 `configurations` varchar(255),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8
");

 
$installer->endSetup();