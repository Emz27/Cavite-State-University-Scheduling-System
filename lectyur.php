<?php
include("connect.php");
session_start();
if(isset($_REQUEST['lecturer'])){
	$lecturers = array();
	if (isset($day))
		$day2 = $_REQUEST['lecturer'];
	$day = $_REQUEST['lecturer'];

	if($_SESSION['days']==1){
		$lectselect = mysql_query("SELECT * FROM availability WHERE DAYS = '$day'");
		while ($lectrow = mysql_fetch_array($lectselect)){
			if($start>=$lectrow['START_TIME'] && $end<=$lectrow['END_TIME']){
				$result = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = ".$lectrow['LECTURER'].""));
				array_push($lecturers, $result['LECTURER_ID']);
			}
		}	

	if($_SESSION['days']==2){
		$lectselect = mysql_query("SELECT * FROM availability WHERE DAYS = '$day'");
		while ($lectrow = mysql_fetch_array($lectselect)){
			if($start>=$lectrow['START_TIME'] && $end<=$lectrow['END_TIME']){
				$result = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = ".$lectrow['LECTURER'].""));
				array_push($lecturers, $result['LECTURER_ID']);
			}
		}
		if (isset($day2)){
			$finallect = array();
			for($i = 0; $i < $lecturers.count - 1; $i++){

				$lectselect2 = mysql_fetch_array(mysql_query("SELECT * FROM availability WHERE DAYS = '$day' AND LECTURER = '".$lecturer[$i]."'"));
				if ($lectselect2)
					array_push($finallect, $lectselect2['LECTURER']);
			}
		}

	}

	return $lecturers;
	if (isset($day2)) return $finallect;
 }


?>