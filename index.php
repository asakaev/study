<?php

$sql = "SELECT * FROM kafedra, disciplines WHERE kafedra.id = disciplines.kafedra_id and kafedra.id = 1";
$con = mysql_connect('localhost', 'root', '1234');
mysql_select_db('study', $con);

$result = mysql_query($sql);

$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}

var_dump($rows);

// header('Content-Type: application/json');
// echo json_encode($rows);

?>