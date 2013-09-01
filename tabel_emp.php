<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_tabel_emp = "SELECT * FROM karyawan";
$tabel_emp = mysql_query($query_tabel_emp, $myconn) or die(mysql_error());
$row_tabel_emp = mysql_fetch_assoc($tabel_emp);
$totalRows_tabel_emp = mysql_num_rows($tabel_emp);
?><link href="css/tabel/tabel.css" rel="stylesheet" type="text/css">
<link href="#">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table border="0" align="center" cellpadding="0" cellspacing="0">
  <caption>Employee's Data Record</caption>
    <thead>
	<tr>
      <th>N.I.K</th>
      <th>Employee's Name</th>
      <th>Address</th>
      <th>Driver License</th> 
      <th>Telepon dan Handphone</th>
      <th>Position</th>
      <th>&nbsp;</th>
	 </tr>
    </thead>
    <?php do { ?>
      <tr valign="top">
        <td><?php echo $row_tabel_emp['kary_id']; ?></td>
        <td><?php echo $row_tabel_emp['kary_nama_1']; ?>&nbsp;<?php echo $row_tabel_emp['kary_nama_2']; ?></td>
        <td><?php echo $row_tabel_emp['kary_alamat_1']; ?><br>
          <?php echo $row_tabel_emp['kary_alamat_2']; ?></td>
        <td><strong>No. SIM:</strong>&nbsp;<?php echo $row_tabel_emp['kary_no_sim']; ?><br>
          <br>
          <strong>SIM:</strong>&nbsp;<?php echo $row_tabel_emp['kary_jenis_sim']; ?><br>
          <br>
          <strong>Aktif s/d:</strong>&nbsp; <?php echo $row_tabel_emp['kary_sim_aktif']; ?></td>
        <td><strong>No. Telepon:&nbsp;</strong> <?php echo $row_tabel_emp['kary_telp']; ?><br>
          <br>
          <strong>No. Handphone:</strong>&nbsp; <?php echo $row_tabel_emp['kary_hp']; ?></td>
        <td><?php echo $row_tabel_emp['kary_pos']; ?></td>
        <td><a href="<?php echo 'emp_det.php?kary_id=' . $row_tabel_emp['kary_id'] ; ?>">view details</a></td>
      </tr>
      <?php } while ($row_tabel_emp = mysql_fetch_assoc($tabel_emp)); ?>
  </table>
</div>
<?php
mysql_free_result($tabel_emp);
?>
