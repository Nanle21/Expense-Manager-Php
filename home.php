<?php
	session_start();
	$main_page="Home";
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
	<table cellpadding="10" cellspacing="1" border="0" align="center">
    <?php
	if(isset($_SESSION['user_category']) && $_SESSION['user_category']=='admin')
	{
		?>
        <tr bgcolor="#efefef">
        	<td style="font-size:18px; font-weight:bold">&raquo;</td>
            <td><a href="manage_user.php">Manage Users</a></td>
        </tr>
        <?php
	}
	?>
    	<tr bgcolor="#cdcdcd">
        	<td style="font-size:18px; font-weight:bold">&raquo;</td>
            <td><a href="manage_categories.php">Manage Categories</a></td>
        </tr>
        
        <tr bgcolor="#efefef">
        	<td style="font-size:18px; font-weight:bold">&raquo;</td>
            <td><a href="manage_account.php">Manage Accounts</a></td>
        </tr>
        
        <tr bgcolor="#cdcdcd">
        	<td style="font-size:18px; font-weight:bold">&raquo;</td>
            <td><a href="manage_transactions.php">Manage Transactions</a></td>
        </tr>
        
        <tr bgcolor="#efefef">
        	<td style="font-size:18px; font-weight:bold">&raquo;</td>
            <td>Log Out</td>
        </tr>
    </table>
	<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>