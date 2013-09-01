<?php require_once('Connections/myconn.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
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

if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
	}
	 else {
	 header("Location: " . $MM_redirectLoginFailed );
		  }
	}
?>
