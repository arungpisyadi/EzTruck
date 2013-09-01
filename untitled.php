<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_user_status = "SELECT user_id, user_name, user_stat FROM `user`";
$user_status = mysql_query($query_user_status, $myconn) or die(mysql_error());
$row_user_status = mysql_fetch_assoc($user_status);
$totalRows_user_status = mysql_num_rows($user_status);
?>
<table border="0" cellpadding="0" cellspacing="0">
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
      <td><?php echo $row_user_status['user_name']; ?></td>
      <td><?php echo $row_user_status['user_stat']; ?></td>
    </tr>
    <?php } while ($row_user_status = mysql_fetch_assoc($user_status)); ?>
</table>
<?php
mysql_free_result($user_status);
?>
