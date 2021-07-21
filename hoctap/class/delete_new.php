<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbnew.php');
	$sql = 'delete from news where id = '.$id;
	execute($sql);

	echo 'Xoá tin tức thành công';
}