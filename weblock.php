<?php
	$id=$_SESSION['id'];
	include("connect.php");
	$row=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UID='$id'"));
	$id=$row['UID'];
	if($id==""){
		header("location:logout.php");
	}


?>