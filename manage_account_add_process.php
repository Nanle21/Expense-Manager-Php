<?php
session_start();
include_once("dbconnect.php");


$account_name=isset($_POST['account_name']) ? trim($_POST['account_name']) : "";

	if($account_name=="")
	{
				$_SESSION['message']="Please Enter Your Account Name";
				$_SESSION['messagetype']="errormessage";
				header("location: manage_account_add.php");
				exit();
	}
	$select_account=mysql_query("select * from account where(account_name='$account_name')");
if($select_account==FALSE) //if the above statement was not succesfully exucuted
{
	$_SESSION['message']="Error Encounterd Accesing Accounts Information! " .mysql_error();
	$_SESSION['messagetype']="errormessage";
	header("location: manage_account_add.php");
	exit();
}

$total_account=mysql_num_rows($select_account); //Get the total Numebr of Records Returnd. 
if($total_account>0)   //if Total number of record is greater than ) then the user already exist then generate errror message
{
	$_SESSION['message']="This Account name ($account_name) already exist. please enter a different Account! ";
	$_SESSION['messagetype']="errormessage";
	header("location: manage_account_add.php");
	exit();
}
$insert_rec=mysql_query("Insert Into account set account_name='$account_name'");
if($insert_rec==FALSE) //if the above statement was not succesfully exucuted
{
	$_SESSION['message']="Error Encounterd adding Account information! " .mysql_error();
	$_SESSION['messagetype']="errormessage";
	header("location: manage_account_add.php");
	exit();
}
//.If we Reach This point New User Information has been Succefully Added.
$_SESSION['message']="Account ($account_name) has been succesfully added.";
$_SESSION['messagetype']="successmessage";
header("location: manage_account.php");
?>

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