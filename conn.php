<?php
function db_connect()
{
	include("config.php");
	$conn = new mysqli($host, $username_db, $password_db, $db_name);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function get_hash_utente()
{
	$conn = db_connect();
	$query = "SELECT password FROM iscritti";
	$result = $conn->query($query) or die("Unable to query");
	$logdb = mysqli_fetch_row($result);
	$conn->close();
	return $logdb[0];
}

function LogInUtente($email, $password)
{
	$hash = get_hash_utente();
	$conn = db_connect();
	$query = "SELECT * FROM iscritti";
	$result = $conn->query($query) or die("Unable to query");
	$logdb = mysqli_fetch_row($result);
	$conn->close();
	if ($logdb[3] == $email && password_verify($password, $hash)) {
		return true;
	} else return false;
}

function get_hash_admin()
{
	$conn = db_connect();
	$query = "SELECT password FROM admin";
	$result = $conn->query($query) or die("Unable to query");
	$logdb = mysqli_fetch_row($result);
	$conn->close();
	return $logdb[0];
}

function LogInAdmin($email, $password)
{
	$hash = get_hash_admin();
	$conn = db_connect();
	$query = "SELECT * FROM admin";
	$result = $conn->query($query) or die("Unable to query");
	$logdb = mysqli_fetch_row($result);
	$conn->close();
	if ($logdb[0] == $email && password_verify($password, $hash)) {
		return true;
	} else return false;
}


function task_all()
{
	$mysqli = db_connect();
	$sql = "SELECT task_id, task, categories.category_name, statutes.status_name FROM `task` INNER JOIN categories on task.category_id = categories.category_id INNER JOIN statutes on task.status = statutes.status_id ORDER BY `task_id` ASC";
	//var_dump($sql);
	$result = $mysqli->query($sql);
	$result->fetch_array();
	$mysqli->close();
	return $result;
}

function task_order_by_categoty($task)
{
	$mysqli = db_connect();
	if ($task == "") {
		$sql = "SELECT task_id, task, categories.category_name, statutes.status_name FROM `task` INNER JOIN categories on task.category_id = categories.category_id INNER JOIN statutes on task.status = statutes.status_id ORDER BY `category_name` ASC";
	} else {
		$sql = "SELECT task_id, task, categories.category_name, statutes.status_name FROM `task` INNER JOIN categories on task.category_id = categories.category_id INNER JOIN statutes on task.status = statutes.status_id ORDER BY `task` ASC";
	}
	//var_dump($sql);
	$result = $mysqli->query($sql);
	$result->fetch_array();
	$mysqli->close();
	return $result;
}

function task_search($task, $categorie)
{
	$mysqli = db_connect();
	$sql = "SELECT task_id, task, categories.category_name, statutes.status_name FROM `task` INNER JOIN categories on task.category_id = categories.category_id INNER JOIN statutes on task.status = statutes.status_id WHERE task LIKE '$task%' OR category_name LIKE '$categorie' ORDER BY `category_name` ASC";
	var_dump($sql);
	$result = $mysqli->query($sql);
	$result->fetch_array();
	$mysqli->close();
	return $result;
}