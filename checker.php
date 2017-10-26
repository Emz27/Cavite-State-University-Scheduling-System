<?php 
	function checkSection($day,$starttime,$endtime){
	    $classhours = mysql_query("SELECT * FROM schedule 
								WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
								AND YEAR = '".$_SESSION['year']."' 
								AND TERM = '".$_SESSION['term']."' 
								AND COURSE = '".$_SESSION['course']."' 
								AND SECTION = '".$_SESSION['section']."'
								AND DAYS = '$day'
								ORDER BY START_TIME DESC");
		}
		if (mysql_num_rows($classhours)>0) {
			while($sectioncheck = mysql_fetch_array($classhours)){
				$start = date("H:i", strtotime($sectioncheck['START_TIME']));
				$end = date("H:i", strtotime($sectioncheck['END_TIME']));
				$starttime = date("H:i", strtotime($starttime));
				$endtime = date("H:i", strtotime($endtime));

				if ($starttime>=$start&&$starttime<$end) {
					$hitclass = 1;
				}
				else if ($endtime<=$end&&$endtime>$start) {
					$hitclass = 1;
				}
			}
		}
	}
	function checkRoom($day,$starttime,$endtime){
	    $roomhours = mysql_query("SELECT * FROM schedule 
								WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
								AND TERM = '".$_SESSION['term']."' 
								AND DAYS = '$day'
								ORDER BY START_TIME DESC");
		}
		if (mysql_num_rows($roomhours)>0) {
			while($roomcheck = mysql_fetch_array($roomhours)){
				$start = date("H:i", strtotime($roomcheck['START_TIME']));
				$end = date("H:i", strtotime($roomcheck['END_TIME']));
				$starttime = date("H:i", strtotime($starttime));
				$endtime = date("H:i", strtotime($endtime));

				if ($starttime>=$start&&$starttime<$end) {
					$hitroom = 1;
				}
				else if ($endtime<=$end&&$endtime>$start) {
					$hitroom = 1;
				}
			}
		}
	}
?>