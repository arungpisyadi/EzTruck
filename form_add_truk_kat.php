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
  $insertSQL = sprintf("INSERT INTO truk_kategori (truk_kategori_name, truk_kategori_desc) VALUES (%s, %s)",
                       GetSQLValueString($_POST['truk_kategori_name'], "text"),
                       GetSQLValueString($_POST['truk_kategori_desc'], "text"));

  mysql_select_db($database_myconn, $myconn);
  $Result1 = mysql_query($insertSQL, $myconn) or die(mysql_error());

  $insertGoTo = "view_truk_kat.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

session_start() ;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="css/form/style.css" rel="stylesheet" type="text/css" />
<div align="center">
      <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <p class="titletbl">&nbsp;</p>
        <p class="titletbl">&nbsp;</p>
        <p class="titletbl">&nbsp;</p>
        <h1 class="titletbl">&nbsp;</h1>
        <table align="center">
        <tr>
		<td>
		<div id="wrap">
			<div id="header">
				<h1>ADD NEW CATEGORY</h1>
		      <h4>Here you can add new category for your truck, by any descriptions you would like to. </h4>
			</div>
		<ul id="contactform">
		<li>
		<label for="name">Category Name:</label>
 		<span class="fieldbox">
 		<input name="truk_kategori_name" type="text" value="" size="32"></span></li>
		<li>
        <label for="desc">Category Description:</label>
		<span class="msgbox">
		<textarea name="truk_kategori_desc" cols="32" rows="4">
		</textarea></span></li>
		</ul>
		<p></p>
        <input type="submit" class="submitinput" value="Add Category" id="sendbutton">
		
		</div>
		  </td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
      </form>
      <p>&nbsp;</p>
	</div>
</body>
</html>
