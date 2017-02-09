<?php
session_start();
include_once("dbconnect.php");


$username=isset($_POST['username']) ? trim($_POST['username']) : "";

$password=isset($_POST['password']) ? trim($_POST['password']) : "";

$name=isset($_POST['name']) ? trim($_POST['name']) : "";

$user_category=isset($_POST['user_category']) ? trim($_POST['user_category']) : "";

$status=isset($_POST['status']) ? trim($_POST['status']) : "";

if($username=="" || $password=="" || $name=="" || $status=="" || $user_category=="")
{
	$_SESSION['message']="Please Enter All Fields";
	$_SESSION['messagetype']="errormessage";
	header("location: manage_user_add.php");
	exit();
}
$select_user=mysql_query("select * from users where(username='$username')");
if($select_user==FALSE) //.if the above statement was not succesfully exucuted
{
	$_SESSION['message']="Error Encounterd Accesing User Information! " .mysql_error();
	$_SESSION['messagetype']="errormessage";
	header("location: manage_user_add.php");
	exit();
}

$total_users=mysql_num_rows($select_user); //Get the total Numebr of Records Returnd. 
if($total_users>0)   //if Total number of record is greater than ) then the user already exist then generate errror message
{
	$_SESSION['message']="This username ($username) already exist. please enter a different username! ";
	$_SESSION['messagetype']="errormessage";
	header("location: manage_user_add.php");
	exit();
}
$insert_rec=mysql_query("Insert Into users set username='$username', password='$password', name='$name', user_category='$user_category', status='$status'");
if($insert_rec==FALSE) //if the above statement was not succesfully exucuted
{
	$_SESSION['message']="Error Encounterd adding user information! " .mysql_error();
	$_SESSION['messagetype']="errormessage";
	header("location: manage_user_add.php");
	exit();
}

//.If we Reach This point New User Information has been Succefully Added.
$_SESSION['message']="User ($username) has been succesfully added.";
$_SESSION['messagetype']="successmessage";
header("location: manage_user.php");
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