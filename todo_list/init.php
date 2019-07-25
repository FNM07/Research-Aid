<?php


$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=fairuz;host=localhost', 'root', '');

if(!isset($_SESSION['user_id'])){
	die('You are not logged in.');
}
?>