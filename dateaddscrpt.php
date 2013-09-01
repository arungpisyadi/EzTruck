<?php
	  $date = date("Y-m-d");
	  echo $date ;
	  echo "<br/>30 hari kemudian adalah <br/>" ;
	  $day = 30 ;
	  $date_add = strtotime(date("Y-m-d", strtotime($date)) . " + " . $day . "days");;
	  echo date("Y-m-d",$date_add);
	  
	  ?>
	  