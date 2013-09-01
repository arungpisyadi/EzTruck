<?php require_once('Connections/myconn.php'); ?>
<?php
mysql_select_db($database_myconn, $myconn);
$query_VERSION = "SELECT * FROM version";
$VERSION = mysql_query($query_VERSION, $myconn) or die(mysql_error());
$row_VERSION = mysql_fetch_assoc($VERSION);
$totalRows_VERSION = mysql_num_rows($VERSION);

mysql_select_db($database_myconn, $myconn);
$query_license = "SELECT * FROM license";
$license = mysql_query($query_license, $myconn) or die(mysql_error());
$row_license = mysql_fetch_assoc($license);
$totalRows_license = mysql_num_rows($license);

mysql_select_db($database_myconn, $myconn);
$query_company = "SELECT company_name, company_telp_1, company_email, company_website FROM company";
$company = mysql_query($query_company, $myconn) or die(mysql_error());
$row_company = mysql_fetch_assoc($company);
$totalRows_company = mysql_num_rows($company);
?>
<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
<link href="ui/css/smoothness/jquery-ui-1.8.20.custom.css" rel="stylesheet" type="text/css" />

<link href="css/header/header.css" rel="stylesheet" type="text/css" />
<link href="menu/css/style.css" rel="stylesheet" type="text/css" />

<div id="container">
<div class="imageholder">
<img src="Images/Logo.png" width="144" height="77" /><img src="Images/Truck.png" width="143" height="42" />
</div>
<div class="version">
Software Version: <?php echo $row_VERSION['main_version']; ?>.<?php echo $row_VERSION['sub_version']; ?>.<?php echo $row_VERSION['ch_version']; ?></div>
<div class="copyright">&copy; 2012 MTCore Solut-E All rights reserved | <a href="http://mtcore.co.id">Visit us </a> &#149; <a href="http://mtcore.wordpress.com">Blog</a> | Best viewed with Mozilla Firefox 6+ (resolution: 1280x768)</div>
<div class="clocks">
<font size="5" face="Courier New, Courier, monospace" color="#FF0000">&nbsp; 
        <?php
	$today = date("j F Y");
	echo $today . " - ";
	?>
    </font>
        <script type="text/javascript">
	function UR_Start() 
	{
	UR_Nu = new Date;
	UR_Indhold = showFilled(UR_Nu.getHours()) + ":" + showFilled(UR_Nu.getMinutes()) + ":" + showFilled(UR_Nu.getSeconds());
	document.getElementById("ur").innerHTML = UR_Indhold;
	setTimeout("UR_Start()",1000);
	}
	function showFilled(Value) 
	{
	return (Value > 9) ? "" + Value : "0" + Value;
	}
	  </script>
        <font id="ur" size="5" face="Courier New, Courier, monospace" color="#FF0000">&nbsp;	</font>
</div>
<div class="customer" align="center">
Licence Holder: <?php echo $row_license['customer']; ?>License type: <?php echo $row_license['type']; ?>
<br />
<?php echo $row_company['company_name']; ?> | <?php echo $row_company['company_telp_1']; ?> | <?php echo $row_company['company_email']; ?> | <a href="<?php echo $row_company['company_website']; ?>" class="linked"><?php echo $row_company['company_website']; ?></a>
</div>
<div class="login"><?php
	if (isset($_SESSION['MM_userid']) && true) {
    $username = $_SESSION['MM_username'];
	$userid = $_SESSION['MM_userid'];
	$date = date("d-m-Y");
	 	echo "<pre>Welcome [ " . $username . " ]<br /></pre> ";?>
      <a href='logout.php' class="linked">Logout</a>
      <?php
		}
 else {
    	?>
     <form action="login.php" method="POST" name="login" id="login">
	<label for="username">Username</label>
    <label for="username">
    <input id="username" name="username" type="text" size="20" />
    </label>
    <br />
	<label for="password"> Password</label>
    <input id="password" name="password" type="password" size="20" />
    <br />
	<input name="stat" type="hidden" value="L" />
	<input type="submit" name="submit" value="Login" />
</form>
<?php
		}
