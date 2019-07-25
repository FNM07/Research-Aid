<?php
	include_once('db.php');
 
	if(isset($_POST['name']))
	{
	  $name = $_POST['name'];
 
	  if(mysql_query("INSERT INTO apple VALUES('','$name')"))
		echo "Successful Insertion!";
	  else
		echo "Please try again";
	}
 
 
	$res = mysql_query("SELECT * FROM apple");
 
 
?>
 
<form action="." method="POST">
Name: <input type="text" name="name"/><br />
<input type="submit" value=" Enter "/>
</form>
 
<h1>List of companies ..</h1>
<?php
	while( $row = mysql_fetch_array($res) )
	  echo "$row[id]. $row[name] 
                <a href='edit.php?edit=$row[id]'>edit<br />";
				?>