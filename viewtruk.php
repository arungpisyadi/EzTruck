<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>EZ-Truck, Trucking Transportation Management System</title>
<link rel="shortcut icon" href="images/icon.ico" />
<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
<link href="css/format1.css" rel="stylesheet" type="text/css" />
<link href="menu/css/style.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript" src="ui/js/jquery-1.3.2.js"></script>
<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#vc1').load('tbl_viewtruk.php').fadeIn("fast");
}, 5000); // refresh every 5000 milliseconds
</script>
<body onload="UR_Start()">
<div align="center">
<div class="row"><?php include('header2.php'); ?></div>
<div class="content" align="center" id="vc1"></div>
</div>
<div class="foot"><?php include('footer.php'); ?></div>

</body>
</html>