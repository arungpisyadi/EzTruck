<?php

function cek_session()
{
if (!isset($_SESSION['MM_userid'])) {
header ("Location: expire.php");
die ;
	}else {
	$user_id = $_SESSION['MM_userid'] ;
	$_SESSION['MM_userid'] = $user_id ;
	}
}

function cek_kary(){
cek_session($_SESSION['MM_userid']);
$user_id = $_SESSION['MM_userid'] ;
require('Connections/myconn.php');
	
	mysql_select_db($database_myconn, $myconn);
		$query_auth = "SELECT add_kary FROM `user` WHERE user_id = '" . $user_id . "'";
		$auth = mysql_query($query_auth, $myconn) or die(mysql_error());
		$row_auth = mysql_fetch_assoc($auth);
		$totalRows_auth = mysql_num_rows($auth);
		
		if ($row_auth ['add_kary'] != 'Y'){
		header ("Location: error.php");
		exit();
		}
		else{
			$_SESSION['MM_userid'] = $user_id ;
	}
}
?>