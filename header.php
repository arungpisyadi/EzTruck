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
?>

<link href="format.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="menu/css/style.css" type="text/css" media="screen, projection"/>
	<!--[if lte IE 7]>
        <link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" />
    <![endif]-->
			
    <link href="ui/css/smoothness/jquery-ui-1.8.20.custom.css" rel="stylesheet" type="text/css" />
<table width="1268" height="161" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#ECE9D8" class="ui-widget-header">
<tr valign="top">
    <td width="144" rowspan="4" align="center" valign="middle" bordercolor="#ECE9D8" class="HeaderColor"><div align="center"><img src="Images/Logo.png" width="150" height="88" /></div></td>
    <td height="70" colspan="3" align="left" valign="bottom" class="version"><div align="left">Version: <?php echo $row_VERSION['main_version']; ?>.<?php echo $row_VERSION['sub_version']; ?>.<?php echo $row_VERSION['ch_version']; ?> </div></td>
	<td width="360" rowspan="2" valign="bottom">
    <img src="Images/Truck.png" width="236" height="85" />	</td>
  </tr>
  <tr>
    <td width="184" height="39" class="user">License type: <?php echo $row_license['type']; ?>
    <div class="user" align="left">    </div>	</td>
    <td width="254" class="user">Licence Holder: <?php echo $row_license['customer']; ?></td>
	<td width="274" align="center" valign="middle" bordercolor="#FFFFFF" class="clock">
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
<font id="ur" size="5" face="Arial, Helvetica, sans-serif" color="#FF0000">&nbsp;</font>	</td>
  </tr>
  <tr>
    <td height="33" colspan="3" align="left" valign="bottom" class="user">
	<div class="hover" align="left">
	<script type="text/javascript" src="menu/js/jquery-1.3.1.min.js"></script>	
	<script type="text/javascript" language="JavaScript" src="menu/js/jquery.dropdownPlain.js"></script>
	<ul class="dropdown">
        	<li><a href="#">Files</a>
        		<ul class="sub_menu">
        			 <li><a href="index.php">Home</a></li>
        			 <li>
        				<a href="#">User Menu</a>
        				<ul>
        					<li><a href="login.php">Login</a></li>
        					<li><a href="#">User Page</a></li>
        				</ul>
        			 </li>
        			 <li><a href="#">Benches &amp; Bleachers</a></li>
        			 <li><a href="#">Communication Devices</a></li>
        			 <li><a href="#">Dugouts</a></li>
        			 <li><a href="#">Fencing &amp; Windscreen</a></li>
        			 <li><a href="#">Floor Protectors</a></li>
        			 <li><a href="#">Foul Poles</a></li>
        			 <li><a href="#">Netting</a></li>
        			 <li><a href="#">Outdoor Furniture &amp; Storage</a></li>
        			 <li><a href="#">Outdoor Signs</a></li>
        			 <li><a href="#">Padding</a></li>
        			 <li><a href="#">Scoreboards</a></li>
        			 <li><a href="#">Shade Structures</a></li>
        			 <li><a href="logout.php">LOGOUT</a></li>
        		</ul>
        	</li>
        	<li><a href="#">Field Maintenance</a>
        		<ul class="sub_menu">
        			<li><a href="#">All-in-One Team Cart</a></li>
        			<li><a href="#">Air &amp; Electrical Reels</a></li>
        			 <li><a href="#">Field Drags</a></li>
        			 <li>
        				<a href="#">Field Marking Equipment</a>
        				<ul>
        					<li><a href="#">Batter's Box Templates</a></li>
        					<li><a href="#">Dryline Markers</a></li>
        					<li><a href="#">Field Paint</a></li>
        					<li><a href="#">Field Sprayers</a></li>
        					<li><a href="#">Stencils</a></li>
        				</ul>
        			 </li>
        			 <li>
        				<a href="#">Field Tarps</a>
        				<ul>
        					<li><a href="#">Area Tarps</a></li>
        					<li><a href="#">Growth Covers / Protectors</a></li>
        					<li><a href="#">Infield Tarps</a></li>
        					<li><a href="#">Tarp Accessories</a></li>
        				</ul>
        			 </li>
        			 <li><a href="#">Hand Tools</a></li>
        			 <li>
        				<a href="#">Irrigation, Hoses, Nozzles</a>
        				<ul>
        					<li><a href="#">Hoses &amp; Hose Reels</a></li>
        					<li><a href="#">Irrigation</a></li>
        					<li><a href="#">Nozzles</a></li>
        				</ul>
        			 </li>
        			 <li><a href="#">Layout &amp; Measurement Tools</a></li>
        			 <li><a href="#">Moisture Removal</a></li>
        			 <li><a href="#">Mound &amp; Home Plate Fortification</a></li>
        			 <li><a href="#">Mowers &amp; Stripers</a></li>
        			 <li><a href="#">Soil &amp; Enviornmental Management</a></li>
        			 <li><a href="#">Soil Amendments</a></li>
        			 <li><a href="#">Spreaders &amp; Sweepers</a></li>
        			 <li><a href="#"> - VIEW ALL - </a></li>
        		</ul>
        	</li>
        	<li><a href="#">Game-Practice Equipment</a>
        		<ul class="sub_menu">
        			 <li>
        				<a href="#">Baseball - Softball</a>
        				<ul>
        					<li><a href="#">Base Accessories</a></li>
        					<li><a href="#">Bases &amp; Home Plates</a></li>
        					<li><a href="#">Game Accessories</a></li>
        					<li><a href="#">Pitching Rubbers</a></li>
        				</ul>
        			 </li>
        			 <li>
        				<a href="#">Batting Practice Equipment</a>
        				<ul>
        					<li><a href="#">Backstops</a></li>
        					<li><a href="#">Infield Screens</a></li>
        					<li><a href="#">Jugs Pitching Machines</a></li>
        					<li><a href="#">Turf Mats</a></li>
        					<li><a href="#">Turf Protectors</a></li>
        					<li><a href="#">Replacement Accessories</a></li>
        				</ul>
        			 </li>
        			 <li>
        				<a href="#">Batting Cages</a>
        				<ul>
        					<li><a href="#">Indoor</a></li>
        					<li><a href="#">Outdoor</a></li>
        				</ul>
        			 </li>
        			 <li>
        				<a href="#">Portable Mounds</a>
        				<ul>
        					<li><a href="#">Batting Practice Mounds</a></li>
        					<li><a href="#">Game Mounds</a></li>
        					<li><a href="#">Practice Mounds</a></li>
        				</ul>
        			 </li>
        			 <li>
        				<a href="#">Football</a>
        				<ul>
        					<li><a href="#">First Down Markers</a></li>
        					<li><a href="#">Football Accessories</a></li>
        					<li><a href="#">Football Goalposts</a></li>
        				</ul>
        			 </li>
        			 <li>
        				<a href="#">Soccer</a>
        				<ul>
        					<li><a href="#">Soccer Goals</a></li>
        					<li><a href="#">Soccer Accessories</a></li>
        				</ul>
        			 </li>
        			 <li><a href="#"> - VIEW ALL - </a></li>
        		</ul>
        	</li>
        	<li><a href="#">Training &amp; Conditioning</a>
        		<ul class="sub_menu">
        			 <li><a href="#">Ladders &amp; Sticks</a></li>
        			 <li><a href="#">Hurdles</a></li>
        			 <li><a href="#">Training Accessories</a></li>
        			 <li><a href="#">Smart-Cart Training System</a></li>
        			 <li><a href="#">Smart-Hurdle Collection</a></li>
        			 <li><a href="#"> - VIEW ALL - </a></li>
        		</ul>
        	</li>
        	<li><a href="#">Books-Videos</a>
        		<ul class="sub_menu">
        			 <li><a href="#">Field Design &amp; Maintenance</a></li>
        			 <li><a href="#">Turf Management</a></li>
        			 <li><a href="#">Training</a></li>
        			 <li><a href="#"> - VIEW ALL - </a></li>
        		</ul>
        	</li>
        </ul>
    </div>		</td>
    <td width="360" align="left" valign="bottom" bordercolor="#FFFFFF" class="ui-state-error"><?php
	if (isset($_SESSION['MM_userid']) && true) {
    $username = $_SESSION['MM_username'];
	$userid = $_SESSION['MM_userid'];
	$date = date("d-m-Y");
	 	echo "<pre> Welcome " . $username . "<br>";
		echo " You Logged in on " . $date . " | <a href='logout.php'>Logout</a></pre>" ;
    }
 else {
    	echo "<pre> Welcome Guest,<br> Please login using <strong>File -> User Menu -> Login </strong></pre>";
		}
	?></td>
  </tr>
</table>
    <p>
      <?php
mysql_free_result($VERSION);

mysql_free_result($license);
?>