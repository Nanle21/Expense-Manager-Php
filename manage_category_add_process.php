<?php
session_start();
include_once("dbconnect.php");

$category_name=isset($_POST['category_name']) ? trim($_POST['category_name']) : "";

	if($category_name=="")
	{
		$_SESSION['message']="Please Enter Your Category";
		$_SESSION['messagetype']="errormessage";
		header("location: manage_category_add.php");
		exit();
	}
$select_category=mysql_query("select * from category where(category_name='$category_name')");
if($select_category==FALSE) //if the above statement was not succesfully exucuted
{
	$_SESSION['message']="Error Encounterd Accesing Category Information! " .mysql_error();
	$_SESSION['messagetype']="errormessage";
	header("location: manage_category_add.php");
	exit();
}

$total_category=mysql_num_rows($select_category); //Get the total Numebr of Records Returnd. 
if($total_category>0)   //if Total number of record is greater than ) then the user already exist then generate errror message
{
	$_SESSION['message']="This category ($category_name) already exist. please enter a different category! ";
	$_SESSION['messagetype']="errormessage";
	header("location: manage_category_add.php");
	exit();
}

$insert_rec=mysql_query("Insert into category set category_name='$category_name'");
if($insert_rec==FALSE) //if the above statement was not succesfully exucuted
{
	$_SESSION['message']="Error Encounterd adding user information! " .mysql_error();
	$_SESSION['messagetype']="errormessage";
	header("location: manage_category_add.php");
	exit();
}
//.If we Reach This point New User Information has been Succefully Added.
$_SESSION['message']="User ($username) has been succesfully added.";
$_SESSION['messagetype']="successmessage";
header("location: manage_categories.php");
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>