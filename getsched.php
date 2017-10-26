<style type="text/css">
	.center{
		text-align: center;
	}
	table{
		/*border: 1px solid black;*/
		margin: 0 auto;

		border-collapse: collapse;
	}
	#sched_data{
		
		border-right:1px solid black;
		width: 90px;
		height:30px;
		font-size: 10px;
		text-align:center;
		font-weight: bold;
	}
	#sched_time{
		font-size: 10px;
		border-right:1px solid black;
		border-bottom:1px solid black;
		width:150px;
		height:30px;
		text-align:center;
	}
	#sched_heading{
		
		border-right:1px solid black;
		border-bottom:1px solid black;
		width:90px;
		height:25px;
		text-align:center;
		font-size:12px;
	}
	#sched_table{
	
		border:1px solid black;
		border-collapse: collapse;
		margin:auto;

	}
	#container{
		width:706px;
		margin:auto;
	}
	#sched_data2{
		border-left:1px solid black;
		border-top:1px solid black;
		width: 115.5px;
		height:20px;
		font-size: 10px;
		text-align:center;
	}
	#signature_data{
		height:100px;
		width:240px;
		font-size:10px;
	}
	#signature_name{
		font-size: 12px;
		font-weight: bold;
	}
	#signature_label{
		font-style: italic;
	}
</style>
<?php 


$time = array( 
		array("",""),
		array("7:00 am","07:00"),
		array("7:30 am","07:30"),
		array("8:00 am","08:00"),
		array("8:30 am","08:30"),
		array("9:00 am","09:00"),
		array("9:30 am","09:30"),
		array("10:00 am","10:00"),
		array("10:30 am","10:30"),
		array("11:00 am","11:00"),
		array("11:30 am","11:30"),
		array("12:00 pm","12:00"),
		array("12:30 pm","12:30"),
		array("1:00 pm","13:00"),
		array("1:30 pm","13:30"),
		array("2:00 pm","14:00"),
		array("2:30 pm","14:30"),
		array("3:00 pm","15:00"),
		array("3:30 pm","15:30"),
		array("4:00 pm","16:00"),
		array("4:30 pm","16:30"),
		array("5:00 pm","17:00"),
		array("5:30 pm","17:30"),
		array("6:00 pm","18:00")
	);

$rowCounter = array(0,0,0,0,0,0,0);
 
	$days = array('TIME','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');




if(isset($_GET['schedprof']) && $_GET['schedprof'] == "getsched") { 
   prof($_GET['prof']); 
}

function get_time_difference($time1, $time2) 
{ 
    $time1 = strtotime("1/1/1980 $time1"); 
    $time2 = strtotime("1/1/1980 $time2"); 
     
    if ($time2 < $time1) 
    { 
        $time2 = $time2 + 86400; 
    } 
     
    return ($time2 - $time1) * 2 / 3600; 
} 

