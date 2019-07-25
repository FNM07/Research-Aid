<?php
session_start();
//add_comment.php
$connect = new PDO('mysql:host=localhost;dbname=fairuz', 'root', '');
include("connect.php");
$user=$_SESSION['username'];

$joined_group = mysqli_real_escape_string($conn, $_POST["joined_group"]);
$research_topic = mysqli_real_escape_string($conn, $_POST["research_topic"]);  
$sql = "INSERT INTO new_group (group_name, username,topic) VALUES ( '$joined_group','$user','$research_topic')";
mysqli_query($conn, $sql);

$connect = new PDO('mysql:host=localhost;dbname=fairuz', 'root', '');
$username = $_SESSION['username'];

$query = "
SELECT * FROM new_group 
WHERE username = '$username'

";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
 $top = 660;

foreach($result as $row)
{
 $group_name = $row["group_name"];
 $top = $top + 30;
 $output .= '
   
  <div class="aaa" style = "position:absolute; right:80%; top: 650"><h3>Joined Groups</h3></div>
  <div class = "bbb" style = "position:absolute; top:'.$top.'px">
  <div class="aaa" style="margin-left:100px; top:'.$top.'px">
  <a href="members.php?as=comment&group_name='.$row["group_name"].'">
  '.$row["group_name"].' 
  </a>
  </div>
  </div>';
}
  echo $output;

?>
