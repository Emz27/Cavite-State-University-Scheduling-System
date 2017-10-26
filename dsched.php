<?php
	session_start();
	include("weblock.php");
	$id=$_GET['id'];
	$result=mysql_query("DELETE FROM schedule WHERE SCHED_CODE='$id'");
	if($result){
		echo "<script>
   				 window.alert('Successfully Deleted!');
    			 window.location.href='schedule.php';
			</script> ";
	}





?>