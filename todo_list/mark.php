<?php
require_once 'init.php';

if(isset($_GET['as'], $_GET['item'])){
	$as = $_GET['as'];
	$item = $_GET['item'];
	$group_name = $_GET['group_name'];

	switch($as){
		case 'done':
				$doneQuery = $db->prepare("
					UPDATE items SET done = 1
					WHERE id = :item
					AND user = :user
					AND group_name = :group_name
					");

				$doneQuery->execute([
					'item' => $item,
					'user' => $_SESSION['user_id'],
					'group_name' => $group_name
					]);
		break;

	}
}

header('Location: ../todo_list/index_task.php?group_name='.$group_name.'')
?>