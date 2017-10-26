<?php
session_start();
include("connect.php");
if( isset($_REQUEST["subject"] )) {
	$unit = $_REQUEST['subject'];
	//echo $unit;
	$result = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SUBJECT_CODE = '$unit'"));
	$_SESSION['units'] = $result['TOTAL_UNITS'];
	echo $result['TOTAL_UNITS'];
}
else if( isset($_REQUEST["days"]) ) {
	$days = $_REQUEST['days'];
	$_SESSION['days'] = $days;
	echo $days;
}



else if ( isset($_REQUEST["time"]) ) {
	$start = $_REQUEST["time"];
	$_SESSION['start'] = $start;
	$days = $_SESSION["days"];
	$units = $_SESSION["units"];
	$start = (int)$start;
	$days = (int)$days;
	$units = (int)$units;
	$end = $start+(($units/$days)*200);
	$_SESSION['end'] = $end;
	//look for available lecturers
	echo $end;
}


//echo $_SESSION['units']."=".$_SESSION['days']."=".$end;
?>