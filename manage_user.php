<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Users";
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
            	<p align="right" style="border-bottom:solid 1px #ccc;"><b>User:</b>  <?php echo $_SESSION['current_user'];?></p>
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
	<!-- InstanceBeginEditable name="mycontent" --><p align="center"><a href="home.php">Home</a> | <a href="manage_user_add.php">Add a New User</a></p>
			<?php 
			$select_users=mysql_query("select * from users");
			if($select_users==FALSE)
			{
				?>
                <p class="errormessage">Error encountered accesing user information. <?php echo mysql_error(); ?></p>
                <?php
				die();
			}
			$total_users=mysql_num_rows($select_users);
			if($total_users<=0)
			{
				?>
                <p class="errormessage">No User Found</p>
                <?php
			}
			else
			{
				?>
                <table align="center" border="0" cellpadding="5" cellspacing="0">
                	<tr class="tableheading">
                    	<td>Username</td>
                        <td>Name</td>
                        <td>Status</td>
                        <td>User Category</td>
                    </tr>
                    <?php
					$bgcolor="#cdcdcd";
						for($count_users=0; $count_users<$total_users; $count_users++)
						{
							if($bgcolor=="#cdcdcd")
							{
								$bgcolor="#efefef";
							}
							else
							{
								$bgcolor="#cdcdcd";
							}
							mysql_data_seek($select_users, $count_users);
							$row_select_users=mysql_fetch_assoc($select_users);
							?>
                                <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td><?php echo $row_select_users['username']; ?></td>
                                <td><?php echo $row_select_users['name']; ?></td>
                                <td><?php echo $row_select_users['status']; ?></td>
                                <td><?php echo $row_select_users['user_category']; ?></td>
                                </tr>
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