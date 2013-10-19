<?php

// put full path to Smarty.class.php
require('/usr/lib/php5/Smarty/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir('/var/www/templates');
$smarty->setCompileDir('/var/www/smarty/templates_c');
$smarty->setCacheDir('/var/www/smarty/cache');
$smarty->setConfigDir('/var/www/smarty/configs');

$smarty->assign('joe', 'Neddy');
$smarty->display('test.tpl');

?>
