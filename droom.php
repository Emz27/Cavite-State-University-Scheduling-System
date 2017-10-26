<?php

session_start();
	include("weblock.php");
	//include("header.php");
    $id=$_GET['id'];

    $result=mysql_query("DELETE FROM `room` WHERE ROOM_ID='$id'");
    if($result){
    	echo "<script>
   				 window.alert('Successfully Deleted!');
    			 window.location.href='room.php';
			</script> ";
    }

 ?>