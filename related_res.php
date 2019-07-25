
<?php


session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['sign_out'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
  }
  $group_name = $_GET['group_name'];

?>


<!DOCTYPE html>
<html>

<head>
	<title>Research Aid</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style_new.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">


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
                            <li><a href="myreadpapers.php" class="effect-3">My Read Papers</a></li>

                            <li class="active"><a href="u_profile.php" class="effect-3">Profile</a></li>
							<li><a href="services.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>
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

<!-- about -->
	<div class="welcome">
		<div class="container">
		<h3 class="heading-agileinfo"><?php echo $group_name; ?><span>  </span></h3>
			
				
				<h3>
						
							<ul class="nav navbar-nav">
								<li><a href="members.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:840px; color:black">Members</a></li>
								<li><a href="related_res.php?group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:400px; width:250px; ">Related Resources</a></li>
								<li><a href="todo_list/index_task.php?group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:10px; width:250px; color:black" >Progress Tracking</a></li>
							
							</ul>
						
					
					</h3>
				
		
		</div>
	</div>
<!-- //about -->


                 


<?php

include("connect.php");
$group_name=$_GET['group_name'];
$output="";
$display = mysqli_query($conn,"select topic from new_group where group_name='".$group_name."'");
$row = mysqli_fetch_array($display);

$topic = $row[0];

$display = mysqli_query($conn,"select count(title) from Resources where field='".$topic."'");
$row = mysqli_fetch_array($display);

$total = $row[0];

if($total==0)
{
	$output.='<h3 align="center"> No available related resources </h3>';

}
else{
//$display = mysqli_query($conn,"select * from Resources where field='".$table."'") ;

$select_query = "SELECT * FROM Resources where field= '". $topic."'";
     $result = mysqli_query($conn, $select_query);
     $output.='<thead>
		 <tr>
                 <th> <h3 align="center">Paper Title</h3></th><br>
                 </tr>
                  </thead>
                 <tbody>';

     while($row = mysqli_fetch_array($result))
     {
      $output .= "
 <tr>
	<td> <a href='pdfviewer.php?id=".$row['id']."' target='_blank'> <h4 align='center'>".$row['title']."</a></h4> </td><br>
	
      </tr>
       
      ";
     }
     
    }
    $output .= '</tbody></table>';


    echo $output;


?>



                
                </div>

	</div>

        </div>





<!-- //about -->

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
		});
	</script>
<!-- //skills -->
<!-- footer -->
	<!-- footer -->

</body>
</html>
