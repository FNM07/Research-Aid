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
                            <li><a href="myreadpapers.php" class="effect-3">My Read Papers</a></li>

                            <li class="active"><a href="u_profile.php" class="effect-3">Profile</a></li>
							<li><a href="members.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>						
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
						
							<ul class="nav navbar-nav" class="link-effect-2">
								<li><a href="members.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:840px">Members</a></li>
								
								<li><a href="related_res.php?group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:400px; width:250px; color: black">Related Resources</a></li>
								<!--<li><a href="gallery.html" class="effect-3">Profile</a></li>-->
								<!--<li class="dropdown">-->
								<!--<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Pages <b class="caret"></b></a>-->
								<!--<ul class="dropdown-menu">-->
								<!--<li><a href="codes.html">Codes</a></li>-->
								<!--<li><a href="icons.html">Icons</a></li>-->
								<!--</ul>-->
								<!--</li>-->
								<li><a href="todo_list/index_task.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>" class="effect-3" style="position:absolute; right:10px; width:250px; color:black" >Progress Tracking</a></li>
							
							</ul>
						
					
					</h3>
				
		
		</div>
	</div>
<!-- //about -->



<div class="welcome">
		<div class="container">
				<h3>
						
							
								<?php

								//member_name

								$connect = new PDO('mysql:host=localhost;dbname=fairuz', 'root', '');								

								$query = "
								SELECT * FROM new_group 
								WHERE group_name = '$group_name'

								";

								$statement = $connect->prepare($query);

								$statement->execute();

								$result = $statement->fetchAll();
								$output = '';
								$top = 650;

								foreach($result as $row)
								{
									$member_name = $row["username"];
									$top = $top + 30;
									$output .= '
 
									<div class="aaa" style = "position:absolute; right:1050px; top: 650"><h3></h3></div>
									<div class = "bbb" style = "position:absolute; top:'.$top.'px">
									<div class="aaa" style="margin-left:100px; top:'.$top.'px">
									<a href="member_profile.php?as=comment&username='.$row["username"].'">
									'.$row["username"].' 
									</a>
									</div>
									</div>
  
									';
 
								}

								echo $output;

								?>


							
						
					
					</h3>
				
		
		</div>
	</div>


 
<a href="member_search/index_search.php?as=comment&group_name=<?php echo $_GET['group_name']; ?>">
  <img id="fiximg"src="images/add.png" back width=100 height=100 align="right" >
</a>
	</div>

        </div>





<!-- //about -->


<!--ADD MODAL-->

 <!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog"  style="position:absolute; left:100px; width:100px">
    
      <!-- Modal content-->

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title" align = "center">Add a paper</h4>
        </div>
        <div class="modal-body">
            <form id="insert_form" method="post">
    <div class="form-group">
      <label for="usr">Paper Title:</label>
      <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
      <label for="pwd">Link:</label>
      <input type="text" class="form-control" id="link" name="link">
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

<!-- //skills -->

</body>
</html></title>
</head>
<body>

</body>
</html>
