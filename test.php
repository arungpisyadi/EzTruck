<?php require_once('Connections/myconn.php'); ?>
<?php

mysql_select_db($database_myconn, $myconn);
$query_selectid = "SELECT `user`.user_id FROM `user` WHERE `user`.user_name = 'admin'";
$selectid = mysql_query($query_selectid, $myconn) or die(mysql_error());
$row_selectid = mysql_fetch_assoc($selectid);
$totalRows_selectid = mysql_num_rows($selectid);
$idadd = $row_selectid['user_id'];
echo $idadd ;

?>