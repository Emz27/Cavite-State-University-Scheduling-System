<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT * FROM course") 
	or die();

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['CID'].'">'.$tier['COURSE'].'</option>';
		}
}

//**************************************
//     First selection results     //
//**************************************

///////////////////////////////////////////////////////////////////////////////TERM///TERM
///////////////////////////////////////////////////////////////////////////////TERM///TERM
///////////////////////////////////////////////////////////////////////////////TERM///TERM
if(isset($_GET['func']) && $_GET['func'] == "drop_1") { 
   drop_1($_GET['drop_var']); 
}


function drop_1($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['course']=$drop_var;
	$result = mysql_query("SELECT * FROM term") 
		or die();
	$count=mysql_num_rows($result);
	if($count>0){
		echo '<br/>
			<label>Term:</label>
			<select class = "form-control" name="drop_2" id="drop_2" class="aw">
	      		<option value=" " disabled="disabled" selected="selected">Select Term</option>';

			   while($drop_4 = mysql_fetch_array( $result )) 
				{
					echo '<option value="'.$drop_4['TERM_CODE'].'">'.$drop_4['TERM'].'</option>';
				}
	
		echo '</select> ';
	//echo '<input type="submit" name="submit" class="aw" value="Submit" />';
	    echo "<script type=\"text/javascript\">
		
			$('#result_2').hide();
			$('#result_3').hide();
			$('#result_4').hide();
			$('#result_5').hide();
			$('#result_6').hide();
			$('#result_7').hide();
			$('#result_8').hide();
			$('#result_9').hide();
			$('#result_0').hide();

			$('#wait_2').hide();
			$('#drop_2').change(function(){
			  $('#wait_2').show();
			  $('#result_2').hide();
		      $.get(\"schedfunc.php\", {
				func: \"drop_2\",
				drop_var: $('#drop_2').val()
		      }, function(response){
		        $('#result_2').fadeOut();
		        setTimeout(\"finishAjax2('result_2', '\"+escape(response)+\"')\", 100);
		      });
		    	return false;
			});
		</script>";
		}
	else{
		echo "<script type=\"text/javascript\">

			$('#result_2').hide();
			$('#result_3').hide();
			$('#result_4').hide();
			$('#result_5').hide();
			$('#result_6').hide();
			$('#result_7').hide();
			$('#result_8').hide();
			$('#result_9').hide();
			$('#result_0').hide();
		</script>";
		echo '<a href = "cursubs.php?course='.$_SESSION['course'].'">
				<button class = "btn btn-primary" type="button">View Course</button>
			</a>';
		}
}




///////////////////////////////////////////////////////////////////////////////YEAR///YEAR
///////////////////////////////////////////////////////////////////////////////YEAR///YEAR
///////////////////////////////////////////////////////////////////////////////YEAR///YEAR
if(isset($_GET['func']) && $_GET['func'] == "drop_2") { 
   drop_2($_GET['drop_var']); 
}

function drop_2($drop_var)
{  session_start();
    $_SESSION['term'] = $drop_var;
    include_once('connect.php');
	$result = mysql_query("SELECT * FROM year")		 
		or die();
	$count=mysql_num_rows($result);
	if($count>0){
		echo '<br/>
				<label>Year:</label>
				<select class = "form-control" name="drop_3" id="drop_3">
			      <option value=" " disabled="disabled" selected="selected">Select Year</option>';

				   while($drop_2 = mysql_fetch_array( $result )) 
					{
					  echo '<option value="'.$drop_2['YEAR_ID'].'">'.$drop_2['YEAR'].'</option>';
					}
		
		echo '</select>';

		echo "<script type=\"text/javascript\">
		$('#result_3').hide();
		$('#result_4').hide();
		$('#result_5').hide();
		$('#result_6').hide();
		$('#result_7').hide();
		$('#result_8').hide();
		$('#result_9').hide();
		$('#result_0').hide();

		$('#wait_3').hide();
			$('#drop_3').change(function(){
			  $('#wait_3').show();
			  $('#result_3').hide();
		      $.get(\"schedfunc.php\", {
				func: \"drop_3\",
				drop_var: $('#drop_3').val()
		      }, function(response){
		        $('#result_3').fadeOut();
		        setTimeout(\"finishAjax_tier_three('result_3', '\"+escape(response)+\"')\", 400);
		      });
		    	return false;
			});
		</script>";
	}
else{
echo "cannot be";
	echo "<script type=\"text/javascript\">
	$('#result_3').hide();
	$('#result_4').hide();
	$('#result_5').hide();
	$('#result_6').hide();
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();
	</script>";

	//echo '<input type="submit"  name="submit" value="Submit" />';

}
}


