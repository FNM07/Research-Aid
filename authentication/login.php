<?php include('server.php');
	if (isset($_SESSION['username'])) {
		header('location: ../u_profile.php');
  }?>

<!DOCTYPE html>
<html>
<head>
  <title>Research Aid</title>
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
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style_new.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="../css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/owl.theme.css" type="text/css" media="all">
	<link href="../css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../css/style_reg.css">
  
</head>
<body>


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
								<li><a href="../index.html" class="effect-3">Home</a></li>
								<li><a href="../about.html" class="effect-3">About</a></li>
								<li><a href="login.php" class="effect-3">Resources</a></li>
								<!--<li><a href="gallery.html" class="effect-3">Profile</a></li>-->
								<!--<li class="dropdown">-->
								<!--<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Pages <b class="caret"></b></a>-->
								<!--<ul class="dropdown-menu">-->
								<!--<li><a href="codes.html">Codes</a></li>-->
								<!--<li><a href="icons.html">Icons</a></li>-->
								<!--</ul>-->
								<!--</li>-->
								<li class="active"><a href="login.php" class="effect-3">Sign In</a></li>
								<li><a href="register.php" class="effect-3" name="sign_out">Sign Up</a></li>
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
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group_reg">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group_reg">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group_reg">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
  <!-- footer -->
	<div class="footer_top_agileits">
	
		<div class="container">
			<div class="col-md-4 footer_grid">
				</div>
			<div class="col-md-4 footer_grid">
				<h3>Contact Info</h3>
				<ul class="address">
					<li><i class="fa fa-map-marker" aria-hidden="true"></i>Department of CSE<span>Science Complex,University of Dhaka</span><span>Dhaka-1000</span></li>
					<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">Mail To:<span>munianusrat69@gmail.com</span><span>fairuznawermeem@gmail.com</span><span>anikatahsin456@gmail.com</span></a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i>+01924430479</li>
				</ul>
			</div>
		</div>
	</div>


	
	<!-- //modal -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<!-- stats -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<script src="../js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- owl carousel -->
	<script src="../js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({

				autoPlay: 3000, //Set AutoPlay to 3 seconds
				autoPlay: true,
				items: 3,
				itemsDesktop: [991, 2],
				itemsDesktopSmall: [414, 4]

			});
		}); 
	</script>
	<!-- //owl carousel -->


</body>

</html>