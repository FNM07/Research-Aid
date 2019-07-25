<?php
$connect = mysqli_connect("localhost", "root", "", "fairuz");
$output = '';

if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
	SELECT * FROM resources 
	WHERE title LIKE '%".$search."%'
	 
	";

    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Paper title</th>
							
						</tr>';
        while($row = mysqli_fetch_array($result))
        {
            $output .= '
			<tr>
	            <td align="left"><a href="pdfviewer.php?id='.$row["id"].'" target="_blank"> <h4>'.$row["title"].'</a></h4> </td>
				
			</tr>
		';
        }
        echo $output;
    }
    else
    {
        //echo 'Data Not Found';
    }
}
else
{
    $output = '';

}

?>