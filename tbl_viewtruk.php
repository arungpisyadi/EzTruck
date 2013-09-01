<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_truk = "SELECT * FROM truck ORDER BY truk_id ASC";
$truk = mysql_query($query_truk, $myconn) or die(mysql_error());
$row_truk = mysql_fetch_assoc($truk);
$totalRows_truk = mysql_num_rows($truk);

session_start() ;
?>
<link href="css/tabel/tabel.css" rel="stylesheet" type="text/css">



<div align="center">
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      
      <table width="885" height="218" border="0" cellpadding="1" cellspacing="0">
	  <caption>Trucks on list</caption>
        <thead>
		<tr align="center">
          <th width="114">ID </th>
          <th width="294">Truck's Data(s) </th>
		  <th width="269">Insurance</th>
          <th width="149" colspan="2">Category</th>
        </tr>
		</thead>
		<?php do { ?>
		<tbody>
          <tr align="center" valign="top">
            <td align="center"><?php echo $row_truk['truk_id']; ?><a href="#"><br>
            edit</a></td>
            <td height="123" align="left"><?php echo $row_truk['truk_merk']; ?> | <?php echo $row_truk['truk_tipe']; ?><br>
            <br>
            <?php echo $row_truk['truk_no_polisi']; ?><br>
            <br>
            Chasis no:&nbsp;<?php echo $row_truk['truk_no_rangka']; ?><br>
            Machine No:<?php echo $row_truk['truk_no_mesin']; ?></td>
            <td>Insurance: <?php echo $row_truk['truk_ins']; ?><br>
            <br>
            Policy No: <?php echo $row_truk['truk_no_ins']; ?><br>
            <br>
            End of Insurance Period: <?php echo $row_truk['truk_ins_jtempo']; ?><br>
            <br></td>
            <td colspan="2"><?php echo $row_truk['truk_kat']; ?></td>
          </tr>
          </tbody>
		  <?php } while ($row_truk = mysql_fetch_assoc($truk)); ?>
		  <tfoot>
          <tr align="center"><th colspan="7" scope="row">Total Truck(s):
            <?php echo $totalRows_truk; ?> Truck(s)                    </tr>
         </tfoot>
      </table>
</div>
<?php
mysql_free_result($truk);
?>
