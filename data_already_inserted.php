<?php  
 $connect = mysqli_connect("localhost", "root", "", "fairuz");  
 $message = '';  
 if(isset($_POST["add"]))  
 {  
      if(!empty($_POST["brand"]))  
      {  
           $sql = "  
                INSERT INTO brand (brand_name)  
                SELECT '".$_POST["brand"]."' FROM brand  
                WHERE NOT EXIST(  
                 SELECT brand_name FROM brand WHERE brand_name = '".$_POST["brand"]."'  
                ) LIMIT 1  
           ";  
           if(mysqli_query($connect, $sql))  
           {  
                $insert_id = mysqli_insert_id($connect);  
                if($insert_id != '')  
                {  
                     header("location:data_already_inserted.php?inserted=1");  
                }  
                else  
                {  
                     header("location:data_already_inserted.php?already=1");  
                }  
           }  
      }  
      else  
      {  
           header("location:data_already_inserted.php?required=1");  
      }  
 }  
 if(isset($_GET["inserted"]))  
 {  
      $message = "Brand inserted";  
 }  
 if(isset($_GET["already"]))  
 {  
      $message = "Brand Already inserted";  
 }  
 if(isset($_GET["required"]))  
 {  
      $message = "Brand Name Required";  
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
                     <label>Enter Brand Name</label>  
                     <input type="text" name="brand" class="form-control" />  
                     <br />  
                     <input type="submit" name="add" class="btn btn-info" value="Add" />  
                </form>  
           </div>  
           <br />  
      </body>  
 </html>  