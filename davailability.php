<?php

session_start();
	include("weblock.php");
	//include("header.php");
    $id=$_GET['id'];
    $lecid=$_GET['lecid'];

    $result=mysql_query("DELETE FROM `availability` WHERE AVAIL_ID='$id'");
    if($result){
    	echo "<script>
   				 window.alert('Successfully Deleted!');
    			 window.location.href='ulecturer.php?id=$lecid';
			</script> ";
    }

 ?>