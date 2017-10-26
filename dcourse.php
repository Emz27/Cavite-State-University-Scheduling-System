<?php

session_start();
	include("weblock.php");
	//include("header.php");
    $id=$_GET['id'];

    $result=mysql_query("DELETE FROM `course` WHERE CID='$id'");
    if($result){
    	echo "<script>
   				 window.alert('Successfully Deleted!');
    			 window.location.href='course.php';
			</script> ";
    }

 ?>