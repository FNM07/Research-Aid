<?php
include("connect.php");
session_start();
$item = 'Task1';

$username = $_SESSION['username'];
?>



<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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

<style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>


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
                            <li><a href="services.php" class="effect-3">Resources</a></li>
                            <!--<li><a href="gallery.html" class="effect-3">Profile</a></li>-->
                            <!--<li class="dropdown">-->
                            <!--<a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">Pages <b class="caret"></b></a>-->
                            <!--<ul class="dropdown-menu">-->
                            <!--<li><a href="codes.html">Codes</a></li>-->
                            <!--<li><a href="icons.html">Icons</a></li>-->
                            <!--</ul>-->
                            <!--</li>-->
							<li><a href="profile.html" class="effect-3">My Read Papers</a></li>

                            <li class="active"><a href="u_profile.php" class="effect-3">Profile</a></li>
                            <li><a href="profile.html" class="effect-3">Sign Out</a></li>
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

   <div class="container-fluid">
    <div class="row content">
    <div class="col-sm-3 sidenav">
   
    <div style="padding: 0px 0px 0px 0px">
    <h2 style="color:blue">Group1</h2>
    <h4>Munia</h4>
    <h4>Fairuz</h4>
    <h4>Anika</h4>
    </div>
   
    </div>

    <div class="col-sm-9">
  

      <?php
       $output="";
       //for($i=0;$i<2;$i++)


           /*$output.='<div style="padding:150px 0px 100px 100px">
                <h2> There will be Task</h2>

               <div>


                 <h3> there will be solution</h3>

                <h3> there will be comment section </h3>
               </div>

           </div>';*/

               $output.=' <hr>
      <h2>Task</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by Jane Dane, Sep 27, 2015.</h5>
   
      <p>There will be task</p>
  
      
    
      <hr>
      <h2>My solution</h2>
      <h5><span class="glyphicon glyphicon-time"></span> Post by John Doe, Sep 24, 2015.</h5>
      
      <p>there will be solution</p>
      <hr>
      <div style="padding: 0px 0px 100px 0px">
	  
	  
      <div class="container" style="width:100%">
   <form method="POST" id="comment_form">
    <div class="form-group">
     <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    </div>
    <div class="form-group">
     <input type="hidden" name="comment_id" id="comment_id" value="0" />
     <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
	 
    </div>
   </form>
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
 ';



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

		});
	</script>
<!-- //skills -->


</body>
</html>

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"comment/comment.php?as=comment&item=<?php echo $_GET['item']; ?>&group_name='Group1'",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
	  
   url:"comment/fetch_comment.php?as=comment&item=<?php echo $_GET['item']; ?>&group_name='Group1'",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_content').focus();
 });
 
});
</script>

