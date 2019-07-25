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
