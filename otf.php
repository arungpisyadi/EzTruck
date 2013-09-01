<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_otf = "SELECT * FROM virtual_control";
$otf = mysql_query($query_otf, $myconn) or die(mysql_error());
$row_otf = mysql_fetch_assoc($otf);
$totalRows_otf = mysql_num_rows($otf);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/tabel/tabel.css" rel="stylesheet" type="text/css" />
</head>

<body>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table width="1100" height="100%" align="center">
  <caption>Virtual control of eztruck </caption>
  <thead>
  <tr align="center">
    <th height="20">id</th>
    <th>license</th>
    <th>driver</th>
    <th>customer</th>
    <th>items</th>
    <th>loaded ammount </th>
    <th>status</th>
    <th>direction</th>
    <th>action</th>
    <th>position</th>
    <th>category</th>
  </tr>
  </thead>
  <?php do { ?>
  <tbody>
    <tr align="center" valign="middle">
      <td height="62"><span class="style11"><?php echo $row_otf['truk_id']; ?></span></td>
      <td><span class="style11"><strong><?php echo $row_otf['truk_no_polisi']; ?></strong></span></td>
      <td><span class="style11"><strong><?php echo $row_otf['kary_nama_1']; ?></strong>, <?php echo $row_otf['kary_nama_2']; ?></span></td>
      <td><span class="style11"><strong><?php echo $row_otf['cust_name']; ?></strong></span></td>
      <td><span class="style11"><?php echo $row_otf['order_barang_nama']; ?></span></td>
      <td><span class="style11"><?php echo $row_otf['order_barang_jumlah']; ?> [ <?php echo $row_otf['order_barang_satuan']; ?> ]</span></td>
      <td><span class="style11"><?php echo $row_otf['truk_status']; ?></span></td>
      <td><span class="style11"><?php echo $row_otf['truk_arah']; ?></span></td>
      <td><span class="style11"><?php echo $row_otf['truk_cur_act']; ?></span></td>
      <td><span class="style11"><?php echo $row_otf['truk_pos']; ?></span></td>
      <td><span class="style11"><?php echo $row_otf['truk_kat']; ?></span></td>
    </tr>
	</tbody>
    <?php } while ($row_otf = mysql_fetch_assoc($otf)); ?>
</table><br />

</body>
</html>
<?php
mysql_free_result($otf);
?>