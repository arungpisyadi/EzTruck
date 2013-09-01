<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<link href="format.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="menu/css/style.css" type="text/css" media="screen, projection"/>
	<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
			
	<script type="text/javascript" src="menu/js/jquery-1.3.1.min.js"></script>	
	<script type="text/javascript" language="menu/javascript" src="js/jquery.dropdownPlain.js"></script></head>

<body>
<table width="100%" height="100%" border="0" align="center" cellpadding="1" cellspacing="0" class="wrapper">
	<tr class="static">
    <td width="100%" height="80"> <?php include('header.php') ; ?> </td>
  </tr>
    <tr class="content">
      <td width="100%" height="241">
	  <p>
	  <?php
	  $date = date("Y-m-d");
	  echo $date ;
	  echo "<br/>30 hari kemudian adalah <br/>" ;
	  $day = 30 ;
	  $date_add = strtotime(date("Y-m-d", strtotime($date)) . " + " . $day . "days");;
	  echo date("Y-m-d",$date_add);
	  
	  ?>
	  &nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
        <tr class="content">
    <td width="100%"></td>
  </tr>
  <tr class="content">
    <td width="100%" height="50" class="footer"><?php include('footer.php'); ?></td>
  </tr>
</table>

</body>
</html>
