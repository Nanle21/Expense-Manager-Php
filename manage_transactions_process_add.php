<?php
session_start();
include_once("dbconnect.php");

	$date=isset($_POST['date']) ? ($_POST['date']) : "";
	$category=isset($_POST['category']) ? ($_POST['category']) : "";
	$account=isset($_POST['account']) ? ($_POST['account']) : "";
	$transaction_detail=isset($_POST['transaction_detail']) ? ($_POST['transaction_detail']) : "";
	$amounts=isset($_POST['amounts']) ? ($_POST['amounts']) : "";
	
	$_SESSION['date']=$date;
	$_SESSION['category']=$category;
	$_SESSION['account']=$account;
	$_SESSION['transaction_detail']=$transaction_detail;
	$_SESSION['amounts']=$amounts;
	
	if($date=="" || $category=="" || $account=="" || $transaction_detail=="" ||	$amounts=="")
	{
		$_SESSION['message']="Please Enter All Fields";
		$_SESSION['messagetype']="errormessage";
		header("location: add_new_transaction.php");
		exit();
	}	
	
$insert_rec=mysql_query("insert into transaction set date='$date', category='$category', account='$account', 		transaction_detail='$transaction_detail', amount='$amounts'");
	
	if($insert_rec==FALSE)
	{
		$_SESSION['message']="Error Encounterd adding transaction information! " .mysql_error();
		$_SESSION['messagetype']="errormessage";
		header("location: add_new_transaction.php");
		exit();
	}
	
	unset($_SESSION['date'],$_SESSION['category'],$_SESSION['account'],$_SESSION['transaction_detail'],$_SESSION['amounts']);
	$_SESSION['message']="Transaction ($transaction) has been succesfully added.";
	$_SESSION['messagetype']="successmessage";
	header("location: manage_transactions.php");
?>