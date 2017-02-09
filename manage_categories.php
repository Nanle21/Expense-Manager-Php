<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Categories";
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
	<!-- InstanceBeginEditable name="mycontent" --><p align="center"><a href="home.php">Home</a> | <a href="manage_category_add.php">Add New category</a></p>
    <?php 
	$select_category=mysql_query("select * from category");
	if($select_category==FALSE)
	{
		?>
        <p class="errormessage">Error Encountered Accesing Category. <?php echo mysql_error(); ?></p>
        <?php
		die();
	}
	$total_category=mysql_num_rows($select_category);
	//echo"total category is $total_category";
	if($total_category<=0)
	{
		?>
        <p class="errormessage">No Category Found</p>
        <?php
		die();
	}
	else
	{
		?>
            <table align="center" cellpadding="5" cellspacing="1" border="0">
                <tr class="tableheading">
                    <td>Category</td>
                </tr>
                <?php 
				$bgcolor="#cdcdcd";
					for($count_category=0; $count_category<$total_category; $count_category++)
					{
						if($bgcolor=="#cdcdcd")
						{
							$bgcolor="#efefef";
						}
						else
						{
							$bgcolor="#cdcdcd";
						}
						
						mysql_data_seek($select_category, $count_category);
						$row_select_category=mysql_fetch_assoc($select_category);

						?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td><?php echo $row_select_category['category_name']; ?></td>
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