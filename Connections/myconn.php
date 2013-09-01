<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myconn = "localhost";
$database_myconn = "eztruck11";
$username_myconn = "root";
$password_myconn = "";
$myconn = mysql_pconnect($hostname_myconn, $username_myconn, $password_myconn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>