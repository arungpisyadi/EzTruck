<?php
// This Script of PHP were made by arungpisyadi, any violations on terms of usage will be handled in legal way

$host = "localhost" ; //Change the localhost into whatever host name u have
$user = "root" ; //chane the root with your username
$pass = "" ; // fill the password for your database

$connect = mysql_connect($host,$user,$pass)
	or die(mysql_error()) ;
	
$dbname = "eztruck11" ; // change it with your made database's name
mysql_select_db($dbname);
?>