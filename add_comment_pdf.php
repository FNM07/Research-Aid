<?php

//add_comment.php
session_start();

$connect = new PDO('mysql:host=localhost;dbname=fairuz', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';
$id = $_GET['id'];
echo $id;

    $comment_name = $_SESSION['username'];


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
 INSERT INTO pdf_tbl_comment 
 (parent_comment_id, comment, comment_sender_name, pdf_id) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name, :id)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':parent_comment_id' => $_POST["comment_id"],
            ':comment'    => $comment_content,
            ':comment_sender_name' => $comment_name,
            ':id' => $id
        )
    );
    $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
    'error'  => $error
);

echo json_encode($data);

?>