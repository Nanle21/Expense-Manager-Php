<?php 

//.1 define connection variable

$db_name='expense_manager';
$db_host='localhost';
$db_username='expense';
$db_password='manager';

//2. establish a connection to mysql

$connection=mysql_connect("$db_host", "$db_username", "$db_password");

//3. If a connection Was Not Succeful
if($connection==FALSE)
{
	die("connection failed! ".mysql_error());
}

//4. if connection Was succesful

$select_db=mysql_select_db("$db_name",$connection);

if($select_db==FALSE)
{
	die("database selection error! ".mysql_error());
}
	
?>