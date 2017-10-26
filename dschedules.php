<?php
include("connect.php");
	if (isset($_GET['id'])){
		$result = mysql_query("DELETE FROM schedule WHERE SCHED_ID = '".$_GET['id']."'");
		if ($result){
			echo "<script type = \"text/javascript\">window.alert(\"Schedule Deleted Successfully\");</script>";
			header("location:schedule.php");
		}
	}
?>