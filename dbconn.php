<?php
// This Script of PHP were made by arungpisyadi, any violations on terms of usage will be handled in legal way

$host = "localhost" ; //Change the localhost into whatever host name u have
$user = "root" ; //chane the root with your username
$pass = "" ; // fill the password for your database
$dbname = "eztruck11" ; // change it with your made database's name

/* Database config */

$db_host		= $host;
$db_user		= $user;
$db_pass		= $pass;
$db_database	= $dbname; 

/* End config */



$link = mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');

mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");
?>