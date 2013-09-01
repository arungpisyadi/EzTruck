<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_trukkat = "SELECT * FROM truk_kategori";
$trukkat = mysql_query($query_trukkat, $myconn) or die(mysql_error());
$row_trukkat = mysql_fetch_assoc($trukkat);
$totalRows_trukkat = mysql_num_rows($trukkat);

session_start() ;
?>
<link href="css/tabel/tabel.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="ui/development-bundle/themes/base/jquery.ui.all.css">
<link rel="stylesheet" href="ui/development-bundle/demos/demos.css">
<div align="center">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p></p>
  <table width="745" border="0" align="center">
    <caption>Truck's categories<br>
	</caption>
	<thead>	  
    <tr>
      <th width="182">Category ID</th>
      <th width="206">Category Name</th>
      <th width="346">Description on Category</th>
      <th width="175"><script src="ui/development-bundle/jquery-1.7.2.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.button.js"></script>
	
	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});
	</script>
  <div class="demo" align="left"><a href="addtrukkat.php" class="style1">Add new</a></div></th>
    </tr>
	</thead>
		<tbody>
    <?php do { ?>
      <tr align="left" valign="top" class="hover">
        <td><?php echo $row_trukkat['truk_kategori_id']; ?></td>
          <td><?php echo $row_trukkat['truk_kategori_name']; ?></td>
          <td><?php echo $row_trukkat['truk_kategori_desc']; ?></td>
          <td>&nbsp;</td>
      </tr>
      <?php } while ($row_trukkat = mysql_fetch_assoc($trukkat)); ?>
    </tbody>
    </table>
</div>
<?php
mysql_free_result($trukkat);
?>
