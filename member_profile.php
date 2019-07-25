<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: authentication/login.php');
  }
  if (isset($_SESSION['sign_out'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.html");
  }
  $current_user = $_GET['username'];
  $connect = mysqli_connect("localhost", "root", "", "fairuz");  
  $query = "SELECT * FROM profile WHERE username='$current_user'" ;  
  $result = mysqli_query($connect, $query);
  $row = mysqli_fetch_array($result);
      
 ?>

<html>
	<!--<a href="u_profile.php?logout='1'">Logout</a>-->
	<head>  
  <title><?php echo $_GET['username']; ?>'s Profile</title>  
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
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style_new.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="//fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">
	
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
							<h1><span class="fa fa-book" aria-hidden="true"></span>Research Aid<label>Education</label></h1>
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
								<li><a href="member_profile.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>
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
	
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<!-- skills -->
	<script src="js/skill.bars.jquery.js"></script>
	
  <div class="container" style="width:900px;">  
   <h3 align="center"></h3>  
   <br />
   
   <br />
   <div id="image_data">

   </div>
  </div>  
 
   <div class="input-group" style="position: absolute;bottom:5;left:645">
    <button type="submit" name="view" id="<?php echo $row["id"];?>" value="view" class="btn btn-info btn-xs view_data" style="height:35px; width:100px; background:#4682B4">View Profile</button>
   </div>

   
	<!-- sign up modal -->
   
   
   
 </body>
 </html>
 
<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    
   </div>
   <div class="modal-body">
    <form id="image_form" method="post" enctype="multipart/form-data">
     <p><label>Select Image (max size: 2MB)</label>
     <input type="file" name="image" id="image" /></p><br/>
     <input type="hidden" name="action" id="action" value="insert"/>
     <input type="hidden" name="image_id" id="image_id" />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info"/>   
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>First Name</label>  
                          <input type="text" name="first_name" id="first_name" class="form-control" />  
                          <br />  
                          <label>Last Name</label>  
                          <input type="text" name="last_name" id="last_name" class="form-control"/>  
                          <br />  
						  <label>Institution</label>  
                          <input type="text" name="institution" id="institution" class="form-control"/>  
                          <br />
                          <label>Profession</label>  
                          <select name="profession" id="profession" class="form-control">  
                               <option value="teacher">Teacher</option>  
                               <option value="student">Student</option>  
                          </select>  
                          <br />  
                          <label>Research Field</label>  
                          <select name="research_field" id="research_field" class="form-control">  
                               <option value="artificial_intelligence">Artificial Intelligence (AI)</option>  
                               <option value="internet_of_things">Internet Of Things (IoT)</option>  
							   <option value="machine_learning">Machine Learning (ML)</option>  
                               <option value="data_mining">Data Mining</option> 
							   <option value="networking">Networking</option>  
                               <option value="graphics">Graphics</option> 
							   <option value="cloud_computing">Cloud Computing</option>  
                               <option value="fog_computing">Fog Computing</option> 
							   <option value="mobile_computing">Mobile Computing</option>  
                               <option value="bio_informatics">Bio-Informatics</option> 
							   <option value="natural_language_processing">Natural Language Processing (NLP)</option>  
                               <option value="robotics">Robotics</option> 
							   
                          </select>  
                          <br />  
                          <label>Published Papers</label>  
                          <input type="text" name="published_paper" id="published_paper" class="form-control" />  
                          <br />
						  <label>Ongoing Works</label>  
                          <input type="text" name="ongoing_work" id="ongoing_work" class="form-control" />  
                          <br />
				
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>


 <div id="joined_group_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_group_form">  
                          <label>Group Name</label>  
                          <input type="text" name="joined_group" id="joined_group" class="form-control" />  
                          <br />  
                          
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
 
<script>  
$(document).ready(function(){
 
			
			$('.skillbar').skillBars({
				from: 0,
				speed: 4000, 
				interval: 100,
				decimals: 0,
			});
			


 fetch_data();

 function fetch_data()
 {
  var action = "fetch";
  $.ajax({
   url:"member_action.php?as=comment&username=<?php echo $_GET['username']; ?>",
   method:"POST",
   data:{action:action},
   success:function(data)
   {
    $('#image_data').html(data);
   }
  })
 }	
 
 

 
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#first_name').val(data.first_name);  
                     $('#last_name').val(data.last_name);  
                     $('#institution').val(data.institution);  
                     $('#profession').val(data.profession);  
                     $('#research_field').val(data.research_field);  
                     $('#published_paper').val(data.published_paper);  
                     $('#ongoing_work').val(data.ongoing_work);  
                     
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#first_name').val() == "")  
           {  
                alert("First Name is required");  
           }  
           else if($('#last_name').val() == '')  
           {  
                alert("Last Name is required");  
           }  
           else if($('#institution').val() == '')  
           {  
                alert("Institution is required");  
           }  
             
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });

	////////////////////////////////////////////////////////
	$(document).on('click', '.joined_group', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#joined_group').val(data.joined_group);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#joined_group_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_group_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#joined_group').val() == "")  
           {  
                alert("Group Name is required");  
           }  
           
             
           else  
           {  
                $.ajax({  
                     url:"insert_group.php",  
                     method:"POST",  
                     data:$('#insert_group_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_group_form')[0].reset();  
                          $('#joined_group_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });
	  
 });




</script>