function prof($drop_var)
{  session_start();
    include_once('connect.php');
    $query = mysql_query("SELECT * FROM schedule 
	                        							WHERE SCHOOL_YEAR = '".$_GET['year']."' 
	                        							AND TERM = '".$_GET['term']."' 
	                        							AND LECTURER = '".$_GET['prof']."'");
    if(mysql_num_rows($query)==0){
    	echo'</br></br></br></br></br></br></br></br></br>
    	<div style="text-align:center;color:red;"><b>Record Not Found</b></div>
    	</br></br></br>';

    	return 0;
    }
    
    $days = array('TIME','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
    echo'<br/><table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style = "width:110%;">';
	    echo'<thead><tr>';
	    for ($i=0; $i < 7; $i++) { 
	    	
		    	echo'<th>'.$days[$i].'</th>';
		    }
		    echo '</tr></thead><tbody>';
		    		$min=array("00","30");
		    		for($j=7;$j<18;$j++){
	                    foreach ($min as $v){
	                    	$start = $j.':'.$v;	
	                    	if($v==30){
	                    		$mins = '00';
	                    		$hours = $j+1;
	                    	}
	                    	else{
	                    		$mins = '30';
	                    		$hours = $j;
	                    	}
	                    	$end = $hours.":".$mins;
	                        $timestart = date("h:i A", strtotime($start));
	                        $timeend = date("h:i A", strtotime($end)); 
	                        	echo '<tr><td>'.$timestart.' - '.$timeend.'</td>';	
	                        for ($k=1; $k < 7; $k++) { 
	                        	$result = mysql_query("SELECT * FROM schedule 
	                        							WHERE SCHOOL_YEAR = '".$_GET['year']."' 
	                        							AND TERM = '".$_GET['term']."' 
	                        							AND DAYS = '".$k."' 
	                        							AND LECTURER = '".$_GET['prof']."'");
	                        	if(mysql_num_rows($result)>0){
		    						while ($timedifference = mysql_fetch_array($result)) {
		    							$starts = date("H:i", strtotime($timestart));
		    							$ends = date("H:i", strtotime($timeend));
	    								$starttime = date("H:i", strtotime($timedifference['START_TIME']));
	    								$endtime = date("H:i", strtotime($timedifference['END_TIME']));
	    									if($starttime==$starts){
	    										$course = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE CID = '".$timedifference['COURSE']."'"));
	    										$section = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE SECTION_ID = '".$timedifference['SECTION']."'"));
	    										$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$timedifference['SUBJECT']."'"));
	    										$room = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$timedifference['ROOM']."'"));
	    										if ($timedifference['CLASS']==1)
	    											$class = '(lecture)';
	    										else
	    											$class = '(laboratory)';
	    										echo'<td style = "background-color:green; color:white;">'.$course['COURSE_CODE'].'-'.$timedifference['YEAR'].$section['SECTION'].'<br/>'.$subject['SUBJECT'].'<br/>'.$room['ROOM'].'<br/>'.$class.'</td>';
	    									 	$listed = 1;
	    									}
	    									else if ($starttime<=$starts&&$endtime>=$ends){
	    										echo'<td style = "background-color:green; color:white;"></td>';	 
	    										$listed = 1;   									 		    							
	    									}
	    							}

	    							if (!isset($listed)) 
    									echo'<td></td>';
    								else unset($listed);
	    						}
    							else{
    									echo'<td></td>';
    							}
	    						
	    					}
	                    }
	                }
	    	echo'</tr></tbody>';
	echo'</table><br/>';
	
	 echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
     <thead>
	    <tr>
	        <th>SUBJECT CODE</th>
	        <th>SUBJECT</th>
	        <th>COURSE YEAR&SECTION</th>
	        <th>DAY</th>
	        <th>TIME</th>
	        <th>ROOM</th>
	    </tr>
    </thead>
    <tbody>
    ';
