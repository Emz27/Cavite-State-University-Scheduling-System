<?php
//**************************************
//     Page load dropdown results     //
//**************************************



function printsched($index){



	$room1s = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$_SESSION['room'.$index]."'"));

	$day1s = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$_SESSION['day'.$index]."'"));



	$timestart1s = date("h:i A", strtotime($_SESSION['start'.$index]));
	$timeend1s = date("h:i A", strtotime($_SESSION['end'.$index]));

	$sTime1 = strtotime( $_SESSION['start'.$index] );
	$eTime1 = strtotime( $_SESSION['end'.$index] );

	echo '<br/><label>ROOM - DAY - TIME</label><input class = "form-control" name="day" value="'.$room1s['ROOM'].' - '.$day1s['DAY_CODE'].' - '.$timestart1s.'-'.$timeend1s.'"disabled><br/>';

	return 1;

}
function subjectAvailableDays($id){

	$days = array(0,0,0,0,0,0);

	$subject =  mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$id."'"));

	$days[0] = $subject['MONDAY'];
	$days[1] = $subject['TUESDAY'];
	$days[2] = $subject['WEDNESDAY'];
	$days[3] = $subject['THURSDAY'];
	$days[4] = $subject['FRIDAY'];
	$days[5] = $subject['SATURDAY'];

	return $days;

}
function lecturerAvailableDays($id){

	$days = array(0,0,0,0,0,0);
	$availability = mysql_query("SELECT * FROM availability WHERE LECTURER = '".$id."'");

	while( $row = mysql_fetch_array($availability)){
		for( $i = 0 ; $i < 6 ; $i++ ){

			if( ($row['DAYS']-1) == $i ){
				$days[$i] = 1;
			}

		}

	}

	

	return $days;

}
function compareTime($startTime,$endTime,$dayz,$lecturer,$section,$room,$availableDay){



	$sCount = 0;

	$count = 0;

	$mirror = array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00");

	$sched = array( "","","","","","","","","","","","","","","","","","","","","","","");	
	

	for( $i = 0; $i <= 22 ; $i++ ){ // filling the starttime and endttime array

		if( strtotime($startTime ) <= strtotime( $mirror[$i] ) ){

			$sched[$i] = $mirror[$i];
			$sCount++;

		}
		if( strtotime( $endTime ) == strtotime( $mirror[$i] ) ){
			break;
		}

	}


	for( $i = 0 ; $i < 6 ; $i++ ){

		if($availableDay[$i] == 0)continue;

		if($i != $dayz -1)continue;
	
		for( $j = 0 ; $j <= 22 ; $j++ ){

			//echo $sched[$j]."</br>".$lecturer[$i][$j]."</br>";

			if(strtotime($sched[$j]) == strtotime($lecturer[$i][$j]) &&
				strtotime($lecturer[$i][$j]) == strtotime($section[$i][$j]) &&
				strtotime($room[$i][$j]) == strtotime($lecturer[$i][$j]) &&
				strtotime($section[$i][$j]) == strtotime($room[$i][$j]) &&
				strtotime($sched[$j]) == strtotime($section[$i][$j]) &&
				strtotime($sched[$j]) == strtotime($lecturer[$i][$j]) &&
				strtotime($sched[$j]) == strtotime($room[$i][$j]) && $sched[$j] != null){

				$count++;
				$day = $i+1;
				// echo "Count:".$count."</br>";
				// echo "sCount:".$sCount."</br>";
				// echo "day:".$day."</br>";


			}
			else{

				$count = 0;
			}
			if( $count == $sCount ){
				return 1;
			}
		}
	}

	return 0;
}
function fillLecturer($lecturer,$id,$term,$sy){

	$mirror = array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00");
	$sched = array(
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","","")
	);

	for( $i = 0 ; $i < 6 ; $i++ ){
		for ( $j = 0 ; $j <= 22 ; $j++ ){

			$lecturer[$i][$j] = "";

		}
	}

	for( $i = 0 ; $i < 6 ; $i++ ){

		$availability = mysql_query("SELECT * FROM availability WHERE LECTURER = '".$id."' AND DAYS = '".($i + 1)."'");

		$schedule = mysql_query("SELECT * FROM schedule 
			WHERE LECTURER = '".$id."' 
			AND DAYS = '".($i + 1)."' 
			AND SCHOOL_YEAR = '".$sy."'
			AND TERM = '".$term."'");

		while( $class = mysql_fetch_array($schedule) ){

			for ( $j = 0 ; $j <= 22 ; $j++ ){

				if( strtotime( $mirror[$j] ) == strtotime( $class['START_TIME'] ) )$iSched1 = $j;
				else if( strtotime( $mirror[$j] ) == strtotime( $class['END_TIME'] ) )$iSched2 = $j;

			}
			for ( $j = $iSched1 ; $j <= $iSched2 - 1  ; $j++ ){

				$sched[$i][$j] = $mirror[$j];

			}
		}

		while( $lect = mysql_fetch_array($availability)){

			for ( $j = 0 ; $j <= 22 ; $j++ ){

				if( strtotime( $mirror[$j] ) == strtotime( $lect['START_TIME'] ) ){
					$iLect1 = $j;


				}
				else if( strtotime( $mirror[$j] ) == strtotime( $lect['END_TIME'] ) ){
					$iLect2 = $j;


				}

			}

			for ( $j = $iLect1 ; $j <= $iLect2 - 1 ; $j++ ){

				$lecturer[$i][$j] = $mirror[$j];

			}
		}


		for( $j = 0 ; $j <=22 ; $j++ ){

			if(strtotime($lecturer[$i][$j]) == strtotime($sched[$i][$j])) $lecturer[$i][$j] = "";

		}

	}
	return $lecturer;

}
function fillSection($section,$id,$term,$sy,$year,$course){
	$mirror = array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00");
	$sched = array(
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","","")
	);
	for( $i = 0 ; $i < 6 ; $i++ ){
		for ( $j = 0 ; $j <= 22 ; $j++ ){

			$section[$i][$j] = $mirror[$j];

		}
	}
	for( $i = 0 ; $i < 6 ; $i++ ){


		$schedule = mysql_query("SELECT * FROM schedule 
			WHERE SECTION = '".$id."' 
			AND DAYS = '".($i + 1)."'
			AND SCHOOL_YEAR = '".$sy."'
			AND TERM = '".$term."'
			AND YEAR = '".$year."'
			AND COURSE = '".$course."'");
		while( $class = mysql_fetch_array($schedule) ){
			//$sched[$class[$i]];
			for ( $j = 0 ; $j <= 22 ; $j++ ){

				if( strtotime( $mirror[$j] ) == strtotime( $class['START_TIME'] ) )$iSched1 = $j;
				else if( strtotime( $mirror[$j] ) == strtotime( $class['END_TIME'] ) )$iSched2 = $j;

			}
			for ( $j = $iSched1 ; $j <= $iSched2 -1 ; $j++ ){

				$section[$i][$j] = "";

			}
		}

	}
	return $section;
}
function fillRoom($room,$id,$term,$sy){
	$mirror = array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00");
	$sched = array(
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","","")
	);
	for( $i = 0 ; $i < 6 ; $i++ ){
		for ( $j = 0 ; $j <= 22 ; $j++ ){

			$room[$i][$j] = $mirror[$j];

		}
	}
	for( $i = 0 ; $i < 6 ; $i++ ){


		$schedule = mysql_query("SELECT * FROM schedule 
			WHERE ROOM = '".$id."' 
			AND DAYS = '".($i + 1)."'
			AND SCHOOL_YEAR = '".$sy."'
			AND TERM = '".$term."'");
		while( $class = mysql_fetch_array($schedule) ){
			//$sched[$class[$i]];
			for ( $j = 0 ; $j <= 22 ; $j++ ){

				if( strtotime( $mirror[$j] ) == strtotime( $class['START_TIME'] ) )$iSched1 = $j;
				else if( strtotime( $mirror[$j] ) == strtotime( $class['END_TIME'] ) )$iSched2 = $j;

			}
			for ( $j = $iSched1 ; $j <= $iSched2 -1  ; $j++ ){

				$room[$i][$j] = "";

			}
		}

	}

	return $room;
}

function getTierOne()
{

	
	$result = mysql_query("SELECT * FROM lecturer") 
	or die();

	  while($lecturers = mysql_fetch_array( $result )) 
  
		{
		  echo '<option value = '.$lecturers['LECTURER_ID'].'>'.$lecturers['LASTNAME'].' , '.$lecturers['FIRSTNAME'].' '.$lecturers['MIDDLENAME'].'</option>';
		}
}
function breakTime($endtime){

	if( strtotime($endtime) == strtotime( "10:00" ) )return 2;
	else if( strtotime($endtime) == strtotime( "10:30" ) )return 2;
    else if( strtotime($endtime) == strtotime( "11:00" ) )return 2;
    else if( strtotime($endtime) == strtotime( "11:30" ) )return 2;
    else if( strtotime($endtime) == strtotime( "12:00" ) )return 2;
    else if( strtotime($endtime) == strtotime( "12:30" ) )return 1;
	else if( strtotime($endtime) == strtotime( "01:00" ) )return 1;
	else if( strtotime($endtime) == strtotime( "01:30" ) )return 1;
	else if( strtotime($endtime) == strtotime( "02:00" ) )return 1;
	else return 0;
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
    $_SESSION['lecturer']=$drop_var;
	$result = mysql_query("SELECT * FROM schoolyear") 
		or die();
	$count=mysql_num_rows($result);
	if($count>0){
		echo '<br/>
			<label>School Year:</label>
			<select class = "form-control" name="drop_2" id="drop_2" class="aw">
	      		<option value=" " disabled="disabled" selected="selected">Select Term</option>';

			   while($drop_4 = mysql_fetch_array( $result )) 
				{
					echo '<option value="'.$drop_4['SY_ID'].'">'.$drop_4['SY'].'</option>';
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
		      $.get(\"reschedfunc.php\", {
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
    $_SESSION['sy'] = $drop_var;
    include_once('connect.php');
	$result = mysql_query("SELECT * FROM term")		 
		or die();
	$count=mysql_num_rows($result);
	if($count>0){
		echo '<br/>
				<label>Term:</label>
				<select class = "form-control" name="drop_3" id="drop_3">
			      <option value=" " disabled="disabled" selected="selected">Select Term</option>';

				   while($drop_2 = mysql_fetch_array( $result )) 
					{
					  echo '<option value="'.$drop_2['TERM_CODE'].'">'.$drop_2['TERM'].'</option>';
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
		      $.get(\"reschedfunc.php\", {
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
    $_SESSION['term'] = $drop_var;

	echo '<br/>
		<label>Subject:</label>
		<select class = "form-control" name="drop_4" id="drop_4" class="aw">
	        <option value=" " disabled="disabled" selected="selected">Select Subject</option>';

				$schedcheckers = mysql_query("SELECT * FROM schedule 
			    									WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' 
			    									AND TERM = '".$_SESSION['term']."'
			    									AND LECTURER = '".$_SESSION['lecturer']."'")
			    									or die();	

				$count=mysql_num_rows($schedcheckers);
				if($count>0){
			   
				    while($rows = mysql_fetch_array($schedcheckers)){

				    			    
	    	
		 		 		$results = mysql_query("SELECT * FROM subject 
		 		 								WHERE SID = '".$rows['SUBJECT']."'")
		 		 								or die();
		 				$resulted = mysql_fetch_array($results); 

		 				$course = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE CID = '".$rows['COURSE']."'")); 

		 				$section = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE SECTION_ID = '".$rows['SECTION']."'")); 

		 				if($rows['CLASS'] == 1){
		 					echo '<option value="'.$rows['SCHED_ID'].'">'.$resulted['SUBJECT'].' ( '.$course['COURSE_CODE'].'-'.$rows['YEAR'].$section['SECTION']." ) - LECTURE".'</option>';
		 				}
		 				else{
		 					echo '<option value="'.$rows['SCHED_ID'].'">'.$resulted['SUBJECT'].' ( '.$course['COURSE_CODE'].'-'.$rows['YEAR'].$section['SECTION']." ) - LABORATORY".'</option>';
		 				}

		 			 			
					}
			    


	echo '</select> ';
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
	      $.get(\"reschedfunc.php\", {
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
{  
	session_start();
    include_once('connect.php');

    $_SESSION['sched_id'] = $drop_var;



    $mirror = array(
		array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00"),
		array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00"),
		array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00"),
		array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00"),
		array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00"),
		array( "07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00")
	);

	$lecturer = array(
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","","")
	);

	$room = array(
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","","")
	);

	$section = array(
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","",""),
		array( "","","","","","","","","","","","","","","","","","","","","","","")
	);

	$availableDay = array(0,0,0,0,0,0);

	

	$sched = mysql_fetch_array(mysql_query("SELECT * FROM schedule WHERE SCHED_ID = '".$_SESSION['sched_id']."'"));

	$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$sched['SUBJECT']."'"));
	$subjectType = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID = '".$subject['SUBTYPE']."'")) ;

	$lecturer = fillLecturer($lecturer,$_SESSION['lecturer'],$_SESSION['term'],$_SESSION['sy']);
	$section = fillSection($section,$sched['SECTION'],$sched['TERM'],$sched['SCHOOL_YEAR'],$sched['YEAR'],$sched['COURSE']);

	$lectAvailDays = lecturerAvailableDays($_SESSION['lecturer']);
	$subAvailDays = subjectAvailableDays($sched['SUBJECT']);



	$availDayCount = 0;

	for( $i = 0 ; $i < 6 ; $i++ ){

		if( $lectAvailDays[$i] && $subAvailDays[$i]){



			$availDayCount++;
			$availableDay[$i] = 1;
		}
	}


	if($sched['CLASS'] == 1){
		$hour = $subject['LECHOURS'];
	}
	else{
		$hour = $subject['LABHOURS'];
	}
	echo '<br/>

		<label>Slot:</label>
		<select class = "form-control" name="drop_5" id="drop_5" class="aw">
	        <option value=" " disabled="disabled" selected="selected">Select Slot</option>';

		$temp = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$sched['ROOM']."'"));

		$temp1 = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$sched['DAYS']."'"));

		$value = $sched['ROOM'].",".$sched['DAYS'].",".$sched['START_TIME'].",".$sched['END_TIME'];

		echo '<option value = "'.$value.'" selected>'.$temp['ROOM'].' - '.$temp1['DAY_CODE'].' - '.date("h:i A", strtotime($sched['START_TIME'])).'-'.date("h:i A", strtotime($sched['END_TIME'])).'</option>';

		$sql = mysql_query("SELECT * FROM days");

   		while( $dayz = mysql_fetch_array($sql)){

	    	$queryR = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '".$subjectType['ROOMTYPE']."'");

			while( $rooms = mysql_fetch_array($queryR)){
				// echo $rooms[ 'ROOM_ID' ];

				$room = fillRoom($room,$rooms[ 'ROOM_ID' ],$_SESSION['term'],$_SESSION['sy']);

				for( $i = 0 ; $i <= 22 ; $i++ ){

		    		if(compareTime( $mirror[0][$i], $mirror[0][$i + $hour*2],$dayz['DAY_ID'], $lecturer, $section, $room , $availableDay)){

		    			$temp = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".$rooms['ROOM_ID']."'"));
						$temp1 = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$dayz['DAY_ID']."'"));

		    			$value = $rooms[ 'ROOM_ID' ].",".$dayz['DAY_ID'].",".$mirror[0][$i].",".$mirror[0][$i + $hour*2];

		    			echo '<option value = "'.$value.'">'.$temp['ROOM'].' - '.$temp1['DAY_CODE'].' - '.date("h:i A", strtotime($mirror[0][$i])).'-'.date("h:i A", strtotime($mirror[0][$i + $hour*2])).'</option>';

		    		}
		    	}
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
	      $.get(\"reschedfunc.php\", {
			func: \"drop_5\",
			drop_var: $('#drop_5').val()
	      }, function(response){
	        $('#result_5').fadeOut();
	        setTimeout(\"finishAjax_tier_five('result_5', '\"+escape(response)+\"')\", 100);
	      });
	    	return false;
		});
	</script>";


}
if(isset($_GET['func']) && $_GET['func'] == "drop_5") { 
	
   drop_5($_GET['drop_var']); 
}

function drop_5($drop_var)
{  
	session_start();
    include_once('connect.php');

    $id = $drop_var;

    $id = explode(",", $id);

    $_SESSION['room1'] = $id[0];
    $_SESSION['day1'] = $id[1];
    $_SESSION['start1'] = $id[2];
    $_SESSION['end1'] = $id[3];

    printsched(1);

    echo ' <button class = "btn btn-primary" type="submit" name="submitschedule"  value="Submit" >Submit</button>';

}


?>




