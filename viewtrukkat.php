<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_trukkat = "SELECT * FROM truk_kategori";
$trukkat = mysql_query($query_trukkat, $myconn) or die(mysql_error());
$row_trukkat = mysql_fetch_assoc($trukkat);
$totalRows_trukkat = mysql_num_rows($trukkat);

session_start() ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EZ-Truck, Trucking Transportation Management System</title>
<link rel="shortcut icon" href="images/icon.ico" />
<link href="format.css" rel="stylesheet" type="text/css" />
<link href="format.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="menu/css/style.css" type="text/css" media="screen, projection"/>
	<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
<style type="text/css">
<!--
body {
	background-image: url(Images/project_papper.png);
	background-repeat: repeat;
}
-->
</style></head>

<body onload="UR_Start()">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="wrapper">
  <tr class="static">
    <td class=""><div align="center"><?php include('header2.php'); ?></div></td>
  </tr>
  <tr>
    <td height="175">&nbsp;</td>
  </tr>
  <tr>
    <td height="100%">
	<div align="center">
      <p class="titletbl"><u>Truck's categories</u> </p>
      <table width="750" border="0" cellpadding="1" cellspacing="0">
        <tr class="tabelhead" align="center">
          <td width="161">Category ID </td>
          <td width="185">Category Name </td>
          <td width="319">Description on Category </td>
        </tr>
        <?php do { ?>
          <tr class="hover" align="justify">
            <td><?php echo $row_trukkat['truk_kategori_id']; ?></td>
            <td><?php echo $row_trukkat['truk_kategori_name']; ?></td>
            <td><?php echo $row_trukkat['truk_kategori_desc']; ?></td>
          </tr>
          <?php } while ($row_trukkat = mysql_fetch_assoc($trukkat)); ?>
      </table>
	</div></td>
  </tr>
  <tr class="footer">
    <td><div align="center"><?php include('footer.php'); ?></div></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($trukkat);
?>
