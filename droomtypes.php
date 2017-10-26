<?php

session_start();
	include("weblock.php");
	//include("header.php");
    $id=$_GET['id'];

    $result=mysql_query("DELETE FROM `roomtype` WHERE ROOMTYPENO='$id'");
    if($result){
    	echo "<script>
   				 window.alert('Successfully Deleted!');
    			 window.location.href='roomtypes.php';
			</script> ";
    }

 ?>