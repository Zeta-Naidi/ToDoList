<?php
		include 'conn.php';
		$conn = db_connect();
	if($_GET['task_id'] != ""){
		$task_id = $_GET['task_id'];
		
		$query = "UPDATE `task` SET `status` = '2' WHERE `task_id` = $task_id";
		$conn->query($query);
		var_dump($query);
		header('location: page_utente.php');
	}
?>