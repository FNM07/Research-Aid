<?php
session_start();
echo "eeeeeeeeeeeeeeeee";
//add_comment.php
$connect = new PDO('mysql:host=localhost;dbname=fairuz', 'root', '');
$group_name = $_GET['group_name'];
$member_name = $_GET['member_name'];

 $query = "
 INSERT INTO new_group 
 (username, group_name) 
 VALUES (:username, :group_name)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    
   ':group_name' => $group_name,
   ':username' => $member_name
  )
 );

header('location: ../members.php?group_name='.$group_name.'');
?>
