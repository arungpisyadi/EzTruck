<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_userstat = "SELECT user_id, user_stat FROM `user`";
$userstat = mysql_query($query_userstat, $myconn) or die(mysql_error());
$row_userstat = mysql_fetch_assoc($userstat);
$totalRows_userstat = mysql_num_rows($userstat);
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}
if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "user_id";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = true;
  mysql_select_db($database_myconn, $myconn);
  	
  $LoginRS__query=sprintf("SELECT user_name, user_pass, user_id FROM user WHERE user_name='%s' AND user_pass='%s'",
  get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $myconn) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'user_id');
    
    //declare two session variables and assign them
    $_SESSION['MM_username'] = $loginUsername;
    $_SESSION['MM_userid'] = $loginStrGroup;	      
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

$updateSQL = sprintf("UPDATE user SET user_stat=%s WHERE user_name=%s",
                       GetSQLValueString($_POST['stat'], "text"),
                       GetSQLValueString($loginUsername, "text"));

  mysql_select_db($database_myconn, $myconn);
  $Result1 = mysql_query($updateSQL, $myconn) or die(mysql_error());

if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
	
    header("Location: " . $MM_redirectLoginSuccess );
	}
	 else {
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
  <tr valign="top">
    <td height="100%">
		<form action="<?php echo $loginFormAction; ?>" method="POST" name="login" id="login">
	<div align="center">
	  <table width="75%" border="0" cellspacing="0" cellpadding="4">
        <tr class="login">
          <td colspan="2" style="vertical-align: top"><h3>Sign In</h3>            </td>
          </tr>
        <tr class="login" style="vertical-align: top">
          <td width="20%" class="TitleColor"><label for="username"><strong>User Name</strong></label>
            &nbsp;<br />
            <input id="username" name="username" type="text" size="25" />
            <label for="password"><strong>Password</strong></label>
            &nbsp;<br />
            <input id="password" name="password" type="password" size="25" />
            <p>
			<input name="stat" type="hidden" value="L" />
              <input type="submit" name="submit" value="Login" />
          </p></td>
          <td width="80%" class="StoryContentColor"><h4 class="TitleColor">Instructions:</h4>
            <p class="error">You have entered a wrong username or password, Please make sure you have turned off <strong>Caps Lock</strong> Button.</p>
			<p>Login  using only <strong><u> user id</u></strong>, please contact administrator if you haven't obtain one. </p>
            <p>Thank you,</p>
            <p><u>Web Admin</u> </p></td>
        </tr>
      </table>
	  <p>&nbsp;</p>
    </div>
	</form>
	</td>
  </tr>
<?php
  }
}
?>
  </td>
  </tr>
  <tr class="footer">
    <td><div align="center"><?php include('footer.php'); ?></div></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($userstat);
?>