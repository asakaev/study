<?php
	require('sql.php');
	require("smarty/Smarty.class.php");

	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = true;
	$smarty->cache_lifetime = 0;

	$smarty->display('templates/header.tpl');

	$chairs = getMainData();
	$smarty->assign('chairs', $chairs);

	$smarty->display('templates/index.tpl');
	$smarty->display('templates/footer.tpl');
?>