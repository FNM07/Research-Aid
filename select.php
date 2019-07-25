<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "fairuz");  
      $query = "SELECT * FROM profile WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>First Name</label></td>  
                     <td width="70%">'.$row["first_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Last Name</label></td>  
                     <td width="70%">'.$row["last_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Institution</label></td>  
                     <td width="70%">'.$row["institution"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Profession</label></td>  
                     <td width="70%">'.$row["profession"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Research Field</label></td>  
                     <td width="70%">'.$row["research_field"].'</td>  
                </tr>  
				
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 