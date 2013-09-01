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

  $insertGoTo = "viewtrukkat.php";
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
<link href="css/form/form.css" rel="stylesheet" type="text/css" />


	<div align="center">
      <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
        <p class="titletbl">add new category </p>
        <table align="center">
          <tr valign="baseline">
            <td width="171" align="right" nowrap class="login"><div align="left">Category Name:</div></td>
            <td width="307"><input type="text" name="truk_kategori_name" value="" size="32"></td>
          </tr>
          <tr valign="baseline">
            <td align="right" nowrap class="login">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr valign="baseline">
            <td align="right" valign="middle" nowrap class="login"><div align="left">Category Description:</div></td>
            <td valign="top"><textarea name="truk_kategori_desc" cols="32" rows="4"></textarea></td>
          </tr>
          <tr valign="baseline">
            <td height="51" align="right" nowrap class="login"><div align="left"></div></td>
            <td><p>&nbsp;
              </p>
              <p>
                <input type="submit" value="Add Category">
                </p></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
      </form>
      <p>&nbsp;</p>
	</div>
</body>
</html>
