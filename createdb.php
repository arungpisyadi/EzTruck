<link href="format.css" rel="stylesheet" type="text/css" />
<?php
// This Script of PHP were made by arungpisyadi, any violations on terms of usage will be handled in legal way
require('instal/dbconn.php')	
$dbname = "eztruck11" ;

//create the main database
mysql_create_db($dbname) 
	or die(mysql_error());
?>

<html>
<head>

</p>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr class="header">
    <td width="880">Type of work </td>
    <td width="144">Status</td>
  </tr>
</table>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr class="header">
    <td> <?php echo("The Database had been created") ; ?> </td>
  </tr>
</table>	
<?php	mysql_select_db($dbname) ; ?>
<table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr class="header">
    <td><?php echo("Initializing create_table process") ; ?></td>
  </tr>
</table>	
<table width="1024" height="35" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <?php
	$user = "CREATE TABLE user (
    user_id int(3) not null auto_increment,
    user_name varchar(255) not null,
    user_pass varchar(255) not null,
    add_user enum('N', 'Y') not null default 'N',
    edit_user enum('N', 'Y') not null default 'N',
    del_user enum('N', 'Y') not null default 'N',
    add_kary enum('N', 'Y') not null default 'N',
    edit_kary enum('N', 'Y') not null default 'N',
    del_kary enum('N', 'Y') not null default 'N',
    add_truk enum('N', 'Y') not null default 'N',
    edit_truk enum('N', 'Y') not null default 'N',
    del_truk enum('N', 'Y') not null default 'N',
    add_inv enum('N', 'Y') not null default 'N',
    edit_inv enum('N', 'Y') not null default 'N',
    del_inv enum('N', 'Y') not null default 'N',
    add_cust enum('N', 'Y') not null default 'N',
    edit_cust enum('N', 'Y') not null default 'N',
    del_cust enum('N', 'Y') not null default 'N',
    add_buy enum('N', 'Y') not null default 'N',
    edit_buy enum('N', 'Y') not null default 'N',
    del_buy enum('N', 'Y') not null default 'N',
    add_part enum('N', 'Y') not null default 'N',
    edit_part enum('N', 'Y') not null default 'N',
    del_part enum('N', 'Y') not null default 'N',
    add_kont enum('N', 'Y') not null default 'N',
    edit_kont enum('N', 'Y') not null default 'N',
    del_kont enum('N', 'Y') not null default 'N',
    add_sup enum('N', 'Y') not null default 'N',
    edit_sup enum('N', 'Y') not null default 'N',
    del_sup enum('N', 'Y') not null default 'N',
    add_kwit enum('N', 'Y') not null default 'N',
    edit_kwit enum('N', 'Y') not null default 'N',
    del_kwit enum('N', 'Y') not null default 'N',
    add_notes enum('N', 'Y') not null default 'N',
    edit_notes enum('N', 'Y') not null default 'N',
    del_notes enum('N', 'Y') not null default 'N',
    primary key (user_id)
)  ENGINE=MyISAM";
		
		$result = mysql_query($user)
			or die(mysql_error())
	?>
    <td width="70%" class="content">Create table user </td>
	<td width="15%" class="sukses"><div align="center">OK !!!</div></td>
  </tr>
</table>
<table width="1024" height="35" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <?php
	$admin = "INSERT INTO user(user_id,user_name,user_pass,add_user,edit_user,del_user,add_kary,edit_kary,del_kary,add_truk,edit_truk,del_truk,add_inv,edit_inv,del_inv,add_cust,edit_cust,del_cust,add_buy,edit_buy,del_buy,add_part,edit_part,del_part,add_kont,edit_kont,del_kont,add_sup,edit_sup,del_sup,add_kwit,edit_kwit,del_kwit,add_notes,edit_notes,del_notes) VALUES (001,'admin','admin','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y','Y')" ;
	$result = mysql_query($admin)
		or die(mysql_error())
	?>
    <td width="70%" class="content">Create User "Admin" </td>
	<td width="15%" class="sukses"><div align="center">OK !!!</div></td>
  </tr>
</table>
<table width="1024" height="35" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <?php
	$kary = "CREATE  TABLE `eztruck`.`karyawan` (

  `kary_id` INT NOT NULL AUTO_INCREMENT ,

  `kary_nama_1` VARCHAR(45) NOT NULL ,

  `kary_nama_2` VARCHAR(45) NOT NULL ,

  `kary_alamat_1` VARCHAR(45) NULL ,

  `kary_alamat_2` VARCHAR(45) NULL ,

  `kary_tgl_lahir` DATE NOT NULL ,

  `kary_no_ktp` VARCHAR(45) NOT NULL ,

  `kary_ktp_aktif` DATE NOT NULL ,

  `kary_no_sim` VARCHAR(45) NOT NULL ,

  `kary_jenis_sim` VARCHAR(45) NOT NULL ,

  `kary_sim_aktif` DATE NOT NULL ,

  `kary_telp` VARCHAR(45) NOT NULL ,

  `kary_hp` VARCHAR(45) NOT NULL ,

  PRIMARY KEY (`kary_id`) )

ENGINE = MyISAM

COMMENT = 'data karyawan';";
		
		$result = mysql_query($kary)
			or die(mysql_error())
	?>
    <td width="70%" class="content">Create table employee </td>
	<td width="15%" class="sukses"><div align="center">OK !!!</div></td>
  </tr>
</table>

<table width="1024" height="35" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <?php
	$cust = "CREATE  TABLE `eztruck`.`customer` (

  `cust_id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,

  `cust_name` VARCHAR(255) NOT NULL ,

  `cust_init` VARCHAR(45) NOT NULL ,

  `cust_cp` VARCHAR(45) NOT NULL ,

  `cust_add_1` VARCHAR(45) NOT NULL ,

  `cust_add_2` VARCHAR(45) NULL ,

  `cust_telp_1` VARCHAR(45) NOT NULL ,

  `cust_telp_2` VARCHAR(45) NULL ,

  `cust_email` VARCHAR(45) NULL ,

  PRIMARY KEY (`cust_id`) )

ENGINE = MyISAM;";
		
		$result = mysql_query($cust)
			or die(mysql_error())
	?>
    <td width="70%" class="content">Create table customer </td>
	<td width="15%" class="sukses"><div align="center">OK !!!</div></td>
  </tr>
</table>
<p>&nbsp;</p>

