<?php
session_start() ;
header ("Refresh: 5; URL='index.php'");
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
.style1 {font-size: 16px}
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
	<div align="center" class="error">
	  <p>&nbsp;</p>
	  <p class="style1">You have already logout or somehow your cache didn't save the season. Goodbye... </p>
	  <p>&nbsp;</p>
	</div></td>
  </tr>
  <tr class="footer">
    <td><div align="center"><?php include('footer.php'); ?></div></td>
  </tr>
</table>
</body>
</html>
