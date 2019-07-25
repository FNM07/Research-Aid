<?php


session_start();
include("connect.php");
$paper_id = $_SESSION['paper_id'];
$display = mysqli_query($conn,"select summary from Read_papers where paper_id=".$paper_id);
$row = mysqli_fetch_array($display);
$username = $_SESSION['username'];

$summary = $row[0];

if(!empty($_POST)){
$summary = mysqli_real_escape_string($conn, $_POST['summary']);
$summary = str_replace("\\r\\n", "\n", $summary);
$sql = "UPDATE Read_papers SET summary='".$summary."' WHERE paper_id=".$paper_id." and username='".$username."'";
mysqli_query($conn, $sql);






echo '
	<h4><b> My summary:</b></h4>
            <div  style="padding:15px 0px 0px 0px">
        <p> <h4>'.$summary.'</h4> </p>
            </div>'
     
	;


}
?>
