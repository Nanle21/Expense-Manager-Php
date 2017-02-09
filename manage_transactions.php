<?php
	session_start();
	include_once("dbconnect.php");
	$main_page="Manage Transaction";
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
	<!-- InstanceBeginEditable name="mycontent" --><p align="center"><a href="home.php">Home</a> | <a href="add_new_transaction.php">Add A New Transaction</a></p>
    <?php
	$select_transaction=mysql_query("select * from transaction");
	if($select_transaction==FALSE)
	{
		?>
        	<p class="errormessage">Error Encountered Accesing Transactions Detail!! <?php echo mysql_error(); ?></p>
        <?php
		die();
	}
		$total_transaction=mysql_num_rows($select_transaction);
		if($total_transaction<=0)
		{
			?>
            <p class="errormessage">No Transaction Found</p>
            <?php
		}
		else
		{
			?>
            	<table align="center" border="0" cellpadding="5" cellspacing="0">
                	<tr class="tableheading">
                    	<td>Date</td>
                        <td>Category</td>
                        <td>Account</td>
                        <td>Transaction Detail</td>
                        <td>Amounts</td>
                    </tr>
                    <?php
							$bgcolor="#cdcdcd";
							for($count_transaction=0; $count_transaction<$total_transaction; $count_transaction++)
							{
									if($bgcolor=="#cdcdcd")
									{
										$bgcolor="#efefef";
									}
									else
									{
										$bgcolor="#cdcdcd";
									}
								mysql_data_seek($select_transaction, $count_transaction);
							$row_select_transaction=mysql_fetch_assoc($select_transaction);
							?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                            	<td><?php echo $row_select_transaction['date']; ?></td>
                                <td><?php echo $row_select_transaction['category']; ?></td>
                                <td><?php echo $row_select_transaction['account']; ?></td>
                                <td><?php echo $row_select_transaction['transaction_detail']; ?></td>
                                <td><?php echo $row_select_transaction['amount']; ?></td>
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