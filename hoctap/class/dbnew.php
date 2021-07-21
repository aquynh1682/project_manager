<?php
require_once ('confignew.php');

function execute($sql) {
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	//query
	mysqli_query($conn, $sql);

	//dong connection
	mysqli_close($conn);
}

function executeResult($sql) {

	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

	$resultset = mysqli_query($conn, $sql);
	$list      = [];
	while ($row = mysqli_fetch_array($resultset, 1)) {
		$list[] = $row;
	}

	//dong connection
	mysqli_close($conn);

	return $list;
}