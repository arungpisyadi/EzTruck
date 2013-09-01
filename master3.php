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
<script src="ui/jquery-ui-1.8.20.custom.css"></script>
<body onload="UR_Start()">
<div class="row"><?php include('header2.php'); ?></div>
<div id="vc1"></div>
<script>
$("#vc1").load("#", function(response, status, xhr){
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});

</script>
<div class="foot"><?php include('footer.php'); ?></div>
</body>
</html>