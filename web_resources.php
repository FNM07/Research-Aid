<?php

$test = utf8_encode($_POST['myData']); // Don't forget the encoding
$data = json_decode($test);

$output = '';
$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Paper title</th>
							<th>Paper Link</th>
						</tr>';

//echo "Queryyyyyyyyyy: ".$data->queryString.'<br/>';
$queryString = $data->queryString;
foreach ($data->items as $obj) {
    // echo $obj->title.'<br/>';
    $title =$obj->title;
    $link =$obj->link;

    //generate output
    // define a variable to switch on/off error messages
    $mysqliDebug = true;
    $connect = mysqli_connect("localhost", "root", "", "fairuz");

    if ($connect->connect_errno) {
        echo '<p>There was an error connecting to the database!</p>';
        if ($mysqliDebug) {
            // mysqli->connect_error returns the latest error message,
            // hopefully clarifying the problem
            // NOTE: supported as of PHP 5.2.9
            echo $connect->connect_error;
        }
        // since there is no database connection your queries will fail,
        // quit processing
        die();
    }
    $search = mysqli_real_escape_string($connect, $title);

    //echo "connection established".'<br/>';
    $query = "
                  SELECT * FROM web_resources 
                  WHERE title LIKE '%".$search."%'
                  ";

    $result = $connect->query($query);
    if (!$result and $mysqliDebug) {
        // the query failed and debugging is enabled
        echo "<p>There was an error in query: $query</p>";
        echo $connect->error;
    }
    //echo "Query result        search: ".$search.'<br/>';

    if ($result) {
        // the query was successful
        // get the result (if any)
        // result->fetch_object returns NULL if there is no record
        // echo "Query Result true".'<br/>';
        // we have a record so now we can use it
        // the columns are properties of the object
        if ($result->num_rows == 0) {
           // echo '<p>No records found.</p>';
            $dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");
           // $pdf =file_get_contents($obj->link);
            $stmt = $dbh->prepare("insert into web_resources values('',?,?,'',?)");
            $stmt->bindParam(1,$title);
            $stmt->bindParam(2,$link);
            //$stmt->bindParam(3,$pdf, PDO::PARAM_LOB);
            $stmt->bindParam(3,$queryString);

            if ($stmt->execute()){
                // echo "*******************************************************************************";
            }
            else{
                //echo $stmt->errorCode()."www";
            }

            $connect = mysqli_connect("localhost", "root", "", "fairuz");

            if ($connect->connect_errno) {
                echo '<p>There was an error connecting to the database!</p>';
                if ($mysqliDebug) {
                    // mysqli->connect_error returns the latest error message,
                    // hopefully clarifying the problem
                    // NOTE: supported as of PHP 5.2.9
                    echo $connect->connect_error;
                }
                // since there is no database connection your queries will fail,
                // quit processing
                die();
            }
            $search = mysqli_real_escape_string($connect, $title);
            $query = "
	        SELECT * FROM web_resources 
	        WHERE title LIKE '%".$search."%'
	       
	        ";

            $result = $connect->query($query);
            if (!$result and $mysqliDebug) {
                // the query failed and debugging is enabled
                echo "<p>There was an error in query: $query</p>";
                echo $connect->error;
            }


            if ($result) {
                // perhaps you want to check if there are any rows available
                if ($result->num_rows == 0) {
                    //echo '<p>No records found.</p>';
                }
                else {
                    while ($recordObj = $result->fetch_object()) {
                        // echo $recordObj->link;
                        // echo "<li><a href='view.php?id=".$row['id']."' target='_blank'>".$row['name']."</a></li>";
                        $output .= '
			                <tr>
				                <td>'.$recordObj->title.'</td>
				                <td><a href='.$recordObj->link.'"  target=\"_blank\">' .$recordObj->link.'</a></td>
			                </tr>
		            ';
                        //<td><a href=\"view.php?id='.$recordObj->id.' "  target=\"_blank\">' .$recordObj->link.'</a></td>
                    }
                }
            }





        }
        else {
            while ($recordObj = $result->fetch_object()) {
                // echo $recordObj->link;
                $output .= '
			                <tr>
				                <td>'.$recordObj->title.'</td>
				                <td><a href='.$recordObj->link.'"  target=\"_blank\">' .$recordObj->link.'</a></td>
			                </tr>
		            ';
            }
        }
        $result->close();


    }
    $connect->close();


}
echo $output;