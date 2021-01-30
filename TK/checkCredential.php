<?php 
session_start();
require_once('databaseConnect.php');//may have to change to correct location


$_SESSION['is_admin'] =false;

// username and password from form 
$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword']; 

// To protect MySQL injection 
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM admin_table WHERE username='$myusername' AND password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
		$_SESSION['is_admin'] = $myusername;
		$_SESSION['mypassword'] = $mypassword;
		$_SESSION['isSafeMode'] = false;
	
		header("Location: adminDashboard.php");
	
}

else 
{
	header("Location: index.php");
}

?>
