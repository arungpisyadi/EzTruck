<?php
session_start() ;
if (isset($_SESSION['MM_userid']) && false) {
echo "You have already logout or somehow your cache didn't save the season. <br/>Goodbye..." ;
header ("Refresh: 5; URL='index.php'");
}
$user_id = $_SESSION['MM_userid'] ;
$_SESSION['MM_userid'] = $user_id ;
?>
<?php require_once('Connections/myconn.php'); ?>
<?php
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO karyawan (kary_id, kary_nama_1, kary_nama_2, kary_alamat_1, kary_alamat_2, kary_tgl_lahir, kary_no_ktp, kary_ktp_aktif, kary_no_sim, kary_jenis_sim, kary_sim_aktif, kary_telp, kary_hp, kary_pos, user_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['kary_id'], "int"),
                       GetSQLValueString($_POST['kary_nama_1'], "text"),
                       GetSQLValueString($_POST['kary_nama_2'], "text"),
                       GetSQLValueString($_POST['kary_alamat_1'], "text"),
                       GetSQLValueString($_POST['kary_alamat_2'], "text"),
                       GetSQLValueString($_POST['kary_tgl_lahir'], "date"),
                       GetSQLValueString($_POST['kary_no_ktp'], "text"),
                       GetSQLValueString($_POST['kary_ktp_aktif'], "date"),
                       GetSQLValueString($_POST['kary_no_sim'], "text"),
                       GetSQLValueString($_POST['kary_jenis_sim'], "text"),
                       GetSQLValueString($_POST['kary_sim_aktif'], "date"),
                       GetSQLValueString($_POST['kary_telp'], "text"),
                       GetSQLValueString($_POST['kary_hp'], "text"),
                       GetSQLValueString($_POST['kary_pos'], "text"),
					   GetSQLValueString($_POST['user_id'], "text"));

  mysql_select_db($database_myconn, $myconn);
  $Result1 = mysql_query($insertSQL, $myconn) or die(mysql_error());
  $insertGoTo = "viewemp.php";
  header(sprintf("Location: %s", $insertGoTo));
}

?>
<link rel="stylesheet" href="ui/development-bundle/themes/base/jquery.ui.all.css">
			<script src="ui/development-bundle/jquery-1.7.2.js"></script>
			<script src="ui/development-bundle/ui/jquery.ui.core.js"></script>
			<script src="ui/development-bundle/ui/jquery.ui.widget.js"></script>
			<script src="ui/development-bundle/ui/jquery.ui.datepicker.js"></script>
			<link rel="stylesheet" href="ui/development-bundle/demos/demos.css">
			<script>
			$(function() {
				$( "#datepicker" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: "yy-mm-dd"
					});
				});
			</script>	
			<script>
			$(function() {
				$( "#datepicker2" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: "yy-mm-dd"
					});
				});
			</script>
			<script>
			$(function() {
				$( "#datepicker3" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat: "yy-mm-dd"
					});
				});
			</script>
<?php
$iddpn = date("ym");
$idblk = $_GET['addid'];
$id = $iddpn.$idblk ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">		
<link href="css/form/style.css" rel="stylesheet" type="text/css" />

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <table align="center">
          <tr>
            <td>
			<div id="wrap">
				<div id="header">
				<h1>Add Employees;</h1>
				<h4>Now you can add your employee(s)</h4>
				</div>
			<ul id="contactform">
		<li><label for="name">Nomor Induk Karyawan:</label><span class="fieldbox"><input type="text" name="kary_id" value="<?php echo $id ; ?>" size="32" readonly="true"/>
		</span>(jangan dirubah, auto made)</li>
			
			<li><input type="hidden" name="user_id" value="<?php echo $idblk ; ?>"/></li>
            <li><label for="fname">Nama Depan:</label><span class="fieldbox"><input name="kary_nama_1" type="text" class="form" value="" size="32" id="name"></span></li>
            
			<li><label for="lname">Nama Belakang</label>:<span class="fieldbox"><input type="text" name="kary_nama_2" value="" size="32"></span></li>
			<li><label for="addr">Alamat:</label><span class="fieldbox"><input type="text" name="kary_alamat_1" value="" size="32"></span></li>
			<li><label for="addr2">Alamat 2:</label><span class="fieldbox"><input type="text" name="kary_alamat_2" value="" size="32"></span>(line 2, bila butuh)</li>
			<li><label for="bday">Tanggal lahir:</label> <span class="fieldbox"><input type="text" name="kary_tgl_lahir" value="" size="32" id="datepicker"></span></li>
			<li><label for="ktp">Nomor KTP:</label><span class="fieldbox"><input type="text" name="kary_no_ktp" value="" size="32"></span>(masukkan tapa menggunakan pemisah)</li>
			<li><label for="ktpend">Jatuh Tempo KTP:</label><span class="fieldbox"><input type="text" name="kary_ktp_aktif" value="" size="32" id="datepicker2"></span></li>
			<li><label for="sim">Nomor SIM:</label><span class="fieldbox"><input type="text" name="kary_no_sim" value="" size="32"></span></li>
			<li><label for="tsim">Jenis SIM:</label><span class="fieldbox"><input type="text" name="kary_jenis_sim" value="" size="32"></span></li>
			<li><label for="esim">Jatuh Tempo SIM:</label><span class="fieldbox"><input type="text" name="kary_sim_aktif" value="" size="32" id="datepicker3"></span></li>
			<li><label for="telp">Nomor Telpon:</label><span class="fieldbox"><input type="text" name="kary_telp" value="" size="32"></span></li>
			<li><label for="hp">Nomor Handphone:</label><span class="fieldbox"><input type="text" name="kary_hp" value="" size="32"></span></li>
			<li><label for="pos">Jabatan:</label>
			<span class="fieldbox"><select name="kary_pos">
                <option value="driver" <?php if (!(strcmp("driver", ""))) {echo "SELECTED";} ?>>Driver</option>
                <option value="staff" <?php if (!(strcmp("staff", ""))) {echo "SELECTED";} ?>>Staff</option>
                <option value="finance" <?php if (!(strcmp("finance", ""))) {echo "SELECTED";} ?>>Finance</option>
                <option value="marketing" <?php if (!(strcmp("marketing", ""))) {echo "SELECTED";} ?>>Marketing</option>
                <option value="manager" <?php if (!(strcmp("manager", ""))) {echo "SELECTED";} ?>>Manager</option>
                <option value="owner" <?php if (!(strcmp("owner", ""))) {echo "SELECTED";} ?>>Owner</option>
             </select></span></li>
			 </ul>
			 <p> </p>
			 <input type="hidden" name="MM_insert" value="form1">
             <input type="submit" value="Save Data" class="submitinput" id="sendbutton">               
            </td>
          </tr>
        </table>
        
</form>
      <p>&nbsp;</p>
	