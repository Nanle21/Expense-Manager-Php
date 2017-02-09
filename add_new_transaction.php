<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Transaction - Add a New Transaction";
	
	$date=(isset($_SESSION['date'])) ? $_SESSION['date'] : "";
	
	$category=(isset($_SESSION['category'])) ? $_SESSION['category'] : "";
	
	$account=(isset($_SESSION['account'])) ? $_SESSION['account'] : "";
	
	$transaction_detail=(isset($_SESSION['transaction_detail'])) ? $_SESSION['transaction_detail'] :"";
	
	$amounts=(isset($_SESSION['amounts'])) ? $_SESSION['amounts'] :"";
?>

<?php require_once('Connections/dbconnect.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_dbconnect, $dbconnect);
$query_list_of_account = "SELECT * FROM account ORDER BY account_name ASC";
$list_of_account = mysql_query($query_list_of_account, $dbconnect) or die(mysql_error());
$row_list_of_account = mysql_fetch_assoc($list_of_account);
$totalRows_list_of_account = mysql_num_rows($list_of_account);

mysql_select_db($database_dbconnect, $dbconnect);
$query_list_of_categoy = "SELECT * FROM category ORDER BY category_name ASC";
$list_of_categoy = mysql_query($query_list_of_categoy, $dbconnect) or die(mysql_error());
$row_list_of_categoy = mysql_fetch_assoc($list_of_categoy);
$totalRows_list_of_categoy = mysql_num_rows($list_of_categoy);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Expense Manager
<?php 

if(isset($main_page))
{
	echo" : $main_page";
}

if(isset($sub_page))
{
	echo" : ($sub_page)";
}

?>
</title>
<!-- InstanceEndEditable -->
<link href="styles.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>

	<div id="header">Expense Manager</div>
    <div id="content">
    <?php
		if($main_page!="Login" && isset($_SESSION['current_user']))
		{
			?>
            	<p align="right" style="border-bottom:solid 1px #ccc;"><b>User:</b> <?php echo $_SESSION['current_user'];?></p>
            <?php
		}
	?>
    
	<h1 align="center"> <?php echo $main_page; ?> </h1>
    <?php
		if(isset($_SESSION['message']))
		{
			?>
            	<p class="<?php echo $_SESSION['messagetype']; ?>"><?php echo $_SESSION['message']; ?></p>
            <?php
			unset($_SESSION['message'],$_SESSION['messagetype']);
		}
	?>
	<!-- InstanceBeginEditable name="mycontent" -->
    <p align="center"><a href="home.php">Home </a>| <a href="manage_transactions.php">Back to Manage Transactions</a></p>
    <form action="manage_transactions_process_add.php" method="post" id="myform">
<table align="center" cellpadding="5" cellspacing="1" border="0">
        	<tr bgcolor="#efefef">
            	<td>Date</td>
                <td><input name="date" type="text" id="date" value="<?php echo $date; ?>" /><br />
                 <span style="font-size:10px; color:#f00;">Date Format: yyyy-mm-dd eg2014-12-30</span>
                </td>
            </tr>
            <tr bgcolor="#cdcdcd">
            	<td>Category</td>
                <td>
                        <select name="category" id="category">
                          <option value=""></option>
                          <?php
do {  
?>
                          <option value="<?php echo $row_list_of_categoy['category_name']?>" <?php 
						  if($category==$row_list_of_categoy['category_name'])
						  {
							  echo'selected="selected"';
							}
						  ?>><?php echo $row_list_of_categoy['category_name']?></option>
                          <?php
} while ($row_list_of_categoy = mysql_fetch_assoc($list_of_categoy));
  $rows = mysql_num_rows($list_of_categoy);
  if($rows > 0) {
      mysql_data_seek($list_of_categoy, 0);
	  $row_list_of_categoy = mysql_fetch_assoc($list_of_categoy);
  }
?>
                  </select>
                </td>
            </tr>
            <tr bgcolor="#efefef">
            	<td>Account</td>
                <td>
                	<select name="account" id="account">
                	  <option value=""></option>
                	  <?php
do {  
?>
                	  <option value="<?php echo $row_list_of_account['account_name']?>" <?php 
					  if($account==$row_list_of_account['account_name'])
					  {
						  echo'selected="selected"';
					}
					  ?>><?php echo $row_list_of_account['account_name']?></option>
                	  <?php
} while ($row_list_of_account = mysql_fetch_assoc($list_of_account));
  $rows = mysql_num_rows($list_of_account);
  if($rows > 0) {
      mysql_data_seek($list_of_account, 0);
	  $row_list_of_account = mysql_fetch_assoc($list_of_account);
  }
?>
                  </select>
                </td>
            </tr>
            <tr bgcolor="#cdcdcd">
            	<td>Transaction Detail</td>
                <td><textarea name="transaction_detail" id="transaction_detail"><?php echo $transaction_detail; ?></textarea></td>
            </tr>
            <tr bgcolor="#efefef">
            	<td>Amounts</td>
                <td><input name="amounts" type="text" id="amounts" value=" <?php echo $amounts; ?>" /></td>
            </tr>
<tr bgcolor="#cdcdcd">
            	<td colspan="2" align="center"><input name="Button" type="button" onclick="add_transaction()" value="Add Transaction" /></td>
            </tr>
        </table>
    </form>
    <script language="javascript">
	
			document.getElementById("date").focus()
			function add_transaction()
			{
				{
				var d=document.getElementById("date").value;
				
				if(d=="")
				{
					alert("Please Enter a date in the Required Format");
					return null;
				}
				var thesplit=d.split("-");
				
				if(thesplit.length!=3)
				{
					alert("Invalid Date Entry");
					return null;
				}
				
				var theyear=thesplit[0];
				var themonth=thesplit[1];
				var theday=thesplit[2];
				
				if(isNaN(theyear) ||  theyear.length!=4)
				{
					alert("Invalid Year Entry, Please Enter The Year USing a 4 digit Number");
					return null;
				}
				if(isNaN(themonth) || themonth.length!=2 || themonth>12 || themonth<1 )
				{
					alert("Invalid Month Entry, Please Entert a 2digit 01 to 12");
					return null;
				}
				if(isNaN(theday) || theday.length!=2 || theday>31 || theday<1)
				{
					alert("Please Enter a 2digit Number day between O1 and 31");
					return null;
				}		
				else
				{
					if(themonth==9 || themonth==4 || themonth==6 || themonth==11) 
					{
						if(theday>30)
						{
							alert("Invalid Date Entry. The Foolowing Months Can Not be greater Than 30days April(04), June(09), September(6), 									November(11)");
							return null;
						}
						
					}
					if(themonth==2)
						{
							if(theday>29)
							{
								alert("Invalid day entry, Feburary Can not have more than 29 days if it leap year");
								return null;
							}
							if(theyear%4!=0 && theday>28)
							{
								alert("Feburary cannot be greater than 28days");
								return null;
							}
						}
				}
				}
				if(document.getElementById("category").value=="")
				{
					alert("Please Select Your Category");
					document.getElementById("category");
					return null;
				}
				if(document.getElementById("account").value=="")
				{
					alert("Please select Your Account");
					document.getElementById("account");
					return null;
				}
				if(document.getElementById("transaction_detail").value=="")
				{
					alert("Please Input Your Transaction Details");
					document.getElementById("transaction_detail");
					return null;
				}
				if(document.getElementById("amounts").value=="" || isNaN(document.getElementById("amounts").value))
				{
					alert("Please Enter a Numeric Value For Amount");
					document.getElementById("amounts");
					return null;
				}
				document.getElementById("myform").submit();
			}
	
    </script>
<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($list_of_account);

mysql_free_result($list_of_categoy);
?>
