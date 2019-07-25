
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: authentication/login.php');
  }
  if (isset($_GET['sign_out'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
  }
  $current_user = $_SESSION['username'];
  $connect = mysqli_connect("localhost", "root", "", "fairuz");  
  $query = "SELECT * FROM profile WHERE username='$current_user'" ;  
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_array($result);
      
 ?>
<!DOCTYPE html>
<html>

<head>
	<title>Research Aid</title><!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
      <meta charset="utf-8">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Instruction Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}




	</script>
	<!--//tags -->
    		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style_new.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<!-- header -->
<div class="header-1">
	<div class="content white agile-info">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">
						<h1><span class="fa fa-book" aria-hidden="true"></span> Research Aid <label>Education</label></h1>
					</a>
				</div>
				<!--/.navbar-header-->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-2" id="link-effect-2">
						<ul class="nav navbar-nav">
								<li><a href="home.html" class="effect-3">Home</a></li>
								<li><a href="s_about.html" class="effect-3">About</a></li>
								<li><a href="services.php" class="effect-3">Resources</a></li>
								<!--<li><a href="gallery.html" class="effect-3">Profile</a></li>-->
								<!--<li class="dropdown">-->
								<!--<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Pages <b class="caret"></b></a>-->
								<!--<ul class="dropdown-menu">-->
								<!--<li><a href="codes.html">Codes</a></li>-->
								<!--<li><a href="icons.html">Icons</a></li>-->
								<!--</ul>-->
								<!--</li>-->
								<li class="active"><a href="myreadpapers.php" class="effect-3">My Read papers</a></li>
								
								<li><a href="u_profile.php" class="effect-3">Profile</a></li>
								<li><a href="myreadpapers.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>
							
						</ul>
					</nav>
				</div>
				<!--/.navbar-collapse-->
				<!--/.navbar-->
			</div>
		</nav>
	</div>
</div>
<!-- //header -->
<!-- about -->

<div class="welcome">
	<div class="container">
		<h3 class="heading-agileinfo">My read papers<span>  </span></h3>
               <div id="employee_table">
		<table class="table table-striped">




<?php
include('connect.php');

$username=$_SESSION['username'];
$output="";
$display = mysqli_query($conn,"select count(title) from Read_papers where username='".$username."'");
$row = mysqli_fetch_array($display);
$output="";
$added =0;
$total = $row[0];

if($total==0)
{
	$output.='<h3>Nothing added yet in this section.</h3>';



}else{
//$display = mysqli_query($conn,"select * from Resources where field='".$table."'") ;*/
$dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");

$STM = $dbh->prepare("SELECT  * FROM Read_papers where username='$username'");
$output="";

$STM->execute();			
$STMrecords = $STM->fetchAll();


?>


      <table class="table table-striped">  
                    <thead style="text-align:center">
         <tr>
            <th> <h3>Paper Title</h3></th>
	<th> <h3>Summary</h3></th>

         </tr>
         </thead>
          <tbody>

 <?php
     foreach($STMrecords as $row)
{
    
	

      

 $output.="   
      
 <tr>
	
	<td align='left' class='container1'><div> <a href='view_my_paper.php?id=".$row['paper_id']."' target='_blank'> <h4>".$row['title']."</a></h4></div> </td>
        <td class='container1'><div><h4>".$row['summary']."</a></h4> </div>  </td>

      ";


     }
    
    
 


  	//echo $output; 

}
 $output.= "</tbody>";
 $output.= "</table>";

  	echo $output; 



?>
  
 </div>




</div>
</div>






<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- skills -->
<script src="js/skill.bars.jquery.js"></script>
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
   					 if($('#title').val() == "")  
					  {  
 					  alert("Title is required");  
 						 }  

 					
   
 					 else  
 					 {  
 						  $.ajax({  
 						   url:"insert_res.php",  
						    method:"POST",  
						    data: new FormData(this),
                             contentType:false,
                             processData:false,
						    beforeSend:function(){  
 						    $('#insert').val("Inserting");  
						    },  
 						   success:function(data){  
  						   $('#insert_form')[0].reset();  
  						   $('#myModal').modal('hide');
  						   $(".modal-backdrop").remove();
  						   $('#employee_table').html(data);  
  							  }  
   							});  
 							 }  
 							});

		});
	</script>
<!-- //skills -->
<!-- footer -->
	<!-- footer -->


	<!-- //sign up modal    //blue: 1da1f2  //pink: ff4f81-->

	<div class="modal about-modal fade" id="SignupModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">

						<h2>Signup </h2>
						<form>
							<div class="lable">
								<div class="col_1_of_2 span_1_of_2">	<input type="text" class="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" id="active"></div>
								<div class="col_1_of_2 span_1_of_2"><input type="text" class="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}"></div>
								<div class="clear"> </div>
							</div>
							<div class="lable-2">
								<input type="text" class="text" value="your@email.com " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'your@email.com ';}">
								<input type="password" class="text" value="Password " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password ';}">
							</div>

							<div class="submit">
								<input type="submit" onclick="myFunction()" value="Create account" >
							</div>
							<div class="clear"> </div>
						</form>
						<!-----//end-main---->




				</div>
			</div>
		</div>
	</div>

	<!-- sign up modal -->



</body>
</html></title>
</head>
<body>

</body>
</html>
