<html>
<head>
<style >
.img-thumbnail {
	position:absolute;left:40%;top:55%; height:35%; width:20%;
    border: 1px solid #eeeeee;
    border-radius: 4px;
    box-shadow: 0 1px 2px 0 #000;
    background: #ffffff;
    object-fit: contain;
}
</style>
</head>
<body>
<?php
session_start();
if(isset($_POST["action"]))
{
 $reg="";
 $connect = mysqli_connect("localhost", "root", "", "fairuz");
 
  $current_user = $_GET['username'];
 if($_POST["action"] == "fetch")
 {
  $query = "SELECT * FROM profile_image WHERE username='$current_user'";
  
  $result = mysqli_query($connect, $query);
  
  $row = mysqli_fetch_array($result);
   $output = '
   <br>
		<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'"class="img-thumbnail"  />

	 
	<!-- <br>
   	 <button type="button" name="create_group" class="btn btn-primary bt-xs delete" id="'.$row["id"].'" style="position:absolute; bottom:5; left:1200; height:35px; width:128px; background:#4682B4">Create Group</button>-->

   
   ';

  echo $output;
 }

 if($_POST["action"] == "create_group")
 {
	echo 'eeeeeeeeeeeee';
 }
 if($_POST["action"] == "update")
 {
  $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  $query = "UPDATE profile_image SET image = '$file' WHERE id = '".$_POST["image_id"]."'";
  $query1 = "";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Updated into Database';
  }
 }
 if($_POST["action"] == "delete")
 {
  $query = "DELETE FROM profile_image WHERE id = '".$_POST["image_id"]."'";
  if(mysqli_query($connect, $query))
  {
   echo 'Image Deleted from Database';
  }
 }
}
?>
</body>
</html>