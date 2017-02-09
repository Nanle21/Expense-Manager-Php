<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Account";
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
    <p align="center"><a href="home.php">Home</a> | <a href="manage_account_add.php">Add a New Account</a></p>
    <?php
	$select_account=mysql_query("select * from account");
	if($select_account==FALSE)
	{
				?>
                <p class="errormessage">Error encountered accesing Account information. <?php echo mysql_error(); ?></p>
                <?php
				die();
	}
	$total_account=mysql_num_rows($select_account);
	if($total_account<=0)
	{
				?>
                <p class="errormessage">No User Found</p>
                <?php
	}
	else
	{
		?>
        <table align="center" border="0" cellpadding="5" cellspacing="1">
        	<tr class="tableheading">
        		<td>Accounts</td>
            </tr>
            <?php
			$bgcolor="#efefef";
				for($count_account=0; $count_account<$total_account; $count_account++)
				{
					if($bgcolor=="#cdcdcd")
							{
								$bgcolor="#efefef";
							}
							else
							{
								$bgcolor="#cdcdcd";
							}
							mysql_data_seek($select_account, $count_account);
							$row_select_account=mysql_fetch_assoc($select_account);
							?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                            <td><?php echo $row_select_account['account_name']; ?></td>
                            <?php
				}
			?>
            
        </table>
        <?php
	}
	?>
    <!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>