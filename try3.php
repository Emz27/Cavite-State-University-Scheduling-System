<?php
include("connect.php");
$min=array("00","30");
for($i=8;$i<21;$i++){
    foreach ($min as $v){
       $m = $i.':'.$v;
       if ($v==30)$v = '00';
       else $v='30';
    	$n = $i.':'.$v;
    	echo "<option value='$i:$v'>$m:$n</option>";
    	for ($l=1; $l < 7; $l++){
             $result = mysql_query("INSERT INTO daytimemanager(DAY, START_TIME, END_TIME) VALUES('$l','".$m."','".$n."')");
        }
    }
}
?>