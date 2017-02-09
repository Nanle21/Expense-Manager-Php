<?php 
	session_start();
 $main_page="Login";
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
    <form action="login_process.php" method="post" id="myform">
    	<table align="center" cellpadding="10" cellspacing="1">
        	<tr bgcolor="#efefef">
            	<td>Username</td>
                <td><input name="username" type="text" id="username" value="" /></td>
            </tr>
            <tr bgcolor="#cdcdcd">
            	<td>Password</td>
                <td><input name="password" type="password" id="password" value="" /></td>
            </tr>
            <tr bgcolor="#efefef">S
            	<td colspan="2" align="center"><input type="button" value="Login" onclick="login_click()" /></td>
                
                
		<script language="javascript">
			document.getElementById("username").focus();
			function login_click()
			{
				if(document.getElementById("username").value=="")
				{
					alert("Please Enter Your Username");
					document.getElementById("username").focus();
					return null;
				}
				if(document.getElementById("password").value=="")
				{
					alert("Please Enter Your Password");
					document.getElementById("password").focus();
					return null;
				}
				document.getElementById("myform").submit();
			}    
        </script>
    
    
            </tr>
    	</table>
    </form>
    
<!-- InstanceEndEditable --></div>
</body>
<!-- InstanceEnd --></html>