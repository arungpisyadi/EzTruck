<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_user_status = "SELECT user_id, user_name, user_stat FROM `user`";
$user_status = mysql_query($query_user_status, $myconn) or die(mysql_error());
$row_user_status = mysql_fetch_assoc($user_status);
$totalRows_user_status = mysql_num_rows($user_status);
?>
<style type="text/css">
<!--
.style1 {
	color: #00FF66;
	font-weight: bold;
	background-color: #000000;
}
.style2 {
	color: #FF0000;
	font-weight: bold;
	background-color: #FFFF00;
}
-->
</style>

<link href="css/tabel/tabel.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style3 {color: #99FF66}
-->
</style>
<table border="0" align="center" cellpadding="0" cellspacing="0">
<caption>User Status</caption>
<thead>
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Status</th>
  </tr>
  </thead>
  <?php do { ?>
    <tr>
      <td><?php echo $row_user_status['user_id']; ?></td>
      <td><strong><?php echo $row_user_status['user_name']; ?></strong></td>
      <td>
	  <?php if ($row_user_status['user_stat'] == 'L'){ ?>
	  <span class="style1 style3">Active</span>
	  <?php } else { ?>
	  <span class="style2">Not Active</span>
	  <?php } ?>	  </td>
    </tr>
    <?php } while ($row_user_status = mysql_fetch_assoc($user_status)); ?>
</table>
<?php
mysql_free_result($user_status);
?>
