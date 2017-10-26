<?php 
	include("connect.php");
	for($i = 7; $i<11; $i++){
		for ($j = 1; $j<37; $j++){
			mysql_query("INSERT INTO roommanager(ROOM,DT_ID) VALUES('$i','$j')");
		}
	}
?>