<?php
include('sql.php');
$name = $_POST['name'];
$alias = $_POST['alias'];
$kaf_id = $_POST['kaf_id'];
$id = insertDisc($name, $alias, $kaf_id);

header("Location: discipline.php?id=$id");
die();
?>