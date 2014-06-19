<?php
include('sql.php');
$name = $_POST['name'];
$alias = $_POST['alias'];
$id = $_POST['id'];
$kaf_id = $_POST['kaf_id'];
$res = updateDisc($id, $name, $alias, $kaf_id);

header("Location: discipline.php?id=$id");
die();
?>