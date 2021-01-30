<?php 
//place this above every secure page
session_start();
//If there is not a session or it the session has been set to safe mode, redirect.
if(session_id() == '' || $_SESSION['isSafeMode'])
{
	header("Location: index.php");
}
?>
