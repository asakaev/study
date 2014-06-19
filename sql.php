<?php

function getMainData() {
	// получаем из базы нужный контент
	$sql = "SELECT * FROM kafedra, desciplines";
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
			$desc = $value[desc_name];
			$id = $value[id];
			$array[$kaf][$id] = $desc;
		}
	}
	return $array;
}

// Получаем детальные данные о дисциплине
function getDescById($id) {
	// получаем из базы нужный контент
	$sql = "SELECT * FROM kafedra, desciplines WHERE kafedra.kaf_id = desciplines.kaf_fkey_id and desciplines.id = $id";
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
	$array[name] = $rows[0][desc_name];
	$array[kaf_name] = $rows[0][kaf_name];
	$array[alias] = $rows[0][desc_alias];
	$array[id] = $rows[0][id];

    return $array;
}

// $res = getMainData();

// выводим результат
// var_dump($res);
// header( 'Content-Type: text/html; charset=utf-8' );
?>