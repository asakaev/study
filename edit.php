<?php
	require('sql.php');
	require("smarty/Smarty.class.php");

	$smarty = new Smarty;

	$smarty->debugging = false;
	$smarty->caching = true;
	$smarty->cache_lifetime = 0;
	$id = $_GET['id'];
	$disc = getdiscById($id);
	$kafs = getAllKafedras();

	$smarty->assign('disc', $disc);
	$smarty->assign('kafs', $kafs);
	$smarty->display('templates/header.tpl');
	$smarty->display('templates/edit.tpl');
	$smarty->display('templates/footer.tpl');

?>
