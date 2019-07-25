<?php
session_start();
//add_comment.php
$connect = new PDO('mysql:host=localhost;dbname=fairuz', 'root', '');

$as = $_GET['as'];
$item = $_GET['item'];
$group_name = $_GET['group_name'];

$error = '';
$tbl_comment_name = '';
$comment_name = '';
$comment_content = '';
$username = $_SESSION['username'];

 $comment_name = $username;


if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO tbl_comment 
 (username, group_name, tbl_comment_name,parent_comment_id, comment, comment_sender_name) 
 VALUES (:username, :group_name, :tbl_comment_name,:parent_comment_id, :comment, :comment_sender_name)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
    
   ':tbl_comment_name' => $item,
   ':parent_comment_id' => $_POST["comment_id"],
   ':comment'    => $comment_content,
   ':comment_sender_name' => $comment_name,
   ':username' => $_SESSION['username'],
   ':group_name' => $group_name
  )
 );
 $error = '<label class="text-success"></label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>
