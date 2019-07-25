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
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style_new.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="../css/owl.carousel.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/owl.theme.css" type="text/css" media="all">
	<link href="../css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>  
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
								<li><a href="../home.html" class="effect-3">Home</a></li>
								<li><a href="../s_about.html" class="effect-3">About</a></li>
                                <li><a href="../services.php" class="effect-3">Resources</a></li>
                                <li><a href="../myreadpapers.php" class="effect-3">My Read Papers</a></li>

                                <li class="active"><a href="../u_profile.php" class="effect-3">Profile</a></li>
								<li><a href="index_search.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>
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
	
<!-- //about -->

	
 
  <br /><br />
  <div class="container">
   <h2 align="center"><?php echo $group_name ?><span>  </span></h2>
   <br /><br />
   <label>Search Members to Add</label>
   <div id="search_area">
    <input type="text" name="employee_search" id="employee_search" class="form-control input-lg" autocomplete="off" placeholder="Type Name" />
   </div>
   <br />
   <br />
   <div id="employee_data"></div>
  </div>
 	
	<!-- //modal -->

	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- stats -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->
	<!-- owl carousel -->
	<script src="js/owl.carousel.js"></script>
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
<script>
$(document).ready(function(){
 
 load_data('');
 
 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"fetch_search.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#employee_data').html(data);
   }
  });
 }
 
 $('#employee_search').typeahead({
  source: function(query, result){
   $.ajax({
    url:"fetch_search.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data){
     result($.map(data, function(item){
      return item;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });
 
 $(document).on('click', 'li', function(){
  var query = $(this).text();
  load_data(query);
 });
 
});
</script>