?>
</div>
<div class="menu">
<ul class="dropdown">
      <div align="left">
      <span class="hover">
      <script type="text/javascript" src="menu/js/jquery-1.3.1.min.js"></script>
      <script type="text/javascript" language="JavaScript" src="menu/js/jquery.dropdownPlain.js"></script>
      </span>
      <li><a href="#">FILES</a>
          <ul class="sub_menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">User Menu</a>
                <ul>
                  <li><a href="index.php">Login</a></li>
                  <li><a href="#">User Page</a></li>
                </ul>
            </li>
            <li><a href="#">Employees</a>
                <ul>
                  <li><a href="addemp.php">Add New</a></li>
                  <li><a href="viewemp.php">View Employee(s)</a></li>
                </ul>
            </li>
            <li><a href="#">Company Setup</a></li>
            <li><a href="#">Help</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
            <li><a href="exit.php">EXIT</a></li>
          </ul>
      </li>
      <li><a href="#">TRUCKS &amp; CUSTOMERS</a>
          <ul class="sub_menu">
            <li><a href="#">Control Panel</a></li>
            <li><a href="#">Vehicle Data</a>
                <ul>
                  <li><a href="#">Add New</a>
                      <ul>
                        <li><a href="addtruk.php">Truck</a></li>
                        <li><a href="add_truk_kat.php">Truck's Categoriy</a></li>
                      </ul>
                  </li>
                  <li><a href="viewtruk.php">View Truck</a></li>
                  <li><a href="view_truk_kat.php">View Truck's Categories</a></li>
                </ul>
            </li>
            <li> <a href="#">Customers</a>
                <ul>
                  <li><a href="view_cust.php">View Customers</a></li>
                </ul>
            </li>
            <li><a href="#"> - VIEW ALL - </a></li>
          </ul>
      </li>
      <li><a href="#">TRANSACTION(S)</a>
          <ul class="sub_menu">
            <li> <a href="#">ORDER IN</a>
                <ul>
                  <li><a href="#">Create New</a></li>
                  <li><a href="#">Order Status</a></li>
                  <li><a href="#">Contracts</a></li>
                </ul>
            </li>
            <li> <a href="#">Delivery Order</a>
                <ul>
                  <li><a href="#">Create New</a></li>
                  <li><a href="#">Check Status</a></li>
                </ul>
            </li>
            <li> <a href="#">Invoice</a>
                <ul>
                  <li><a href="#">New Invoice</a></li>
                  <li><a href="#">View Invoice</a></li>
                </ul>
            </li>
            <li><a href="#"> - VIEW ALL - </a></li>
          </ul>
      </li>
      <li><a href="#">FINANCE</a>
          <ul class="sub_menu">
            <li><a href="#">Invoice Payment </a>
                <ul>
                  <li><a href="#">New Payment</a></li>
                  <li><a href="#">On Hold Payment</a></li>
                  <li><a href="#">View Status</a></li>
                </ul>
            </li>
            <li><a href="#">Company Cash</a>
                <ul>
                  <li><a href="#">Cash In</a></li>
                  <li><a href="#">Cash Out</a></li>
                  <li><a href="#">Profit/Loss</a></li>
                </ul>
            </li>
            <li><a href="#">Balance</a></li>
            <li><a href="#"> - VIEW ALL - </a></li>
          </ul>
      </li>
      <li><a href="#">SPAREPARTS &amp; SUPPLIES</a>
          <ul class="sub_menu">
            <li><a href="#">Spareparts</a>
                <ul>
                  <li><a href="#">Buy Stocks</a></li>
                  <li><a href="#">Stocks Received</a></li>
                  <li><a href="#">Stocks Opname</a></li>
                </ul>
            </li>
            <li><a href="#">Supliers</a>
                <ul>
                  <li><a href="#">Add New</a></li>
                  <li><a href="#">View</a></li>
                </ul>
            </li>
            <li><a href="#">Training</a></li>
            <li><a href="#"> - VIEW ALL - </a></li>
          </ul>
      </li>
      <li><a href="#">ABOUT</a>
          <ul class="sub_menu">
            <li><a href="#">Credits</a></li>
            <li><a href="#">F.A.Q</a></li>
            <li><a href="#"> - VIEW ALL - </a></li>
          </ul>
      </li>
    </ul>
</div>
</div>

<?php
mysql_free_result($VERSION);

mysql_free_result($license);

mysql_free_result($company);
?>