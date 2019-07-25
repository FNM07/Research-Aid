<?php
include('connect.php');

$table=$_SESSION['table'];
$username=$_SESSION['username'];
$output="";
$display = mysqli_query($conn,"select count(title) from Resources where field='".$table."'");
$row = mysqli_fetch_array($display);
$output="";
$added =0;
$total = $row[0];

if($total==0)
{
	$output.='<h3>Nothing added yet in this section.</h3>';

}
else{
//$display = mysqli_query($conn,"select * from Resources where field='".$table."'") ;*/
$dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");

$STM = $dbh->prepare("SELECT  * FROM Resources where field='$table'");
$output="";

$STM->execute();			
$STMrecords = $STM->fetchAll();


?>


      <table class="table table-striped">  
                    <thead style="text-align:center">
         <tr>
            <th> <h3>Paper Title</h3></th>

         </tr>
         </thead>
          <tbody>

 <?php
     foreach($STMrecords as $row)
{
    
	$STM2 = $dbh->prepare("SELECT  * FROM Read_papers where username='$username'");
	$STM2->execute();			
	$STMrecords2 = $STM2->fetchAll();
	foreach($STMrecords2 as $row2)
	{

		if($row['id'] == $row2['paper_id'])
		{
			$added= 1;
		}
	}

      

 $output.="   
      
 <tr>
	
	<td align='left'> <a href='pdfviewer.php?id=".$row['id']."' target='_blank'> <h4>".$row['title']."</a></h4> </td>";
        $output.="<td><h5 style='color:black;'>-Added by ".$row['addedby']."  </h5> </td>";

if($added==0)

{
	$output.="<td><h5 style='color:red;'> Not added to read papers </h5> </td>
       
	
      </tr>
      " ;
}

else if($added==1)

{
	$output.="<td> <h5 style='color:green;'> Added to read papers </h5> </td>
       
	
      </tr>
      " ;
   $added =0;
}
     
     }
    
    
  $output.= "</tbody>";


  	//echo $output; 

}

 $output.= "</table>";

  	echo $output; 



?>







  	
	
	
