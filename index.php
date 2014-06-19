<?php
// получаем из базы нужный контент
$sql = "SELECT * FROM kafedra, disciplines";
$con = mysql_connect('localhost', 'root', '1234');
mysql_set_charset( 'utf8' ); // кодировка в которой с базой работаем
mysql_select_db('study', $con);
$result = mysql_query($sql); // получаем resource из базы данных

// конвертируем ресурс в массив PHP
$rows = array();
while($r = mysql_fetch_assoc($result)) {
    $rows[] = $r;
}

// преобразовываем информацию от СУБД в удобный для верстки формат
$array = [];
foreach ($rows as &$value) {
	if ($value[kaf_id] == $value[kaf_fkey_id])
	{
		$kaf = $value[kaf_name];
		$disc = $value[disc_name];
		$array[$kaf][] = $disc;
	}
}
var_dump($array);

header( 'Content-Type: text/html; charset=utf-8' );

// header('Content-Type: application/json');
// echo json_encode($array);

?>