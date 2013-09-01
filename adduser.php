<?php require_once('Connections/myconn.php'); ?>
<?php
session_start() ;
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
if (isset($_SERVER['QUERY_STRING'])) {
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO user (user_name, user_pass, user_stat) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['user_name'], "text"),
                       GetSQLValueString($_POST['user_pass'], "text"),
                       GetSQLValueString($_POST['user_stat'], "text"));

  mysql_select_db($database_myconn, $myconn);
  $Result1 = mysql_query($insertSQL, $myconn) or die(mysql_error());
  

$namenew = $_POST['user_name'] ;
mysql_select_db($database_myconn, $myconn);
$query_selectid = "SELECT `user`.user_id FROM `user` WHERE `user`.user_name='$namenew'";
$selectid = mysql_query($query_selectid, $myconn) or die(mysql_error());
$row_selectid = mysql_fetch_assoc($selectid);
$totalRows_selectid = mysql_num_rows($selectid);
$idadd = $row_selectid['user_id'];
  $insertGoTo = "addemp.php?addid=" . $idadd ;
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
<div id="containerpage">
<div class="content" id="vc2"></div>
<script>
$("#vc2").load("<?php echo $insertGoTo; ?>", function(response, status, xhr){
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});

</script>
</div>
<?php 
}
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
$("#vc1").load("form_adduser.php", function(response, status, xhr){
  if (status == "error") {
    var msg = "Sorry but there was an error: ";
    $("#error").html(msg + xhr.status + " " + xhr.statusText);
  }
});

</script>
<div class="foot"><?php include('footer.php'); ?></div>
</body>
</html>