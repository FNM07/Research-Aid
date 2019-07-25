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
	<title>Research Aid</title>
	<!--/tags -->
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
							<li><a href="index.html" class="effect-3">Home</a></li>
							<li><a href="about.html" class="effect-3">About</a></li>
                            <li class="active"><a href="services.php" class="effect-3">Resources</a></li>
				                <li><a href="myreadpapers.php" class="effect-3">My Read papers</a></li>
							           
							<li><a href="u_profile.php" class="effect-3">Profile</a></li>
							<li><a href="resources.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a>
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


 <?php


include('topic_type.php');
$_SESSION['table']=$table;


?>
<div class="welcome">
	<div class="container">
		<h3 class="heading-agileinfo"><?php echo $topic?><span>  </span></h3>
               <div id="employee_table">
		<table class="table table-striped">
  
<?php

include('show_table.php');

?>

</div>

 <button class="btn btn-success btn-xs edit_data" id ="fiximg" style="height:40px;width:100px">Add papers</button>

	</div>

        </div>





<!-- //about -->


<!--ADD MODAL-->

 <!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title" align = "center">Add a paper</h4>
            </div>
            <div class="modal-body">
                <form id="insert_form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Paper Title:</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Link:</label>
                        <input type="file" name="myfile"/>
                    </div>

            </div>

            <div class="modal-footer">
                <!-- <button data-dismiss="modal" align=>Add</button>-->

                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success">

            </div>

            </form>

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

                         $(document).on('click', '.edit_data', function(){  
    
                     $('#myModal').modal('show');  
           
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
	<!-- sign up modal -->



</body>
</html></title>
</head>
<body>

</body>
</html>
