<?php
	if (isset($_GET['id'])){
		include("connect.php");
		$result = mysql_query("DELETE FROM department WHERE DID = '".$_GET['id']."'");
		$result2 = mysql_query("UPDATE subjecttype SET DEPARTMENT = 0 WHERE DEPARTMENT = '".$_GET['id']."'");
		if ($result){
			header("location:department.php");
		}
	}

?>