$subresult=mysql_query("SELECT * FROM schedule 
						WHERE TERM = '".$_GET['term']."' 
						AND LECTURER = '".$_GET['prof']."' 
						AND SCHOOL_YEAR = '".$_GET['year']."' 
						ORDER BY SCHOOL_YEAR DESC ");            
               
            while($subrow=mysql_fetch_array($subresult)){
                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
                $subjectcode = $subjresult['SUBJECT_CODE'];
                $subject = $subjresult['SUBJECT'];
                
                //$sectman = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE CM_ID = '".$subrow['CM_ID']."'"));
                //$yearresult = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '".$sectman['YEAR']."'"));
               // $year = $sectman['YEAR'];
                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$subrow['COURSE']."'"));
                $course = $couresult['COURSE_CODE'];
                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$subrow['SECTION']."'"));
                $section = $secresult['SECTION']; 
                //$dtresult = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = '".$sectman['DT_ID']."'"));
                $days = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$subrow['DAYS']."'"));
                $day = $days['DAY_CODE'];
                $start = date("h:i A", strtotime($subrow['START_TIME']));  
                $end = date("h:i A", strtotime($subrow['END_TIME']));         

                $termresult = mysql_fetch_array(mysql_query("SELECT TERM FROM term WHERE TERM_CODE = '".$subrow['TERM']."'"));
                $term = $termresult['TERM'];

                //$rooms = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOMMAN_ID = '".$subrow['RM_ID']."'"));
                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$subrow['ROOM']."'"));
                $room = $roomresult['ROOM'];       

                $syresult = mysql_fetch_array(mysql_query("SELECT SY FROM schoolyear WHERE SY_ID = '".$subrow['SCHOOL_YEAR']."'"));
                $sy = $syresult['SY'];

                //$lects = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE LM_ID = '".$subrow['LM_ID']."'"));
                $lectresult = mysql_fetch_array(mysql_query("SELECT LASTNAME FROM lecturer WHERE LECTURER_ID = '".$subrow['LECTURER']."'"));
                $lect = $lectresult['LASTNAME']; 
                $year = $subrow['YEAR'];   
        
        echo'<td>'.$subjectcode.'</td>
        <td>'.$subject.'</td>
        <td>'.$course."-".$year.$section.'</td>
        <td>'.$day.'</td>
        <td>'.$start."-".$end.'</td>
        <td>'.$room.'</td></tr>';
    }
        echo'</tbody>
    </table><a target="_blank" href="printsectionL.php?sy='.$sy.'&term='.$term.'&lect='.$_GET['prof'].'" class="btn btn-primary">Print</a>';
}

if(isset($_GET['getroom']) && $_GET['getroom'] == "getroom") { 
   room($_GET['rooms']); 
}

function room($drop_var)
{  session_start();
    include_once('connect.php');

	$query = mysql_query("SELECT * FROM schedule 
	                        		WHERE SCHOOL_YEAR = '".$_GET['year']."' 
	                        		AND TERM = '".$_GET['term']."' 
	                        		AND ROOM = '".$_GET['rooms']."'");
    if(mysql_num_rows($query)==0){
    	echo'</br></br></br></br></br></br></br></br></br>
    	<div style="text-align:center;color:red;"><b>Record Not Found</b></div>
    	</br></br></br>';

    	return 0;
    }
    $days = array('TIME','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
    echo'<br/><table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style = "width:110%;">';
	    echo'<thead><tr>';
	    for ($i=0; $i < 7; $i++) { 
	    	
		    	echo'<th>'.$days[$i].'</th>';
		    }
		    echo '</tr></thead><tbody>';
		    		$min=array("00","30");
		    		for($j=7;$j<18;$j++){
	                    foreach ($min as $v){
	                    	$start = $j.':'.$v;	
	                    	if($v==30){
	                    		$mins = '00';
	                    		$hours = $j+1;
	                    	}
	                    	else{
	                    		$mins = '30';
	                    		$hours = $j;
	                    	}
	                    	$end = $hours.":".$mins;
	                        $timestart = date("h:i A", strtotime($start));
	                        $timeend = date("h:i A", strtotime($end)); 
	                        	echo '<tr><td>'.$timestart.' - '.$timeend.'</td>';	
	                        for ($k=1; $k < 7; $k++) { 
	                        	$result = mysql_query("SELECT * FROM schedule 
	                        							WHERE SCHOOL_YEAR = '".$_GET['year']."' 
	                        							AND TERM = '".$_GET['term']."' 
	                        							AND DAYS = '".$k."' 
	                        							AND ROOM = '".$_GET['rooms']."'");
	                        	if(mysql_num_rows($result)>0){
		    						while ($timedifference = mysql_fetch_array($result)) {
		    							$starts = date("H:i", strtotime($timestart));
		    							$ends = date("H:i", strtotime($timeend));
	    								$starttime = date("H:i", strtotime($timedifference['START_TIME']));
	    								$endtime = date("H:i", strtotime($timedifference['END_TIME']));
	    									if($starttime==$starts){
	    										$course = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE CID = '".$timedifference['COURSE']."'"));
	    										$section = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE SECTION_ID = '".$timedifference['SECTION']."'"));
	    										$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$timedifference['SUBJECT']."'"));
	    										$lecturer = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$timedifference['LECTURER']."'"));
	    										if ($timedifference['CLASS']==1)
	    											$class = '(lecture)';
	    										else
	    											$class = '(laboratory)';
	    										echo'<td style = "background-color:green; color:white;">'.$course['COURSE_CODE'].'-'.$timedifference['YEAR'].$section['SECTION'].'<br/>'.$subject['SUBJECT'].'<br/>'.$lecturer['LASTNAME'].' , '.$lecturer['FIRSTNAME'].' '.$lecturer['MIDDLENAME'].'<br/></td>';
	    									 	$listed = 1;
	    									}
	    									else if ($starttime<=$starts&&$endtime>=$ends){
	    										echo'<td style = "background-color:green; color:white;"></td>';	 
	    										$listed =1;   									 		    							
	    									}
	    							}

	    							if (!isset($listed)) 
    									echo'<td></td>';
    								else unset($listed);
	    						}
    							else{
    									echo'<td></td>';
    							}
	    						
	    					}
	                    }
	                }
	    	echo'</tr></tbody>';
	echo'</table><br/>';
	
	 echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
     <thead>
	    <tr>
	        <th>SUBJECT CODE</th>
	        <th>SUBJECT</th>
	        <th>COURSE YEAR&SECTION</th>
	        <th>DAY</th>
	        <th>TIME</th>
	        <th>LECTURER</th>
	    </tr>
    </thead>
    <tbody>
    ';
