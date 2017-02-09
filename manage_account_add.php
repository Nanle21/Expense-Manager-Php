<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Accounts - Add a New Account";
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
    <p align="center"><a href="home.php">Home </a>| <a href="manage_categories.php">Back to Manage Account</a></p>
    <form action="manage_account_add_process.php" method="post" id="myform">
    	<table align="center" cellpadding="5" cellspacing="1" border="0">
        	<tr bgcolor="#cdcdcd">
            	<td>Account Name</td>
                <td><input name="account_name" type="text" id="account_name" value="" /></td>
            </tr>
            <tr bgcolor="#efefef">
            	<td colspan="2" align="center"><input type="button" value="Add New Account" onclick="add_new_account_click()" /></td>
            </tr>
        </table>
    </form>
    <script language="javascript">
		document.getElementById("account_name").focus()
		function add_new_account_click()
		{
			if(document.getElementById("account_name").value=="")
			{
				alert("PLease Input Your Account");
				document.getElementById("account_name");
				return null;
			}
			document.getElementById("myform").submit();
		}
    </script>
	<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>