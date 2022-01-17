<?php
		include 'conn.php';
		$conn = db_connect();
	if($_GET['task_id']){
		$task_id = $_GET['task_id'];
		
		$conn->query("DELETE FROM `task` WHERE `task_id` = $task_id");
		header("location: page_utente.php");
	}	
?>