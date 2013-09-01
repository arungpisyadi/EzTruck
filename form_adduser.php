<?php 
session_start() ;
require('fungsi.php'); 
?>
<?php require_once('Connections/myconn.php'); ?>
<?php
cek_session($_SESSION['MM_userid']) ;
cek_kary($_SESSION['MM_userid']);
$editFormAction = 'addemp.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/form/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrap">
		<div id="header">
			<h1>&nbsp;</h1>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<h1>Before you can add an employee data, the system need to record it as a user. There for you have to create the username for the employee first.<br />
			Use the form below to register a username for the employee in to the system, later on you can decide wether that user is allowed to access different access .</h1>
		</div>
	
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
	<ul id="contactform">
				<li><label for="name">Username:</label>
				<span class="fieldbox">
				<input type="text" name="user_name" id="name" value=""/>
				</span>
				</li>
				<li><label for="pass">Password:</label>
				<span class="fieldbox">
				<input type="password" name="user_pass" id="pass" value=""/>
				</span>
				</li>
				<li>
				<label for="select">User Group:</label>
				<span>
				<input type="hidden" name="user_stat" value="NL">
				</span>
				</li>
	</ul>
				<input name="submit" type="submit" value="Save User" id="sendbutton"/>
                <input type="hidden" name="MM_insert" value="form1">
	</form>
     </div>
	 </body>