///////////////////////////////////////////////////////////////////////////////SECTION///SECTION
///////////////////////////////////////////////////////////////////////////////SECTION///SECTION
///////////////////////////////////////////////////////////////////////////////SECTION///SECTION
if(isset($_GET['func']) && $_GET['func'] == "drop_3") { 
   drop_3($_GET['drop_var']); 
}

function drop_3($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['year'] = $drop_var;
	$result = mysql_query("SELECT * FROM SECTION") 
		or die();
	$count=mysql_num_rows($result);
	if($count>0){
	echo '<br/>
			<label>Section:</label>
			<select class = "form-control" name="drop_4" id="drop_4" class="aw">
	        <option value=" " disabled="disabled" selected="selected">Choose Section</option>';

			    while($drop_3 = mysql_fetch_array( $result )) 
				{
				  echo '<option value="'.$drop_3['SECTION_ID'].'">'.$drop_3['SECTION'].'</option>';
				}
	
	echo '</select>';
	echo "<script type=\"text/javascript\">
		$('#result_4').hide();
		$('#result_5').hide();
		$('#result_6').hide();
		$('#result_7').hide();
		$('#result_8').hide();
		$('#result_9').hide();
		$('#result_0').hide();

	$('#wait_4').hide();
		$('#drop_4').change(function(){
		  $('#wait_4').show();
		  $('#result_4').hide();
	      $.get(\"schedfunc.php\", {
			func: \"drop_4\",
			drop_var: $('#drop_4').val()
	      }, function(response){
	        $('#result_4').fadeOut();
	        setTimeout(\"finishAjax_tier_four('result_4', '\"+escape(response)+\"')\", 400);
	      });
	    	return false;
		});
	</script>";


	}
	else{
		echo "<script type=\"text/javascript\">
			$('#result_4').hide();
			$('#result_5').hide();
			$('#result_6').hide();
			$('#result_7').hide();
			$('#result_8').hide();
			$('#result_9').hide();
			$('#result_0').hide();
		</script>";
		
		 //echo '<input type="submit" name="submit" value="Submit" />';

	}
}


///////////////////////////////////////////////////////////////////////////////SUBJECT///SUBJECT
///////////////////////////////////////////////////////////////////////////////SUBJECT///SUBJECT
///////////////////////////////////////////////////////////////////////////////SUBJECT///SUBJECT

if(isset($_GET['func']) && $_GET['func'] == "drop_4") { 
   drop_4($_GET['drop_var']); 
}

