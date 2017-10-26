<?php
	session_start();
	include("weblock.php");
	include("header.php");
    $id=$_GET['id'];

    $result=mysql_query("DELETE FROM lecturer WHERE LECTURER_ID='$id'");
    if($result){
        $results=mysql_query("DELETE FROM availability WHERE LECTURER='$id'");
        $results2 = mysql_query("DELETE FROM lectmanager WHERE LECTURER = '$id'");
        if($results){
            echo "<script>
                 window.alert('Successfully Deleted!');
                 window.location.href='lecturer.php';
            </script> ";
        }
    }
   


?>