$subresult=mysql_query("SELECT * FROM schedule 
						WHERE TERM = '".$_GET['term']."' 
						AND ROOM = '".$_GET['rooms']."' 
						AND SCHOOL_YEAR = '".$_GET['year']."'
						 ORDER BY SCHOOL_YEAR DESC, DAYS ASC, START_TIME ASC");            
               
            while($subrow=mysql_fetch_array($subresult)){
                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
                $subjectcode = $subjresult['SUBJECT_CODE'];
                $subject = $subjresult['SUBJECT'];
                
                //$sectman = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE CM_ID = '".$subrow['CM_ID']."'"));
                //$yearresult = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '".$sectman['YEAR']."'"));
               // $year = $sectman['YEAR'];
                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$subrow['COURSE']."'"));
                $course = $couresult['COURSE_CODE'];
                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$subrow['SECTION']."'"));
                $section = $secresult['SECTION']; 
                //$dtresult = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = '".$sectman['DT_ID']."'"));
                $days = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$subrow['DAYS']."'"));
                $day = $days['DAY_CODE'];
                $start = date("h:i A", strtotime($subrow['START_TIME']));  
                $end = date("h:i A", strtotime($subrow['END_TIME']));         

                $termresult = mysql_fetch_array(mysql_query("SELECT TERM FROM term WHERE TERM_CODE = '".$subrow['TERM']."'"));
                $term = $termresult['TERM'];

                //$rooms = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOMMAN_ID = '".$subrow['RM_ID']."'"));
                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$subrow['ROOM']."'"));
                $room = $roomresult['ROOM'];       

                $syresult = mysql_fetch_array(mysql_query("SELECT SY FROM schoolyear WHERE SY_ID = '".$subrow['SCHOOL_YEAR']."'"));
                $sy = $syresult['SY'];

                //$lects = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE LM_ID = '".$subrow['LM_ID']."'"));
                $lectresult = mysql_fetch_array(mysql_query("SELECT LASTNAME FROM lecturer WHERE LECTURER_ID = '".$subrow['LECTURER']."'"));
                $lect = $lectresult['LASTNAME']; 
                $year = $subrow['YEAR'];   
        
        echo'<td>'.$subjectcode.'</td>
        <td>'.$subject.'</td>
        <td>'.$course."-".$year.$section.'</td>
        <td>'.$day.'</td>
        <td>'.$start."-".$end.'</td>
        <td>'.$lect.'</td></tr>';
    }

        echo'</tbody>
    </table><a target="_blank" href="printsectionR.php?sy='.$sy.'&term='.$term.'&room='.$_GET['rooms'].'" class="btn btn-primary">Print</a>';

}