function drop_4($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['section'] = $drop_var;
	
	echo '<br/>
		<label>Subject:</label>
		<select class = "form-control" name="drop_5" id="drop_5" class="aw">
	        <option value=" " disabled="disabled" selected="selected">Select Subject</option>';
				$curric = mysql_query("SELECT * FROM curriculum 
										WHERE COURSE = '".$_SESSION['course']."' 
										AND YEAR_OFF = '".$_SESSION['year']."' 
										AND TERM = '".$drop_var."'") or die();
			   
			    while($rows = mysql_fetch_array($curric)){
			    	$schedcheckers = mysql_query("SELECT * FROM schedule 
			    									WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
			    									AND YEAR = '".$_SESSION['year']."' 
			    									AND TERM = '".$_SESSION['term']."' 
			    									AND COURSE = '".$_SESSION['course']."' 
			    									AND SECTION = '".$_SESSION['section']."'")
			    									or die();			    
			    	$hit=0;
			    	if(mysql_num_rows($schedcheckers)>0){
				    	while ($row = mysql_fetch_array($schedcheckers)) 
				    	{
				 		 	if ($row['SUBJECT']==$rows['SUBJECT'])
				 		 	{
				 			 	$hit = 1;	 	
				    		}			 		 
				    	}
				    }
				    if ($hit!=1){
				 		 		$results = mysql_query("SELECT * FROM subject 
				 		 								WHERE SID = '".$rows['SUBJECT']."'")
				 		 								or die();
				 				$resulted = mysql_fetch_array($results); 
				 			 	echo '<option value="'.$resulted['SID'].'">'.$resulted['SUBJECT'].'</option>';		
				 			 	$time = 1;
				    }
			    }

	echo '</select> ';
	
    echo "<script type=\"text/javascript\">
		$('#result_5').hide();
		$('#result_6').hide();
		$('#result_7').hide();
		$('#result_8').hide();
		$('#result_9').hide();
		$('#result_0').hide();

		$('#wait_5').hide();
		$('#drop_5').change(function(){
		  $('#wait_5').show();
		  $('#result_5').hide();
	      $.get(\"schedfunc.php\", {
			func: \"drop_5\",
			drop_var: $('#drop_5').val()
	      }, function(response){
	        $('#result_5').fadeOut();
	        setTimeout(\"finishAjax_tier_five('result_5', '\"+escape(response)+\"')\", 100);
	      });
	    	return false;
		});
	</script>";

	if(!isset($time)){
		echo "<script type=\"text/javascript\">
		$('#result_5').hide();
		$('#result_6').hide();
		$('#result_7').hide();
		$('#result_8').hide();
		$('#result_9').hide();
		$('#result_0').hide();
	</script>";

	echo '<br/><div class = "alert alert-danger">All Subjects Has Already Been Alloted For This Section</div><br/>'/*<a href = "addcursub.php?course='.$_SESSION['course'].'&year='.$_SESSION['year'].'&term='.$_SESSION['term'].'">*/.'<a href = "addsched.php"><button class = "btn btn-primary" type="button">Clear</button></a>';//</a>';
	}
}



///////////////////////////////////////////////////////////////////////////////FINDROOM///FINDROOM
///////////////////////////////////////////////////////////////////////////////FINDROOM///FINDROOM
///////////////////////////////////////////////////////////////////////////////FINDROOM///FINDROOM

function findRoom($whatday,$day,$starttime,$endtime){

		    		
	$subjects = mysql_query("SELECT * FROM subject WHERE SID = '".$_SESSION['subject']."'") or die();
	$subject = mysql_fetch_array($subjects);
	$starttime = date("H:i", strtotime($starttime));
	$endtime = date("H:i", strtotime($endtime));
		    		
		 

//////////////////////////////////////////////////////////////////////////////////////////FIRST DAY IN THE SCHEDULE
	if($whatday==1){
//////////////////////////////////////////////////////////////////////////////////////////subject with laboratory  

    		 if ($subject['LABHOURS']>0){
    		 	$department = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID = '".$subject['SUBTYPE']."'"));

    		 	$roomtype = mysql_query("SELECT * FROM roomtype WHERE DEPARTMENT = '$department[DEPARTMENT]'")or die();
		    	while($rt = mysql_fetch_array($roomtype)){
			    	$rooms = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '".$rt['ROOMTYPENO']."'") or die();

				    	while ($room = mysql_fetch_array($rooms)) {

				    		$roomhours = mysql_query("SELECT * FROM schedule 
		    											WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
		    											AND TERM = '".$_SESSION['term']."' 
		    											AND ROOM = '".$room['ROOM_ID']."'
		    											AND DAYS = '$day'");
	
				    		if (mysql_num_rows($roomhours)>0){
				    			while($room2 = mysql_fetch_array($roomhours)){
					    			$end = date("H:i", strtotime($room2['END_TIME']));
					    			$start = date("H:i", strtotime($room2['START_TIME']));

					    			if ($starttime<$end){
					    				if ($starttime>=$start) {
					    					$hitlab=1;
					    				}
					    			}
					    			else if($endtime>$start){
					    				if ($endtime<=$end) {
					    					$hitlab=1;
					    				}
					    			}
					    		}
				    				if(!isset($hitlab)){
					    				$_SESSION['room1'] = $room['ROOM_ID'] ;
						    			break;
				    				}
				    				unset($hitlab);

				    		}
				    		else{
			    				$_SESSION['room1'] = $room['ROOM_ID'] ;

				    			break;
				    		}
				    	}
				    	if(isset($_SESSION['room1'])){
				    		break;
				    	}
			    	}
			    }
///////////////////////////////////////////////////////////////////////////////////////subject without laboratory
		    else{


	   	$roomtype = mysql_query("SELECT ROOMTYPENO FROM roomtype WHERE DEPARTMENT = 0");
			while($rt = mysql_fetch_array($roomtype)){
				$rooms = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '".$roomtype['ROOMTYPENO']."'");
		    	while ($room = mysql_fetch_array($rooms)) {
		    		$roomhours =mysql_query("SELECT * FROM schedule 
												WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
												AND TERM = '".$_SESSION['term']."' 
												AND ROOM = '".$room['ROOM_ID']."'
												AND DAYS = '$day'");
		    		if(mysql_num_rows($roomhours)>0){
		    			while($room2 = mysql_fetch_array($roomhours)){
			    			$end = date("H:i", strtotime($room2['END_TIME']));
			    			$start = date("H:i", strtotime($room2['START_TIME']));
					    			if ($starttime<$end){
					    				if ($starttime>=$start) {
					    					$hitlec=1;
					    				}
					    			}
					    			else if($endtime>$start){
					    				if ($endtime<=$end) {
					    					$hitlec=1;
					    				}
					    			}
					    		}
				    				if(!isset($hitlab)){
					    				$_SESSION['room1'] = $room['ROOM_ID'] ;
						    			break;
				    				}
				    				unset($hitlec);

		    		}
		    		else{
		    			$_SESSION['room1'] = $room['ROOM_ID'] ;
		    			break;
		    		}
		    	}

		    	if(isset($_SESSION['room1'])){
		    		break;
		    	}
		    }

	    }
   	}


//////////////////////////////////////////////////////////////////////////////////SECOND DAY IN THE SCHEDULE
   	else{
	
	   	$roomtype = mysql_query("SELECT ROOMTYPENO FROM roomtype WHERE DEPARTMENT = 0");
			while($rt = mysql_fetch_array($roomtype)){
				$rooms = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '".$rt['ROOMTYPENO']."'");
		    		//$room = mysql_fetch_array($rooms);
		    	while ($room = mysql_fetch_array($rooms)) {
				
		    		$roomhours =mysql_query("SELECT * FROM schedule 
												WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
												AND TERM = '".$_SESSION['term']."' 
												AND ROOM = '".$room['ROOM_ID']."'
												AND DAYS = '$day'
												ORDER BY START_TIME ASC");
		    		$count = mysql_num_rows($roomhours);

		    		if(mysql_num_rows($roomhours)>0){
		    			while ($roomerhours = mysql_fetch_array($roomhours)){

			    			$end = date("H:i", strtotime($roomerhours['END_TIME']));
			    			$start = date("H:i", strtotime($roomerhours['START_TIME']));

					    			if ($starttime<$end){
					    				if ($starttime>=$start) {
					    					$hits=1;

					    				}
					    			}
					    			else if($endtime>$start){
					    				if ($endtime<=$end) {
					    					$hits=1;

					    				}
					    			}
		    			}
		    			if(!isset($hits)){
		    				$_SESSION['room2'] = $room['ROOM_ID'] ;
		    			}
		    			unset($hits);
		    		}
		    		else{
		    			$_SESSION['room2'] = $room['ROOM_ID'] ;
		    			break;
		    		}
		    	
		    	if(isset($_SESSION['room2'])){
		    		break;
		    	}
		    }
		    }
   	}

}



///////////////////////////////////////////////////////////////////////////////DAYTIME///DAYTIME
///////////////////////////////////////////////////////////////////////////////DAYTIME///DAYTIME
///////////////////////////////////////////////////////////////////////////////DAYTIME///DAYTIME

if(isset($_GET['func']) && $_GET['func'] == "drop_5") { 
   drop_5($_GET['drop_var']); 
}

function drop_5($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['subject'] = $drop_var;

    $subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '$drop_var'"));

    $lechours = $subject['LECHOURS'];
    $labhours = $subject['LABHOURS'];
    $_SESSION['class2'] = 1;

    if ($labhours != 0){
    	$lec = $lechours*2;
    	$lab = $labhours*2;
    	$_SESSION['class1'] = 2;
    }

    else $lec = $lechours;
    $_SESSION['class1'] = 1;

/////////////////////////////////////////////////////////////////////////////////////////////check for other schedules of the section
    $classhours = mysql_query("SELECT * FROM schedule 
								WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
								AND YEAR = '".$_SESSION['year']."' 
								AND TERM = '".$_SESSION['term']."' 
								AND COURSE = '".$_SESSION['course']."' 
								AND SECTION = '".$_SESSION['section']."'
								ORDER BY DAYS ASC, START_TIME DESC");

    if (mysql_num_rows($classhours)>0){
	    while ($class = mysql_fetch_array($classhours)) {


		    	$closing =  date("H:i", strtotime("18:00"));
		    	if (isset($lab))
			    	$end1 = date("H:i", strtotime($class['END_TIME']) + $lab*60*60);
			    else
			    	$end1 = date("H:i", strtotime($class['END_TIME']) + $lec*60*60/2);
		    		
		    	$day1 = $class['DAYS'];
		    	$start1 = $class['END_TIME'];
		    	//QUERY to see if necessary to set breaktime
			    	$breaktime = mysql_query("SELECT * FROM schedule 
			    					WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
									AND YEAR = '".$_SESSION['year']."' 
									AND TERM = '".$_SESSION['term']."' 
									AND COURSE = '".$_SESSION['course']."' 
									AND SECTION = '".$_SESSION['section']."'
									AND DAYS = '$class[DAYS]'
									ORDER BY START_TIME DESC");

			    ///////////////////////////////////////////////////////sets 1 hour for breaktime each day after two subjects..
			    	if (mysql_num_rows($breaktime)==2)
			    		$start1 = date("H:i", strtotime($class['END_TIME']) + 60*60);

			    ///////////////////////////////////////////////////////check for other lab subjects
			    if (isset($lab)){
			    	while(!isset($proceed)){
				    	$labtime = mysql_query("SELECT * FROM schedule 
				    					WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
										AND YEAR = '".$_SESSION['year']."' 
										AND TERM = '".$_SESSION['term']."' 
										AND COURSE = '".$_SESSION['course']."' 
										AND SECTION = '".$_SESSION['section']."'
										AND DAYS = '$class[DAYS]'
										AND CLASS = 2");
				    	if (mysql_num_rows($labtime)>0){
				    		$day1 = $day1 + 1;
				    		// if ($day1>=7) {
				    		// 	$allDaysAlreadyHaveLab = 1;
				    		// 	break;				    			
				    		// }
				    	}


				    	$breaktime = mysql_query("SELECT * FROM schedule 
				    					WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
										AND YEAR = '".$_SESSION['year']."' 
										AND TERM = '".$_SESSION['term']."' 
										AND COURSE = '".$_SESSION['course']."' 
										AND SECTION = '".$_SESSION['section']."'
										AND DAYS = '$day1'
										ORDER BY START_TIME DESC");
				    	if (mysql_num_rows($breaktime)<4){
					    	if (mysql_num_rows($breaktime)==2)
					    		$start1 = date("H:i", strtotime($class['END_TIME']) + 60*60);
				    		$proceed = 1;
				    	}
				    }
			    }



			   ////////////////////////////////////////////////prevents overloading 1 day.. limit to three subjects per day
		    	if ($end1<$closing&&mysql_num_rows($breaktime)<4){
		    		//echo'<input value = "'.$end1.$closing.'">';
		    		findRoom(1,$day1,$start1,$end1);
		    	
		    		if (isset($_SESSION['room1'])) {

		    			if ($day1<=4){
		    				$day2 = $day1 + 2;
		    			}
		    			else{

		    			}

		    		    $classhours2 = mysql_query("SELECT * FROM schedule 
									WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
									AND YEAR = '".$_SESSION['year']."' 
									AND TERM = '".$_SESSION['term']."' 
									AND COURSE = '".$_SESSION['course']."' 
									AND SECTION = '".$_SESSION['section']."'
									AND DAYS = '$day2'");
		    		    if(mysql_num_rows($classhours2)>0){

		    		
		    		    	while($class2 = mysql_fetch_array($classhours2)){
		    		    		$start2 = date("H:i", strtotime($class2['END_TIME']));
						    	$end2 = date("H:i", strtotime($class2['END_TIME']) + $lec*60*60/2);
						    	$day2 = $class2['DAYS'];

		    					$closing2 =  date("H:i", strtotime("7:00"));

						    	//echo'<input value = '.$start2.'>';
						    	if($end2<$closing&&$end2>$closing2){
		    						findRoom(2,$day2,$start2,$end2);
		    						if (isset($_SESSION['room2'])) {
							    		$start2 = $class2['END_TIME'];
							    		$_SESSION['day1'] = $day1;
										$_SESSION['start1'] = $start1;
										$_SESSION['end1'] = $end1;
										$_SESSION['day2'] = $day2;
										$_SESSION['start2'] = $start2;
										$_SESSION['end2'] = $end2;
							    		$setbreak = 1;
		    						}
						    	}
						    	else
		    						$day2 = $day2 + 1;
						    	if (isset($setbreak))break;
					    	}
		    		    }
		    		    else
		    		    {
		    		    	$start2 = date("H:i", strtotime("7:00"));
			    		    	if (!isset($lab))
						    		$end2 = date("H:i", strtotime("7:00") + $lec*60*60/2);
						    	else	
						    		$end2 = date("H:i", strtotime("7:00") + $lab*60*60/2);
		    				findRoom(2,$day2,$start2,$end2);

		    				if (isset($_SESSION['room1'])) {
					    		$_SESSION['day1'] = $day1;
								$_SESSION['start1'] = $start1;
								$_SESSION['end1'] = $end1;
							}

		    				findRoom(2,$day2,$start2,$end2);

		    				if (isset($_SESSION['room2'])) {
								$_SESSION['day2'] = $day2;
								$_SESSION['start2'] = date("H:i", strtotime("7:00"));
								if (isset($lab)){
									$_SESSION['end2'] = date("H:i", strtotime("7:00") + $lab*60*60/2);	
								}	   
								else{
									$_SESSION['end2'] = date("H:i", strtotime("7:00") + $lec*60*60/2);	
								}
					    		$setbreak = 1;
					    	}
		    		    }
		    		}

		    	}
	    	
	    	else{
	    		$day1 = $day1+1;
	    		$day2 = $day1+2;

	    		$start1 = date("H:i", strtotime("7:00"));

	    		$end2 = date("H:i", strtotime("7:00") + $lec*60*60/2);
	    		$start2 = date("H:i", strtotime("7:00"));


			    	$breaktime = mysql_query("SELECT * FROM schedule 
			    					WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
									AND YEAR = '".$_SESSION['year']."' 
									AND TERM = '".$_SESSION['term']."' 
									AND COURSE = '".$_SESSION['course']."' 
									AND SECTION = '".$_SESSION['section']."'
									AND DAYS = '$day1'
									ORDER BY START_TIME DESC");
			    ///////////////////////////////////////////////////////sets 1 hour for breaktime each day after 2 subjects..
			    	if (mysql_num_rows($breaktime)==2)
			    		$start1 = date("H:i", strtotime($class['END_TIME']) + 60*60);

				if (isset($lab)){
					$end1 = date("H:i", strtotime("7:00") + $lab*60*60/2);
				}
				else{
					$end1 =  date("H:i", strtotime("7:00") + $lec*60*60/2);
				}

    				findRoom(1,$day1,$start1,$end1);
    				if (isset($_SESSION['room1'])) {
						$_SESSION['day1'] = $day1;
						$_SESSION['start1'] = $start1;
						$_SESSION['end1'] = $end1;
					}
					findRoom(2,$day2,$start2,$end2);
					if (isset($_SESSION['room2'])){
						$_SESSION['day2'] = $day2;
						$_SESSION['start2'] = $start2;
						$_SESSION['end2'] = $end2;	
						$setbreak = 1;
					}
	    	}

		    if (isset($allDaysAlreadyHaveLab)) {
		    	break;
		    }
	    	if (isset($setbreak))break;
	    	}
	    }
	
	//////////////////////////////////////////////////////////////////////////////////////////////////noother schedulesfound
	else{
	    		$day1 = 1;
	    		$day2 = 3;
	    		$start2 = date("H:i", strtotime("7:00"));
	    		$end2 = date("H:i", strtotime("7:00") + $lec*60*60/2);
	    		$start1 = date("H:i", strtotime("7:00"));
				if (isset($lab)){
					$end1 = date("H:i", strtotime("7:00") + $lab*60*60/2);
				}
				else{
					$end1 =  date("H:i", strtotime("7:00") + $lec*60*60/2);
				}

		findRoom(1,$day1,$start1,$end1);
		if (isset($_SESSION['room1'])){
		$_SESSION['day1'] = $day1;
		$_SESSION['start1'] = $start1;
		$_SESSION['end1'] = $end1;
		}
		findRoom(2,$day2,$start2,$end2);
		if (isset($_SESSION['room2'])){
		$_SESSION['day2'] = $day2;
		$_SESSION['start2'] = $start2;
		$_SESSION['end2'] = $end2;
		}
	}

	$room1s = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$_SESSION['room1']."'"));

	echo'<input value = "'.$_SESSION['room1'].'">';
	$day1s = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$_SESSION['day1']."'"));
	$timestart1s = date("h:i A", strtotime($_SESSION['start1']));
	$timeend1s = date("h:i A", strtotime($_SESSION['end1']));
	$room2s = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$_SESSION['room2']."'"));
	$day2s = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$_SESSION['day2']."'"));
	$timestart2s = date("h:i A", strtotime($_SESSION['start2']));
	$timeend2s = date("h:i A", strtotime($_SESSION['end2']));
	echo '<br/><label>ROOM - DAY - TIME</label><input class = "form-control" name="day" value="'.$room1s['ROOM'].' - '.$day1s['DAY_CODE'].' - '.$timestart1s.'-'.$timeend1s.'"><br/>';
	echo '<br/><label>ROOM - DAY - TIME</label><input class = "form-control" name="day" value="'.$room2s['ROOM'].' - '.$day2s['DAY_CODE'].' - '.$timestart2s.'-'.$timeend2s.'"><br/>';
			
		$subtype = mysql_fetch_array(mysql_query("SELECT SUBTYPE FROM subject 
													WHERE SID = '".$_SESSION['subject']."'"));
		$department = mysql_fetch_array(mysql_query("SELECT DEPARTMENT FROM subjecttype 
												WHERE TID = '".$subtype['SUBTYPE']."'"));
		$lectavails = mysql_query("SELECT * FROM lecturer 
									WHERE DEPARTMENT = '".$department['DEPARTMENT']."'");


	

echo'<br/>	
	<select class = "form-control" name = "lect" id="drop_6" class="aw">
	<option selected hidden disabled>';
			while ($lectavail = mysql_fetch_array($lectavails)) {

				$availabilities1 = mysql_fetch_array(mysql_query("SELECT * FROM availability 
								WHERE LECTURER  = '".$lectavail['LECTURER_ID']."' AND DAYS = '".$_SESSION['day1']."'"));
				$start1 = date("H:i", strtotime($availabilities1['START_TIME']));
				$end1 = date("H:i", strtotime($availabilities1['END_TIME']));
				$sestart1 = date("H:i", strtotime($_SESSION['start1']));
				$sesend1 = date("H:i", strtotime($_SESSION['end1']));
				//echo "<br/><input class = 'form-control' name='day' value='".$subtype['SUBTYPE'].$department['DEPARTMENT'].$lectavail['LECTURER_ID'].$start1.$sestart1.$end1.$sesend1."''>";	
				//echo "<br/><input class = 'form-control' name='day' value='".$subtype['SUBTYPE'].$sestart1.$lectavail['LECTURER_ID'].$start1.$sestart1.$end1.$sesend1."''>";	
				
				if($start1<=$sestart1&&$end1>=$sesend1)
				{
					//	echo "<br/><input class = 'form-control' name='day' value='".$subtype['SUBTYPE'].$department['DEPARTMENT'].$lectavail['LECTURER_ID'].$start1.$sestart1.$end1.$sesend1."''>";	
					$availabilities2 = mysql_fetch_array(mysql_query("SELECT * FROM availability WHERE LECTURER = '".$lectavail['LECTURER_ID']."' AND DAYS = '".$_SESSION['day2']."'"));
					$start2 = date("H:i", strtotime($availabilities2['START_TIME']));
					$end2 = date("H:i", strtotime($availabilities2['END_TIME']));
					$sestart2 = date("H:i", strtotime($_SESSION['start2']));
					$sesend2 = date("H:i", strtotime($_SESSION['end2']));
					if ($start2<=$sestart2&&$end2>=$sesend2) {
						$available = 1;
						}
				}

				if (isset($available)){
					//echo "<br/><input class = 'form-control' name='day' value='".$start1.$_SESSION['room1'].$_SESSION['day1'].$_SESSION['start1'].$_SESSION['end1'].$_SESSION['room2'].$_SESSION['day2'].$_SESSION['start2'].$_SESSION['end2']."''>";	
				
					$lecturers = mysql_query("SELECT * FROM schedule 
										WHERE SCHOOL_YEAR = '".$_SESSION['sy']."'
										AND TERM = '".$_SESSION['term']."'
										AND YEAR = '".$_SESSION['year']."'
										AND DAYS = '".$_SESSION['day1']."'
										AND LECTURER = '".$lectavail['LECTURER_ID']."'");
					if (mysql_num_rows($lecturers)>0){
						while ($schedule = mysql_fetch_array($lecturers)) {
							if ($schedule['START_TIME']>=$_SESSION['end1']||$schedule['END_TIME']<=$_SESSION['start1']){
								$lecturers2 = mysql_query("SELECT * FROM schedule 
										WHERE SCHOOL_YEAR = '".$_SESSION['sy']."'
										AND TERM = '".$_SESSION['term']."'
										AND YEAR = '".$_SESSION['year']."'
										AND DAYS = '".$_SESSION['day2']."'
										AND LECTURER = '".$lectavail['LECTURER_ID']."'");
								if (mysql_num_rows($lecturers2)>0){
									while ($lecturer2 = mysql_fetch_array($lecturers2)) {
										if ($lecturer2['START_TIME']>=$_SESSION['end2']||$lecturer2['END_TIME']<=$_SESSION['start2']){
											echo'<option value = '.$lectavail['LECTURER_ID'].'>'.$lectavail['LASTNAME'].' , '.$lectavail['FIRSTNAME'].' '.$lectavail['MIDDLENAME'].'</option>';
											$thereslect = 1;
										}
									}
								}
							}
						}
					}																																																	
					else{
					echo'<option value = '.$lectavail['LECTURER_ID'].'>'.$lectavail['LASTNAME'].' , '.$lectavail['FIRSTNAME'].' '.$lectavail['MIDDLENAME'].'</option>';
					$thereslect = 1;
					}
				}
				unset($available);	
			}
echo'</select>';
		

    echo "<script type=\"text/javascript\">
	$('#result_6').hide();
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();

	$('#wait_6').hide();
	$('#drop_6').change(function(){
	  $('#wait_6').show();
	  $('#result_6').hide();
      $.get(\"schedfunc.php\", {
		func: \"drop_6\",
		drop_var: $('#drop_6').val()
      }, function(response){
        $('#result_6').fadeOut();
        setTimeout(\"finishAjax_tier_six('result_6', '\"+escape(response)+\"')\", 100);
      });
    	return false;
	});
</script>";
	
	if(!isset($thereslect)){
		echo "<script type=\"text/javascript\">\
		$('#time').hide();
		$('#drop_6').hide();
		$('#result_6').hide();
		$('#result_7').hide();
		$('#result_8').hide();
		$('#result_9').hide();
		$('#result_0').hide();
	</script>";

	echo '<br/><div class = "alert alert-danger">Sorry No Lecturers Available from the Department for the Schedule</div><br/><a href="lecturer.php"><button class = "btn btn-primary" type="button">Add Lecturer</button></a>';

	}
	// }
	// 		else{
	// 			echo '<script type=\"text/javascript\">
	// 		window.alert(\"Sorry No Rooms Available\");
	// 		</script>';
	// 		echo'
	// 		<br/><a href="room.php"><button class = "btn btn-primary" type="button">Add Room</button></a>';
	// }
}
if(isset($_GET['func']) && $_GET['func'] == "drop_6") { 
   drop_6($_GET['drop_var']); 
}

function drop_6($drop_var)
{
	session_start();
	include("connect.php");
	$_SESSION['lecturer']=$drop_var;
	echo '<br/><button class = "btn btn-primary" type="submit" name="submitschedule"  value="Submit" >Submit</button>';
}

?>