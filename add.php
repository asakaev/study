<?php
	require('sql.php');
	require("smarty/Smarty.class.php");

	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = true;
	$smarty->cache_lifetime = 0;

	$kafs = getAllKafedras();

	$smarty->assign('kafs', $kafs);

	$smarty->display('templates/header.tpl');
	$smarty->display('templates/add.tpl');
	$smarty->display('templates/footer.tpl');
?>