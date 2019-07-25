<?php
$dbh = new PDO("mysql:host=localhost;dbname=fairuz","root","");
$id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $dbh->prepare("select * from resources where id=?");
$stat->bindParam(1,$id);
$stat->execute();
$row = $stat->fetch();
//header("Content-Type: application/pdf");
//echo $row['pdf'];
$filepath = $row['file_path'];
//@readfile( $filepath);
echo '<object class="embed-responsive-item" data="'.$filepath .'" type="application/pdf" internalinstanceid="9" title="" style="width: 100%;height: 100%">

                    <p>Your browser isn\'t supporting embedded pdf files. You can download the file
                        <a href="' . $filepath . ' ">here</a>.</p>
                </object>';
//echo file_get_contents($filepath);
//echo '<iframe src="http://docs.google.com/gview?url=http://'.$filepath.'&embedded=true"
//      style="width:100%; height:100%;" frameborder="0"></iframe>'
?>