<?php
    session_start();
	include ("connect.php");
        $id=$_SESSION['paper_id'];
	$title=$_SESSION['title'];
	
if(!empty($_POST)){
 
        include ("connect.php");
        $summary = mysqli_real_escape_string($conn, $_POST['summary']);
         $summary = str_replace("\\r\\n", "\n", $summary);
	$username= $_SESSION['username'];
        $paper_id = $id;

	$dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");

	
        $stmt = $dbh->prepare("insert into Read_papers values('',?,?,?,?)");
        $stmt->bindParam(1,$username);
    	$stmt->bindParam(2,$title);
    	$stmt->bindParam(3,$summary);
	$stmt->bindParam(4,$paper_id);
    	$stmt->execute();

echo '<h4><b> My summary:</b></h4>
            <div  style="padding:15px 0px 0px 0px">
        <p> <h4>'.$summary.'</h4> </p>
            </div>';
   
}
?>
<html>
<body>
<br>
<br>
<br>
<form id="insert_form" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="pwd">Add related resources? </label>
        <input type="file" name="myfile"/>
    </div>

        <!-- <button data-dismiss="modal" align=>Add</button>-->
        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success">
</form>

<div id="ppt">


</div>

<script>
    $(document).ready(function(){

        $('.skillbar').skillBars({
            from: 0,
            speed: 4000,
            interval: 100,
            decimals: 0,
        });



        $('#insert_form').on("submit", function(event){
            event.preventDefault();
                $.ajax({
                    url:"insert_related_resources.php",
                    method:"POST",
                    data: new FormData(this),
                    contentType:false,
                    processData:false,
                    beforeSend:function(){
                        $('#insert').val("Inserting");
                    },
                    success:function(data){
                        $('#insert_form')[0].reset();

                        $('#ppt').html(data);
                    }
                });

        });

    });
</script>
</body>
</html>

