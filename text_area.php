<?php  
 $connect = mysqli_connect("localhost", "root", "", "fairuz");  
 $messsage = '';  
 if(isset($_POST["add"]))  
 {  
      if(!empty($_POST["profile"]))  
      {  
           $sql = "  
                INSERT INTO profile (joined_group)  
                SELECT '".$_POST["profile"]."' FROM profile
				WHERE username='anika' &&
                WHERE NOT EXIST(  
                 SELECT joined_group FROM profile WHERE joined_group = '".$_POST["profile"]."'  
                ) LIMIT 1  
           ";  
           if(mysqli_query($connect, $sql))  
           {  
                $insert_id = mysqli_insert_id($connect);  
                if($insert_id != '')  
                {  
                     header("location:text_area.php?inserted=1");  
                }  
                else  
                {  
                     header("location:text_area.php?already=1");  
                }  
           }  
      }  
      else  
      {  
           header("location:text_area.php?required=1");  
      }  
 }  
 if(isset($_GET["inserted"]))  
 {  
      $message = "Group inserted";  
 }  
 if(isset($_GET["already"]))  
 {  
      $message = "Group Already inserted";  
 }  
 if(isset($_GET["required"]))  
 {  
      $message = "Group Name Required";  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | MySQL Insert record if not exists in table</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">  
                <label class="text-danger">  
                <?php  
                if($message!= '')  
                {  
                     echo $message;  
                }  
                ?>  
                </label>  
                <h3 align="">Insert Data</h3><br />                 
                <form method="post">  
                     <label>Enter Group Name</label>  
                     <input type="text" name="brand" class="form-control" />  
                     <br />  
                     <input type="submit" name="add" class="btn btn-info" value="Add" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  