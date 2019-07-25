<?php
session_start();
$table = $_SESSION['table'];

include ('connect.php');
$username = $_SESSION['username'];



if(!empty($_POST)){
    $title = mysqli_real_escape_string($conn, $_POST['title']);

    $dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");



    $link = "";
    $name = $_FILES['myfile']['name'];
    $mime = $_FILES['myfile']['type'];
   // $data = file_get_contents($_FILES['myfile']['tmp_name']);


    $fileExistsFlag = 0;
    //$fileName = $_FILES['Filename']['name'];
    //$link = mysqli_connect("localhost","root","","fileupload") or die("Error ".mysqli_error($link));
    /*
    *	Checking whether the file already exists in the destination folder
    */
    $query = "SELECT title FROM resources WHERE title='$title'";
    $result = $conn->query($query) or die("Error : ".mysqli_error($conn));
    while($row = mysqli_fetch_array($result)) {
        if($row['title'] == $title) {
            $fileExistsFlag = 1;
        }
    }

    if($fileExistsFlag == 0) {
        $target = "resources/";
        $fileTarget = $target.$table.'/'.$name;
        $tempFileName = $_FILES["myfile"]["tmp_name"];
        // $fileDescription = $_POST['Description'];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        /*
        *	If file was successfully uploaded in the destination folder
        */
        if($result) {
            echo "Your file <html><b><i>".$name."</i></b></html> has been successfully uploaded";

            $stmt = $dbh->prepare("insert into resources values('',?,?,'',?,?)");
            $stmt->bindParam(1,$table);
            $stmt->bindParam(2,$title);
            // $stmt->bindParam(3,$data, PDO::PARAM_LOB);
            $stmt->bindParam(3,$username);
            $stmt->bindParam(4,$fileTarget);
            $stmt->execute();

            include ('show_table.php');

            //$query = "INSERT INTO filedetails(filepath,filename,description) VALUES ('$fileTarget','$fileName','$fileDescription')";
            // $link->query($query) or die("Error : ".mysqli_error($link));
        }
        else {
            echo "Sorry !!! There was an error in uploading your file";
        }
        mysqli_close($conn);
    }
    /*
    * 	If file is already present in the destination folder
    */
    else {
        echo "File <html><b><i>".$name."</i></b></html> already exists in your folder. Please rename the file and try again.";
        mysqli_close($conn);
    }


}


?>