if(isset($_GET['getclass']) && $_GET['getclass'] == "getclass") { 
   sect($_GET['section']); 
}

function sect($drop_var)
{  session_start();
    include_once('connect.php');


	$courseyearsect = explode('-', $_GET['section']);
	$course = $courseyearsect[0];
	$year = $courseyearsect[1];
	$section = $courseyearsect[2];

	$query = mysql_query("SELECT * FROM schedule WHERE 
    	SCHOOL_YEAR = '".$_GET['year']."' AND 
    	TERM = '".$_GET['term']."' AND 
    	COURSE = '".$courseyearsect[0]."' AND 
    	YEAR= '".$year."'  AND 
    	SECTION = '".$section."'");
	
    if(mysql_num_rows($query)==0){
    	echo'</br></br></br></br></br></br></br></br></br>
    	<div style="text-align:center;color:red;"><b>Record Not Found</b></div>
    	</br></br></br>';

    	return 0;
    }

    $query = mysql_query("SELECT * FROM schedule WHERE 
    	SCHOOL_YEAR = '".$_GET['year']."' AND 
    	TERM = '".$_GET['term']."' AND 
    	COURSE = '".$courseyearsect[0]."' AND 
    	YEAR= '".$year."'  AND 
    	SECTION = '".$section."'");

	    $days = array('TIME','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
    echo'<br/><table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style = "width:110%;">';
	    echo'<thead><tr>';
	    for ($i=0; $i < 7; $i++) { 
	    	
		    	echo'<th>'.$days[$i].'</th>';
		    }
		    echo '</tr></thead><tbody>';
		    		$min=array("00","30");
		    		for($j=7;$j<18;$j++){
	                    foreach ($min as $v){
	                    	$start = $j.':'.$v;	
	                    	if($v==30){
	                    		$mins = '00';
	                    		$hours = $j+1;
	                    	}
	                    	else{
	                    		$mins = '30';
	                    		$hours = $j;
	                    	}
	                    	$end = $hours.":".$mins;
	                        $timestart = date("h:i A", strtotime($start));
	                        $timeend = date("h:i A", strtotime($end)); 
	                        	echo '<tr><td>'.$timestart.' - '.$timeend.'</td>';	
	                        for ($k=1; $k < 7; $k++) { 
	                        	$result = mysql_query("SELECT * FROM schedule WHERE SCHOOL_YEAR = '".$_GET['year']."' AND TERM = '".$_GET['term']."' AND DAYS = '".$k."' AND COURSE = '".$courseyearsect[0]."' AND YEAR= '".$year."'  AND SECTION = '".$section."'");
	                        	if(mysql_num_rows($result)>0){
		    						while ($timedifference = mysql_fetch_array($result)) {
		    							$starts = date("H:i", strtotime($timestart));
		    							$ends = date("H:i", strtotime($timeend));
	    								$starttime = date("H:i", strtotime($timedifference['START_TIME']));
	    								$endtime = date("H:i", strtotime($timedifference['END_TIME']));
	    									if($starttime==$starts){
	    										$course = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE CID = '".$timedifference['COURSE']."'"));
	    										$room = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$timedifference['ROOM']."'"));
	    										$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$timedifference['SUBJECT']."'"));
	    										$lecturer = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$timedifference['LECTURER']."'"));
	    										if ($timedifference['CLASS']==1)
	    											$class = '(lecture)';
	    										else
	    											$class = '(laboratory)';
	    										echo'<td style = "background-color:green; color:white;">'.$subject['SUBJECT'].'<br/>'.$room['ROOM'].'<br/>'.$lecturer['LASTNAME'].' , '.$lecturer['FIRSTNAME'].' '.$lecturer['MIDDLENAME'].'<br/>'.$class.'</td>';
	    									 	$listed = 1;
	    									}
	    									else if ($starttime<=$starts&&$endtime>=$ends){
	    										echo'<td style = "background-color:green; color:white;"></td>';	
	    										$listed = 1;    									 		    							
	    									}

	    							}
	    							if (!isset($listed)) 
    									echo'<td></td>';
    								else unset($listed);
	    						}
    							else{
    									echo'<td></td>';
    							}
	    						
	    					}
	                    }
	                }
	    	echo'</tr></tbody>';
	echo'</table><br/>';
	
	 echo '<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
     <thead>
	    <tr>
	        <th>SUBJECT CODE</th>
	        <th>SUBJECT</th>
	        <th>DAY</th>
	        <th>TIME</th>
	        <th>LECTURER</th>
	        <th>ROOM</th>
	    </tr>
    </thead>
    <tbody>
    ';
