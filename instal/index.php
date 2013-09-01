<link href="../format.css" rel="stylesheet" type="text/css" />

    <?php
	// This Script of PHP were made by arungpisyadi, any violations on terms of usage will be handled in legal way
	require('dbconn.php');
    // Name of the file
    $filename = 'eztruck.sql';
    // MySQL host
    $mysql_host = $host;
    // MySQL username
    $mysql_username = $user;
    // MySQL password
    $mysql_password = $pass;
    // Database name
    $mysql_database = "eztruck11";
    //////////////////////////////////////////////////////////////////////////////////////////////
    // Connect to MySQL server
    mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
    // Select database
    mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());
    // Temporary variable, used to store current query
    $templine = '';
    // Read in entire file
    $lines = file($filename);
    // Loop through each line
    foreach ($lines as $line_num => $line) {
    // Only continue if it's not a comment
    if (substr($line, 0, 2) != '--' && $line != '') {
    // Add this line to the current segment
    $templine .= $line;
    // If it has a semicolon at the end, it's the end of the query
    if (substr(trim($line), -1, 1) == ';') {
    // Perform the query
    mysql_query($templine) 
	or print('Error performing query \'<b>' . $templine . '</b>\': ' . mysql_error() . '');
    // Reset temp variable to empty
    $templine = '';
    }
    }
    }	
    ?>
	<p class="sukses">Instalation Sukcess !!!</p>
	<p class="user"><a href="../index.php" target="_self">Please click here to continue</a> </p>


