<?php require_once('Connections/myconn.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO customer (cust_id, cust_name, cust_init, cust_cp, cust_add_1, cust_add_2, cust_telp_1, cust_telp_2, cust_email) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cust_id'], "int"),
                       GetSQLValueString($_POST['cust_name'], "text"),
                       GetSQLValueString($_POST['cust_init'], "text"),
                       GetSQLValueString($_POST['cust_cp'], "text"),
                       GetSQLValueString($_POST['cust_add_1'], "text"),
                       GetSQLValueString($_POST['cust_add_2'], "text"),
                       GetSQLValueString($_POST['cust_telp_1'], "text"),
                       GetSQLValueString($_POST['cust_telp_2'], "text"),
                       GetSQLValueString($_POST['cust_email'], "text"));

  mysql_select_db($database_myconn, $myconn);
  $Result1 = mysql_query($insertSQL, $myconn) or die(mysql_error());

  $insertGoTo = "view_cust.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_myconn, $myconn);
$query_customer = "SELECT * FROM customer ORDER BY cust_id ASC";
$customer = mysql_query($query_customer, $myconn) or die(mysql_error());
$row_customer = mysql_fetch_assoc($customer);
$totalRows_customer = mysql_num_rows($customer);

?>
<link rel="stylesheet" href="ui/development-bundle/themes/base/jquery.ui.all.css" />
	<script src="ui/development-bundle/jquery-1.7.2.js"></script>
	<script src="ui/development-bundle/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.mouse.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.button.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.draggable.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.position.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.resizable.js"></script>
	<script src="ui/development-bundle/ui/jquery.ui.dialog.js"></script>
	<script src="ui/development-bundle/ui/jquery.effects.core.js"></script>
	<link rel="stylesheet" href="ui/development-bundle/demos/demos.css" />
	<style>
		body { font-size: 75%; }
		label, input { display:block; }
		input.text { margin-bottom:12px; width:95%; padding: .4em; }
		fieldset { padding:0; border:0; margin-top:25px; }
		h1 { font-size: 1.2em; margin: .6em 0; }
		div#users-contain {
	width: 1200px;
	margin-top: 0px;
	margin-right: 50px;
	margin-bottom: 0px;
	margin-left: 50px;
}
		div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
		div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
		.ui-dialog .ui-state-error { padding: .3em; }
		.validateTips { border: 1px solid transparent; padding: 0.3em; }
	</style>
    <script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
						
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 400,
			width: 450,
			modal: true,
			
		});

		$( "#create-user" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>
<div class="demo">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p></p>
<div class="demo">
<div id="dialog-form" title="Add new customer">
	<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
      <input name="cust_id" type="hidden" value=""/>

      <label for="init">Intial:</label>
	  <select name="cust_init" class="text ui-widget-content ui-corner-all">
            <option value="Mr." <?php if (!(strcmp("Mr.", ""))) {echo "SELECTED";} ?>>Mr.</option>
    		<option value="Mrs." <?php if (!(strcmp("Mrs.", ""))) {echo "SELECTED";} ?>>Mrs.</option>
            <option value="PT." <?php if (!(strcmp("PT.", ""))) {echo "SELECTED";} ?>>PT.</option>
            <option value="CV." <?php if (!(strcmp("CV.", ""))) {echo "SELECTED";} ?>>CV.</option>
            <option value="UD." <?php if (!(strcmp("UD.", ""))) {echo "SELECTED";} ?>>UD.</option>
      </select>
      <label for="cname">Name:</label>
      <input type="text" name="cust_name" value="" size="32" class="text ui-widget-content ui-corner-all" />
      <label for="cp">Contact person:</label>
      <input type="text" name="cust_cp" value="" size="32" class="text ui-widget-content ui-corner-all" />
      <label for="addr1">Address line 1:</label>
      <textarea name="cust_add_1" cols="32" rows="2" class="text ui-widget-content ui-corner-all"></textarea>
      <label for="addr2">Address line 2:</label>
      <textarea name="cust_add_2" cols="32" rows="2" class="text ui-widget-content ui-corner-all"></textarea>
      <label for="phn1">Telephone:</label>
      <input type="text" name="cust_telp_1" value="" size="32" class="text ui-widget-content ui-corner-all" />
      <label for="phn2">Faximile:</label>
      <input type="text" name="cust_telp_2" value="" size="32" class="text ui-widget-content ui-corner-all" />
      <label for="email">Email:</label>
      <input type="text" name="cust_email" value="" size="32" class="text ui-widget-content ui-corner-all" />
      <input type="submit" class="ui-button" value="Add new customer" />
      <input type="hidden" name="MM_insert" value="form1" />
    </form>
    <p>&nbsp;</p>
</div>

<div id="users-contain" class="ui-widget" align="center">
  <h1>Existing Customers</h1><button id="create-user">Add new customer</button>
  <table border="1" align="center">
  <thead>
    <tr class="ui-widget-header ">
      <th>Customer's Name</th>
      <th>Contact Person</th>
      <th>Address</th>
      <th>Telephone and Faximile</th>
      <th>Email address</th>
    </tr>
    </thead>
      <?php do { ?>
      <tbody>
      <tr>
        <td><?php echo $row_customer['cust_init']; ?> <?php echo $row_customer['cust_name']; ?></td>
        <td><?php echo $row_customer['cust_cp']; ?></td>
        <td><?php echo $row_customer['cust_add_1']; ?><br />
          <?php echo $row_customer['cust_add_2']; ?></td>
        <td><?php echo $row_customer['cust_telp_1']; ?><br />
          <?php echo $row_customer['cust_telp_2']; ?></td>
        <td><?php echo $row_customer['cust_email']; ?></td>
      </tr>
      </tbody>
      <?php } while ($row_customer = mysql_fetch_assoc($customer)); ?>
  </table>
</div>
</div>
<?php
mysql_free_result($customer);

?>
