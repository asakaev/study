<?php
	require('sql.php');
	require("smarty/Smarty.class.php");

	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = true;
	$smarty->cache_lifetime = 0;
	$id = $_GET['id'];
	$disc = getdiscById($id);
	$smarty->assign('disc', $disc);
	$smarty->display('templates/header.tpl');
	$smarty->display('templates/discipline.tpl');
	$smarty->display('templates/footer.tpl');
?>
