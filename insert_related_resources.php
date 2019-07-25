<?php
session_start();
include ("connect.php");
$id=$_SESSION['paper_id'];
$title=$_SESSION['title'];
$username= $_SESSION['username'];

//echo $username;
$file_path = "users/".$username;
if (!file_exists($file_path)) {
    mkdir($file_path, 0777, true);
}
$file_path = $file_path."/".$id;
//echo $id;
//echo $file_path;
if (!file_exists($file_path)) {
    mkdir($file_path, 0777, true);
}

    //$title = mysqli_real_escape_string($conn, $_POST['title']);
//echo "asciiiiiiiiiiiiiiii";
    $dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");



    $link = "";
    $name = $_FILES['myfile']['name'];
    $mime = $_FILES['myfile']['type'];

   // $data = file_get_contents($_FILES['myfile']['tmp_name']);

   // echo $name;
    $fileExistsFlag = 0;
    //$fileName = $_FILES['Filename']['name'];
    //$link = mysqli_connect("localhost","root","","fileupload") or die("Error ".mysqli_error($link));
    /*
    *	Checking whether the file already exists in the destination folder
    */
    $query = "SELECT title FROM related_resources WHERE title='$title'";
    $result = $conn->query($query) or die("Error : ".mysqli_error($conn));
    while($row = mysqli_fetch_array($result)) {
        if($row['title'] == $title) {
            $fileExistsFlag = 1;
        }
    }

    if($fileExistsFlag == 0) {
        echo $name;
        //$target = "resources/";
        //$fileTarget = $target.$table.'/'.$name;
        $fileTarget = $file_path.'/'.$name;
        $tempFileName = $_FILES["myfile"]["tmp_name"];
        // $fileDescription = $_POST['Description'];
        $result = move_uploaded_file($tempFileName,$fileTarget);
        /*
        *	If file was successfully uploaded in the destination folder
        */
        if($result) {
            echo "Your file <html><b><i>".$name."</i></b></html> has been successfully uploaded";

            $stmt = $dbh->prepare("insert into related_resources values('',?,?,?,?)");
            $stmt->bindParam(1,$username);
            $stmt->bindParam(2,$name);
            // $stmt->bindParam(3,$data, PDO::PARAM_LOB);
            $stmt->bindParam(3,$id);

            $stmt->bindParam(4,$fileTarget);
            $stmt->execute();

           // include ('show_table.php');

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

    echo "<a href=".$fileTarget.">$name</a>"



?>


