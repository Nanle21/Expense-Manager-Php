<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Users - Add a New User";
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
    <p align="center"><a href="home.php">Home</a> | <a href="manage_user.php">Back To manage Users</a></p>
    <form action="manage_users_add_process.php" method="post" id="myform" >
    	<table align="center" cellpadding="5" cellspacing="1">
        	<tr bgcolor="#efefef">
            	<td>Username</td>
                <td><input name="username" type="text" id="username" value="" /></td>
            </tr>
            <tr bgcolor="#cdcdcd">
            	<td>Password</td>
                <td><input name="password" type="password" id="password" value="" /></td>
            </tr>
            <tr bgcolor="#efefef">
            	<td>Name</td>
                <td><input name="name" type="text" id="name" value="" /></td>
            </tr>
            <tr bgcolor="#cdcdcd">
            	<td>User Category</td>
                <td><select name="user_category" id="user_category" style="width:100%">
                <option value=""></option>
                <option value="admin">Admin</option>
                <option value="users">Users</option>
                </select></td>
            </tr>
            <tr bgcolor="#efefef">
            <td>Status</td>
            <td>
            <select name="status" id="status" style="width:100%">
            	<option value=""></option>
                <option value="active">Active</option>
                <option value="deleted">Deleted</option>
            </select>
            </td>
            </tr>
            <tr bgcolor="#cdcdcd">
            <td colspan="2" align="center"><input type="button" value="Add New USer" onclick="add_new_user_click()" /></td>
            </tr>
        </table>
        </form>
        <script language="javascript">
				document.getElementById("username").focus();
				function add_new_user_click()
				{
					if(document.getElementById("username").value=="")
					{
						alert("Please Put in Your Username");
						document.getElementById("username").focus();
						return null;
					}
					if(document.getElementById("password").value=="")
					{
						alert("Please Put in Your Password");
						document.getElementById("password").focus();
						return null;
					}
					if(document.getElementById("name").value=="")
					{
						alert("Please Put in Your Name");
						document.getElementById("name").focus();
						return null;
					}
					if(document.getElementById("user_category").value=="")
					{
						alert("Please Put in Your User Category");
						document.getElementById("user_category").focus();
						return null;
					}
					if(document.getElementById("status").value=="")
					{
						alert("Please Put in Your Status");
						document.getElementById("status").focus();
						return null;
					}
						document.getElementById("myform").submit();

				}
			
        </script>
	<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>