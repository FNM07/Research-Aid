<?php
require_once 'init.php';
session_start();
$group_name = $_GET['group_name'];
if(isset($_POST['name'])){
	$name = trim($_POST['name']);
	

	if(!empty($name)){
		$addedQuery = $db->prepare("
			INSERT INTO items (username, name, group_name, user, done, created)
			VALUES (:username, :name, :group_name, :user, 0, NOW())
			");
			
			
		$addedQuery->execute([
			'name' => $name,
			'user' => $_SESSION['user_id'],
			'username' => $_SESSION['username'],
			'group_name' => $group_name
			]);	
	}
}

header('Location: ../todo_list/index_task.php?group_name='.$group_name.'');
?>