<?php
session_start();
//fetch.php
 $group_name = $_GET['group_name'];
 	
if(isset($_POST["query"]))
{
 $connect = mysqli_connect("localhost", "root", "", "fairuz");
 $request = mysqli_real_escape_string($connect, $_POST["query"]);
  
 $query = "
  SELECT * FROM profile 
  WHERE username LIKE '%".$request."%' 
  OR first_name LIKE '%".$request."%' 	
  OR last_name LIKE '%".$request."%'
 ";
 
 $result = mysqli_query($connect, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>UserName</th>
    <th>First Name</th>
    <th>Last Name</th>
	<th>Profession</th>
	<th>Research Field</th>
	<th>Add Member</th>
   </tr>
  ';
  
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["username"];
   $data[] = $row["first_name"];
   $data[] = $row["last_name"];
   
   $html .= '
   <tr>
    <td>'.$row["username"].'</td>
    <td>'.$row["first_name"].'</td>
    <td>'.$row["last_name"].'</td>
	<td>'.$row["profession"].'</td>
	<td>'.$row["research_field"].'</td>
	<!--<td><input type="submit" class="btn btn-info" id="'.$row["username"].'" value="ADD" name="btnAdd"></td>-->
	<td><a href="member_add.php?group_name='.$group_name.'&member_name='.$row["username"].'" class="btn btn-default reply" id="'.$row["username"].'">ADD</a></td>
   </tr>
   ';
   
  }
	
 }
 else
 {
	 echo 'Member Already Added';
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
  
 $html .= '</table>';
 
 if(isset($_POST['typehead_search']))
 {
  echo $html;
  
 }
 
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
 
}


?>
