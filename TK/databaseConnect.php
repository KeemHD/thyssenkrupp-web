<?php
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);

$connection = mysql_connect("localhost", "hakeem.dixon", "hakeem.dixon");

if(!$connection)
{
    die("Fail: " . mysql_error());
}

$dbselect = mysql_select_db("work", $connection);    
if(!$dbselect)
{
    die("Fail2: " . mysql_error());
}
?>