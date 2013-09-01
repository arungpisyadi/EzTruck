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
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
		
		mysql_select_db($database_myconn, $myconn);
		$query_trukid = "SELECT truk_id FROM truck";
		$trukid = mysql_query($query_trukid, $myconn) or die(mysql_error());
		$row_trukid = mysql_fetch_assoc($trukid);
		$totalRows_trukid = mysql_num_rows($trukid);
		
if ($totalRows_trukid < 1){
  $insertSQL = sprintf("INSERT INTO truck (truk_id, truk_merk, truk_tipe, truk_no_polisi, truk_no_rangka, truk_no_mesin, truk_ins, truk_no_ins, truk_ins_jtempo, truk_kat) VALUES (7101001,%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['truk_merk'], "text"),
                       GetSQLValueString($_POST['truk_tipe'], "text"),
                       GetSQLValueString($_POST['truk_no_polisi'], "text"),
                       GetSQLValueString($_POST['truk_no_rangka'], "text"),
                       GetSQLValueString($_POST['truk_no_mesin'], "text"),
                       GetSQLValueString($_POST['truk_ins'], "text"),
                       GetSQLValueString($_POST['truk_no_ins'], "text"),
                       GetSQLValueString($_POST['truk_ins_jtempo'], "text"),
                       GetSQLValueString($_POST['truk_kat'], "text"));
}else{
	$insertSQL = sprintf("INSERT INTO truck (truk_merk, truk_tipe, truk_no_polisi, truk_no_rangka, truk_no_mesin, truk_ins, truk_no_ins, truk_ins_jtempo, truk_kat) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['truk_merk'], "text"),
                       GetSQLValueString($_POST['truk_tipe'], "text"),
                       GetSQLValueString($_POST['truk_no_polisi'], "text"),
                       GetSQLValueString($_POST['truk_no_rangka'], "text"),
                       GetSQLValueString($_POST['truk_no_mesin'], "text"),
                       GetSQLValueString($_POST['truk_ins'], "text"),
                       GetSQLValueString($_POST['truk_no_ins'], "text"),
                       GetSQLValueString($_POST['truk_ins_jtempo'], "text"),
                       GetSQLValueString($_POST['truk_kat'], "text"));
					   }
  mysql_select_db($database_myconn, $myconn);
  $Result1 = mysql_query($insertSQL, $myconn) or die(mysql_error());

	
	mysql_select_db($database_myconn, $myconn);
		$query_trukid = "SELECT truk_id, truk_no_polisi FROM truck WHERE VC = 0";
		$trukid = mysql_query($query_trukid, $myconn) or die(mysql_error());
		$row_trukid = mysql_fetch_assoc($trukid);
		$totalRows_trukid = mysql_num_rows($trukid);
	
	$truk_id = $row_trukid['truk_id'];
	$truk_no_polisi = $row_trukid['truk_no_polisi'];
	$insertSQL2 = sprintf("INSERT INTO virtual_control (`truk_id`, `truk_no_polisi`) VALUES ('$truk_id', '$truk_no_polisi');");
	$insertSQL3 = "UPDATE truck SET VC = 1 WHERE truk_id = '$truk_id';";
	mysql_select_db($database_myconn, $myconn);
	$result2 = mysql_query($insertSQL2, $myconn) or die(mysql_error());
	$result3 = mysql_query($insertSQL3, $myconn) or die(mysql_error());
  $insertGoTo = "viewtruk.php";
  header(sprintf("Location: %s", $insertGoTo));
}
?>

			<link href="css/form/form.css" rel="stylesheet" type="text/css" />
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
			changeYear: true
				});
			});
			</script>		

<?php
mysql_select_db($database_myconn, $myconn);
$query_trukcat = "SELECT * FROM truk_kategori";
$trukcat = mysql_query($query_trukcat, $myconn) or die(mysql_error());
$row_trukcat = mysql_fetch_assoc($trukcat);
$totalRows_trukcat = mysql_num_rows($trukcat);
?>
      	<link href="css/form/style.css" rel="stylesheet" type="text/css" />
		<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
		<div align="center" class="style7">
		  <p class="style8">&nbsp;</p>
		  <p class="style8">&nbsp;</p>
		  <p class="style8">&nbsp;</p>
		  <p class="style8">&nbsp;</p>
		</div>
        <table>
          <tr>
            <td>
			<div id="wrap">
			<div id="header">
			<h1>Add Truk</h1> 
			</div>
			<ul id="contactform">
			<li><label for="merk">Merk:</label><span class="fieldbox"><input type="text" name="truk_merk" value="" size="32"></span></li>
			<li><label for="type">Type:</label><span class="fieldbox"><input type="text" name="truk_tipe" value="" size="32"></span>(e.g: JW190PS)</li>
			<li><label for="license">Lisence ID:</label><span class="fieldbox"><input type="text" name="truk_no_polisi" value="" size="32"></span><label>(e.g: H-1234-EY)</label></li>
			<li><label for="chasis">Chasis No:</label><span class="fieldbox"><input name="truk_no_rangka" type="text" class="chasis" value="" size="32"></span></li>
			<li><label for="machine">Machine No:</label><span class="fieldbox"><input type="text" name="truk_no_mesin" value="" size="32"></span></li>
            <li><label for="ins">Insurance by (Insurance Company):</label>
			<span class="fieldbox"><input type="text" name="truk_ins" value="" size="32"></span></li>
			<li><label for="polis">No. Policy :</label>
			<span class="fieldbox"><input type="text" name="truk_no_ins" value="" size="32"></span></li>
			<li><label for="jtempo">Insurance Expire: </label>
			<span class="fieldbox"><input type="text" name="truk_ins_jtempo" value="" size="32" id="datepicker"></span></li>
			<li><label for="cat">Category (set category):</label>
			<span class="fieldbox"><select name="truk_kat">
                <option value="value" <?php if (!(strcmp("value", $row_trukcat['truk_kategori_name']))) {echo "selected=\"selected\"";} ?>>label</option>
                <?php
				do {  
				?>
                <option value="<?php echo $row_trukcat['truk_kategori_name']?>"<?php if (!(strcmp($row_trukcat['truk_kategori_name'], $row_trukcat['truk_kategori_name']))) {echo "selected=\"selected\"";} ?>><?php echo $row_trukcat['truk_kategori_name']?></option>
                <?php
				} while ($row_trukcat = mysql_fetch_assoc($trukcat));
  				$rows = mysql_num_rows($trukcat);
  				if($rows > 0) {
      			mysql_data_seek($trukcat, 0);
	  			$row_trukcat = mysql_fetch_assoc($trukcat);
  				}
				?>
              </select></span></li>
			  </ul>
			<p><input name="submit" type="submit" id="sendbutton" value="Insert record"></p>
			<p><input type="hidden" name="MM_insert" value="form1"></p>
            </div>			
			</td>
            </tr>
        </table>
        
      </form>

<?php
mysql_free_result($trukcat);
?>
