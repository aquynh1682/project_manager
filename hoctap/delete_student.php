<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbhelp.php');
	$sql = 'delete from user where id = '.$id;
	execute($sql);

	echo 'Xoá người dùng thành công';
}