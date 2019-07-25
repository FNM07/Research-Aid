<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php


session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['sign_out'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.html");
}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Research Aid</title>
    <!--/tags -->
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


</head>

<body>
<!-- header -->
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
                        <h1><span class="fa fa-book" aria-hidden="true"></span> Research Aid <label>Education</label></h1>
                    </a>
                </div>
                <!--/.navbar-header-->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <nav class="link-effect-2" id="link-effect-2">
                        <ul class="nav navbar-nav">
                            <li><a href="home.html" class="effect-3">Home</a></li>
                            <li><a href="s_about.html" class="effect-3">About</a></li>
                            <li class="active"><a href="services.php" class="effect-3">Resources</a></li>
                            <li><a href="myreadpapers.php" class="effect-3">My Read Papers</a></li>

                            <li><a href="u_profile.php" class="effect-3">Profile</a></li>
                            <li><a href="services.php?sign_out='1'" class="effect-3" name="sign_out">Sign Out</a></li>
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
<!-- about -->


<?php
if (isset($_GET['iot'])) {
    $txt = "Internet of Things (IOT)";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['ml'])) {

    $txt = "Machine Learning";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['ai'])) {

    $txt = "Artificial Intelligence (AI)";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['data_mining'])) {

    $txt = "Data Mining";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['net'])) {

    $txt = "Networking";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['graphics'])) {

    $txt = "Graphics";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['cloud'])) {

    $txt = "Cloud Computing";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['fog'])) {

    $txt = "Fog Computing";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['bio'])) {

    $txt = "Bio-informatics";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['nlp'])) {

    $txt = "Natural Language Processing (NLP)";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['robo'])) {

    $txt = "Robotics";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");}
if (isset($_GET['mob'])) {

    $txt = "Mobile Computing";
    $_SESSION['type'] =$txt ;
    header("location: resources.php");
}
?>


<div class="welcome">
    <div class="container">
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Search</span>
                <input type="text" name="search_text" id="search_text" placeholder="Search by paper title" class="form-control" />
            </div>
        </div>
        <br />
        <div id="result"></div>
        <br />
        <br />
        <br />
        <h3 class="heading-agileinfo">Research Topics<span>  </span></h3>
        <div class="w3ls_news_grids">
            <!--<ul class="footer_grid_list"> -->
            <h3><li><a href="services.php?ai='1'" >Artificial Intelligence (AI)</a></li>
                <li><a <a href="services.php?iot='1'">Internet Of Things (IOT)</a></li>


                <li><a href="services.php?ml='1'" >Machine Learning (ML)</a></li>
                <li><a href="services.php?data_mining='1'" >Data Mining</a></li>
                <li><a href="services.php?net='1'" >Networking</a></li>
                <li><a href="services.php?graphics='1'" >Graphics</a></li>
                <li><a href="services.php?cloud='1'" >Cloud Computing</a></li>
                <li><a href="services.php?fog='1'" >Fog Computing</a></li>
                <li><a href="services.php?mob='1'" >Mobile Computing</a></li>
                <li><a href="services.php?bio='1'" >Bio-informatics</a></li>
                <li><a href="services.php?nlp='1'" >Natural Language Processing (NLP)</a></li>
                <li><a href="services.php?robo='1'" >Robotics</a></li>

                <a class="anchorjs-link" href="#h1.-bootstrap-heading"><span class="anchorjs-icon"></span></a>
                <div class="clearfix"> </div>
            </h3>

        </div>

    </div>
</div>

<script>
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"search.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>

<!-- //about -->

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<!-- skills -->
<script src="js/skill.bars.jquery.js"></script>
<script>
    $(document).ready(function(){
        $('.skillbar').skillBars({
            from: 0,
            speed: 4000,
            interval: 100,
            decimals: 0,
        });
    });
</script>
<!-- //skills -->
<!-- footer -->
<!-- sign up modal -->
</body>
</html>