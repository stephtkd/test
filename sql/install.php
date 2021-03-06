<?php
/**
* 2007-2021 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright 2007-2021 PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
$sql = array();


$sql[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'sbu_privilege_code` (
    `id_privilege_code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_customer` INT(10) UNSIGNED NOT NULL,
    `privilege_code` VARCHAR(50) NULL DEFAULT NULL,
    `private_sponsor` TINYINT NULL DEFAULT 0,
    PRIMARY KEY  (`id_privilege_code`)
) ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8;';

$sql[] = "ALTER TABLE `"._DB_PREFIX_."sbu_privilege_code` ADD `private_sponsor2` TINYINT DEFAULT 0 AFTER `privilege_code`";

  

foreach ($sql as $query) {
        error_log("executing query " . $query);

if (Db::getInstance()->execute($query) == false) {
        error_log("display error = ".Db::getInstance()->displayError());
        error_log("get msg = ".Db::getInstance()->getMsgError());
        error_log("query ko");
            return false;
        }
        error_log("query ok");
}
