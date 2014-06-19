<?php
// подключаемся к базе и выполняем SQL запрос
function useSQL($sql) {
	$con = mysql_connect('localhost', 'root', '1234');
	mysql_set_charset( 'utf8' ); // кодировка в которой с базой работаем
	mysql_select_db('study', $con);
	$result = mysql_query($sql); // получаем resource из базы данных
	return $result;
}

// получаем данные для главной страницы
function getMainData() {
	// получаем из базы нужный контент
	$sql = "SELECT * FROM kafedra, disciplines";
	$result = useSQL($sql);

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
			$id = $value[id];
			$array[$kaf][$id] = $disc;
		}
	}
	return $array;
}

// получаем детальные данные о дисциплине
function getdiscById($id) {
	// получаем из базы нужный контент
	$sql = "SELECT * FROM kafedra, disciplines WHERE kafedra.kaf_id = disciplines.kaf_fkey_id and disciplines.id = $id";
	$result = useSQL($sql);

	// конвертируем ресурс в массив PHP
	$rows = array();
	while($r = mysql_fetch_assoc($result)) {
	    $rows[] = $r;
	}

	// преобразовываем информацию от СУБД в удобный для верстки формат
	$array = [];
	$array[name] = $rows[0][disc_name];
	$array[kaf_name] = $rows[0][kaf_name];
	$array[alias] = $rows[0][disc_alias];
	$array[id] = $rows[0][id];
    return $array;
}

// обновляем данные о дисциплине
function updateDisc($id, $name, $alias, $kaf_id) {
	$sql = "UPDATE disciplines SET disc_name = '$name', disc_alias = '$alias', kaf_fkey_id = '$kaf_id' WHERE id = '$id'";
	$result = useSQL($sql);
	return $result; // true or false
}

// получаем ID кафедры по её имени
function getKafedraIdByName($kaf_name) {
	$sql = "SELECT * FROM kafedra WHERE kaf_name = '$kaf_name' LIMIT 1";
	$result = useSQL($sql);
	$row = mysql_fetch_assoc($result);
	$id = intval($row[kaf_id]);
	return $id;
}

// получение списка всех кафедр
function getAllKafedras() {
	$sql = "SELECT * FROM kafedra";
	$result = useSQL($sql);

	// конвертируем ресурс в массив PHP
	$rows = array();
	while($r = mysql_fetch_assoc($result)) {
	    $rows[] = $r;
	}

	$array = [];
	foreach ($rows as &$value) {
		$id = $value[kaf_id];
		$name = $value[kaf_name];
		$array[$id] = $name;
	}

	return $array;
}

// добавление новой дисциплины
function insertDisc($name, $alias, $kaf_id) {
	$sql = "INSERT INTO disciplines VALUES (NULL, '$name', '$kaf_id', '$alias')";
	$result = useSQL($sql);
	$id = mysql_insert_id();
	return $id; // inserted ID
}

// $add = insertdisc('Новая дисциплина', 'НД', 3);
// var_dump($add);
// $kafs = getAllKafedras();
// var_dump($kafs);

// $id = getKafedraIdByName('Кафедра Финансов');
// updatedisc(1, 'test2', 'tst2');
// $res = getMainData();
// $id = 4;
// $res = getdiscById($id);
// выводим результат
// var_dump($res);
// header('Content-Type: text/html; charset=utf-8');
?>