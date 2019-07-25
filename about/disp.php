<?php
//Connection for database
$conn = mysqli_connect("localhost", "root", "", "fairuz");
 
//Select Database
$sql = "SELECT * FROM new_group";
$result = $conn->query($sql);
?>
<!doctype html>
<html>
<body>
<h1 align="center">Employee Details</h1>
<table border="1" align="center" style="line-height:25px;">
<tr>
<th>GroupName</th>
<th>username</th>
<th>About</th>
<th>Edit</th>
</tr>
<?php
//Fetch Data form database
if($result->num_rows > 0){
 while($row = $result->fetch_assoc()){
 ?>
 <tr>
 <td><?php echo $row['group_name']; ?></td>
 <td><?php echo $row['username']; ?></td>
 <td><?php echo $row['about']; ?></td>
 <!--Edit option -->
 <td><a href="edit.php?group_name=<?php echo $row['group_name']; ?>" alt="edit" >Edit</a></td>
 </tr>
 <?php
 }
}
else
{
 ?>
 <tr>
 <th colspan="2">There's No data found!!!</th>
 </tr>
 <?php
}
?>
</table>
</body>
</html>