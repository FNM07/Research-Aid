<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: ../authentication/login.php');
  }
  if (isset($_GET['sign_out'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: ../index.html");
  }
  $current_user = $_SESSION['username'];
  $connect = mysqli_connect("localhost", "root", "", "fairuz");  
  $query = "SELECT * FROM profile WHERE username='$current_user'" ;  
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_array($result);
  $group_name = $_GET['group_name'];
      
require_once 'init.php';
$username = $_SESSION['username'];
$itemsQuery = $db->prepare("SELECT id, name, done FROM items WHERE user = :user and group_name = '$group_name'");

$itemsQuery->execute([
	'user' => $_SESSION['user_id']
	]);

$items = $itemsQuery->rowCount() ? $itemsQuery : [];
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Research Aid</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

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
	<link rel="stylesheet" href="../css/style_task.css">
	
	<link href="../css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
								<!--<li><a href="gallery.html" class="effect-3">Profile</a></li>-->
								<!--<li class="dropdown">-->
								<!--<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Pages <b class="caret"></b></a>-->
								<!--<ul class="dropdown-menu">-->
								<!--<li><a href="codes.html">Codes</a></li>-->
								<!--<li><a href="icons.html">Icons</a></li>-->
								<!--</ul>-->
								<!--</li>-->
                                <li><a href="../myreadpapers.php" class="effect-3">My Read Papers</a></li>

                                <li class="active"><a href="../u_profile.php" class="effect-3">Profile</a></li>
								<li><a href="index_task.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>
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
		<h3 class="heading-agileinfo"><?php echo $group_name; ?><span>  </span></h3>
		
			
				
				<h3>
						
							<ul class="nav navbar-nav">
								<li><a href="../members.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:840px; color:black">Members</a></li>
								<li><a href="../related_res.php?group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:400px; width:250px; color:black">Related Resources</a></li>
								<li><a href="index_task.php?group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:10px; width:250px; " >Progress Tracking</a></li>
							
							</ul>
						
					
					</h3>
				
		
		</div>
	</div>
<!-- //about -->



	<div class="list">
		<h1 class="header">Tasks to do</h1>

		<?php if(!empty($items)): ?>
		<ul class="items">
			<?php foreach($items as $item): ?>
				<li>
					<span class="item<?php echo $item['done'] ? ' done' : '' ?>"><?php echo $item['name']; ?></span>
					<?php if(!$item['done']) : ?>
					<a href="mark.php?as=done&item=<?php echo $item['id']; ?>&group_name=<?php echo $_GET['group_name'];?>" style="background:#7FB3D5">Mark as done</a>
					
					<?php endif; ?>
					<a href="../comment/index_comment.php?as=comment&item=<?php echo $item['name'];?>&group_name=<?php echo $_GET['group_name'];?>" style="background:#7FB3D5">Comment</a>
				</li>
			<?php endforeach; ?>
		
		</ul>
					
		<?php else: ?>
			<p>You havent added any items yet.</p>
		<?php endif; ?>

		<form class="item-add" action="add.php?group_name=<?php echo $_GET['group_name'];?>" method="post">
			<input type="text" name="name" placeholder="Type a new item here." class="input" autocomplete="off" required>
			<input type="submit" value="Add" class="submit" style="width:500px; position:absolute; right:423px">
		</form>
		
	</div>

<!-- footer -->
	
	
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
	

</body>

</html>
