<?php
	include 'conn.php';
	$conn = db_connect();
	$task = $_POST['task'];
	$category = $_POST['category'];
	$status = $_POST['status'];
			
	$sql= $conn->query(" INSERT INTO `task` (`task`, `category_id`, `status`) VALUES('$task', '$category', '$status') ");
	//var_dump($sql);
	header('location:admin_page.php');
?>