<?php

session_start();
	include("weblock.php");
	//include("header.php");
    $id=$_GET['id'];

    $result=mysql_query("DELETE FROM `year` WHERE YEAR_ID='$id'");
    if($result){
    	echo "<script>
   				 window.alert('Successfully Deleted!');
    			 window.location.href='year.php';
			</script> ";
    }

 ?>