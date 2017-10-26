<?php $timetest = '21:00';
	// $time = date("D h:i A", strtotime($timetest));
	// //echo $time;
	// $times = date("D h:i A",strtotime('21:00'));
	// if ($time>$times){ echo $time;}
	// else{ echo $times;}

	//echo date("h:i A",strtotime('8:00'));
if(isset($_POST['subject'])){
	session_start();
	$_SESSION['sy'] = 2;
	$_SESSION['term'] = 1;
	$_SESSION['course'] = 1;
	$_SESSION['year'] = 1;
	$_SESSION['section'] = 1;
	include("connect.php");
	$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$_POST['subject']."'"));

	    $lechours = $subject['LECHOURS'];
	    $labhours = $subject['LABHOURS'];
	    if ($labhours != 0){
	    	$lec = $lechours*2;
	    	$lab = $labhours*2;
	    }
	    else $lec = $lechours;


			$min=array("00","30");
			

	//////////////////////////////////////////////		
	//check schedule from days mon, tue, wed
	////////////////////////////////////////////
		for($day=1; $day<4;$day++){
			for($i=8;$i<20;$i++){
			    foreach ($min as $v){
			       $m = $i.':'.$v;
			    	    $classhours = mysql_query("SELECT * FROM schedule 
	    											WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
	    											AND YEAR = '".$_SESSION['year']."' 
	    											AND TERM = '".$_SESSION['term']."' 
	    											AND COURSE = '".$_SESSION['course']."' 
	    											AND SECTION = '".$_SESSION['section']."'
	    											AND DAYS = '$day'
	    											");
			    	    

	//////////////////////////////////////////////////////
	//check to see if there is an entry in the schedule
	//////////////////////////////////////////////////////
			    if(mysql_num_rows($classhours)>0){
						    while($timetest = mysql_fetch_array($classhours))
						    {
						    			$end = strtotime($m) + $lec*60;
				    			    	$end1pass1 = date("h:i A", strtotime($end));
				    			    	$start1pass1 = date("h:i A", strtotime($m));
			    			    	
			    			    	//////////////////////////////////////////////////////////////////////
			    			    	//check to see if time in the section for first day is not conflict
				    			    //////////////////////////////////////////////////////////////////////
				    			    	$starttest1 = date("h:i A",strtotime($timetest['START_TIME']));
				    			    	$endtest1 = date("h:i A",strtotime($timetest['END_TIME']));
			    			    	if ($end1pass1<=$starttest1 || $start1pass1<=$endtest1 ){
			    			    		for($day1=4; $day1<7;$day1++){
			    							for($i1=8;$i1<20;$i1++){
			    							    foreach ($min as $v1){
			    							       $m1 = $i1.':'.$v1;
			    							    	date("h:i A",strtotime($m1));
			    						    	    $classhours1 = mysql_query("SELECT * FROM schedule 
			    				    											WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
			    				    											AND YEAR = '".$_SESSION['year']."' 
			    				    											AND TERM = '".$_SESSION['term']."' 
			    				    											AND COURSE = '".$_SESSION['course']."' 
			    				    											AND SECTION = '".$_SESSION['section']."'
			    				    											AND DAYS = '$day1'");
			    								    while($timetest1 = mysql_fetch_array($classhours1)){
			    								    	
			    								    	$start2pass1 = date("h:i A", strtotime($m1)); 
			    								    	if(!isset($lab)){
			    								    		$end2pass1 = date("h:i A", strtotime($m1) + $lec*60);
			    								    	}
			    								    	else{
			    								    		$end2pass1 = date("h:i A", strtotime($m1) + $lab*60);
			    								    	}

			    			    						
								    			    	//////////////////////////////////////////////////////////////////////
								    			    	//check to see if time in the section for second day is not conflict
									    			    //////////////////////////////////////////////////////////////////////
			    								    	$starttest2 = date("h:i A",strtotime($timetest1['START_TIME']));
				    			    					$endtest2 = date("h:i A",strtotime($timetest1['END_TIME']));
			    								    	if ($end2pass1<=$starttest2 || $start2pass1<=$endtest2){

																	    		$_SESSION['day1'] = $day;
																	    		$_SESSION['start1'] = date("h:i A", strtotime($start1pass1));
																	    		$_SESSION['end1'] = date("h:i A", strtotime($end1pass1));
																	    		$_SESSION['day2'] = $day1;
																	    		$_SESSION['start2'] = date("h:i A", strtotime($start2pass1));
																	    		$_SESSION['end2'] = date("h:i A", strtotime($end2pass1));	
																	    		   
								    			   //  		for($days=4; $days<7;$days++){
								    						// 	for($is=8;$is<18;$is++){
								    						// 	    foreach ($min as $vs){
								    						// 	       $ns = $is.':'.$vs;
								    						// 	    	date("h:i A",strtotime($ns));
								    						//     	    $classhourss = mysql_query("SELECT * FROM schedule 
								    				  //   											WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
								    				  //   											AND YEAR = '".$_SESSION['year']."' 
								    				  //   											AND TERM = '".$_SESSION['term']."' 
								    				  //   											AND COURSE = '".$_SESSION['course']."' 
								    				  //   											AND SECTION = '".$_SESSION['section']."'
								    				  //   											AND DAYS = '$days'");
								    						// 		    while($timetests2 = mysql_fetch_array($classhourss)){
								    						// 		    	$start1pass2 = date("h:i A", strtotime($ns));
								    						// 		    	if(!isset($lab))
								    						// 		    		$end1pass2 = date("h:i A", strtotime($ns) + ($lec*60));
								    						// 		    	else{
								    						// 		    		$end1pass2 = date("h:i A", strtotime($ns) + ($lab*60));
								    						// 		    	}	     								    	

								    						// 		    	}
								    						// 		    }
								    						// 	    }
								    						// 	}
								    						// }
			    								    	}
			    								    	if (isset($_SESSION['day1'])) {
			    								    		break;
			    								    	}
			    								    }
			    							    }//start2 min
			    							}//start2
			    						}//day2
			    			    	}//if ($end1pass1<=['START_TIME'])
			    			    }//while records fetch array
						    }//records found
						    else
						    {
					    		$_SESSION['day1'] = 1;
					    		$_SESSION['start1'] = date("h:i A", strtotime("8:00"));
					    		$_SESSION['end1'] = date("h:i A", strtotime("8:00") + $lec*60*60/2);
					    		$_SESSION['day2'] = 4;
					    		$_SESSION['start2'] = date("h:i A", strtotime("8:00"));
					    		if (isset($lab)){
					    			$_SESSION['end2'] = date("h:i A", strtotime("8:00") + $lab*60*60/2);	
					    		}	   
					    		else{
					    			$_SESSION['end2'] = date("h:i A", strtotime("8:00") + $lec*60*60/2);	
					    		}	    	
					    	}//no records
					    	if (isset($_SESSION['day1'])) {
					    		break;
					    	}
					    }//start1min
				    	if (isset($_SESSION['day1'])) {
				    		break;
				    	}
					}//start1
			    	if (isset($_SESSION['day1'])) {
			    		break;
			    }
	    	}//day1

		echo $_SESSION['day1'].'<br/>';
		echo $_SESSION['start1'].'<br/>';
		echo $_SESSION['end1'].'<br/>';
		echo $_SESSION['day2'].'<br/>';
		echo $_SESSION['start2'].'<br/>';
		echo $_SESSION['end2'].'<br/>';
		echo $_POST['subject'];
}//if post subject
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post">
	<input type="text" name="subject"/>
	<input type="submit" >
</form>

</body>
</html>