$subresult=mysql_query("SELECT * FROM schedule WHERE SCHOOL_YEAR = '".$_GET['year']."' AND COURSE = '".$courseyearsect[0]."' AND YEAR= '".$year."'  AND SECTION = '$section' AND TERM = '".$_GET['term']."'ORDER BY SCHOOL_YEAR DESC, DAYS ASC, START_TIME ASC");
               
            while($subrow=mysql_fetch_array($subresult)){
                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
                $subjectcode = $subjresult['SUBJECT_CODE'];
                $subject = $subjresult['SUBJECT'];
                
                //$sectman = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE CM_ID = '".$subrow['CM_ID']."'"));
                //$yearresult = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '".$sectman['YEAR']."'"));
               // $year = $sectman['YEAR'];
                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$subrow['COURSE']."'"));
                $course = $couresult['COURSE_CODE'];
                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$subrow['SECTION']."'"));
                $section = $secresult['SECTION']; 
                //$dtresult = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = '".$sectman['DT_ID']."'"));
                $days = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$subrow['DAYS']."'"));
                $day = $days['DAY_CODE'];
                $start = date("h:i A", strtotime($subrow['START_TIME']));  
                $end = date("h:i A", strtotime($subrow['END_TIME']));         

                $termresult = mysql_fetch_array(mysql_query("SELECT TERM FROM term WHERE TERM_CODE = '".$subrow['TERM']."'"));
                $term = $termresult['TERM'];

                //$rooms = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOMMAN_ID = '".$subrow['RM_ID']."'"));
                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$subrow['ROOM']."'"));
                $room = $roomresult['ROOM'];       

                $syresult = mysql_fetch_array(mysql_query("SELECT SY FROM schoolyear WHERE SY_ID = '".$subrow['SCHOOL_YEAR']."'"));
                $sy = $syresult['SY'];

                //$lects = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE LM_ID = '".$subrow['LM_ID']."'"));
                $lectresult = mysql_fetch_array(mysql_query("SELECT LASTNAME FROM lecturer WHERE LECTURER_ID = '".$subrow['LECTURER']."'"));
                $lect = $lectresult['LASTNAME']; 
                $year = $subrow['YEAR'];   
        
        echo'<td>'.$subjectcode.'</td>
        <td>'.$subject.'</td>
        <td>'.$day.' </td>
        <td>'.$start."-".$end.'</td>
        <td>'.$lect.'</td>
        <td>'.$room.'</td></tr>';
    }
        echo'</tbody>
    </table><a target="_blank" href="printsectionS.php?course='.$course.'&sy='.$sy.'&term='.$term.'&year='.$year.'&section='.$section.'" class="btn btn-primary">Print</a>';
}
?>