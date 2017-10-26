<?php

	if (isset($_REQUEST['subtype'])){
		 $subtype = $_REQUEST['subtype'];
		 $result = mysql_query("SELECT * FROM subject WHERE SUBTYPE = '$subtype'");
		 $arrays = array();
		 while($row = mysql_fetch_array($result)){
		 	array_push($arrays, $row['SUBJECT_CODE']);
		 }

		echo json_encode($arrays);	
		//echo $_REQUEST['subtype']; 	
	}

?>