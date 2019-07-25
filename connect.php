<?php
/**
 * Created by PhpStorm.
 * User: anika
 * Date: 3/28/18
 * Time: 12:44 AM
 */

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,'fairuz');
if(!$conn)
{
 echo " not connected to database";
}

?>
