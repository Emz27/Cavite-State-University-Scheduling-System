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
function compareTime($startTime,$endTime,$avoid,$lecturer,$section,$room,$availableDay){



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

		if($i == $avoid -1)continue;
	
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
				return $day;
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
	$result = mysql_query("SELECT * FROM course") 
	or die();

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['CID'].'">'.$tier['COURSE'].'</option>';
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
{  
	session_start();
    include_once('connect.php');


    $_SESSION['section'] = $drop_var;
	
	echo '<br/>
		<label>Subject:</label>
		<select class = "form-control" name="drop_5" id="drop_5" class="aw">
	        <option value=" " disabled="disabled" selected="selected">Select Subject</option>';
				$curric = mysql_query("SELECT * FROM curriculum 
										WHERE COURSE = '".$_SESSION['course']."' 
										AND YEAR_OFF = '".$_SESSION['year']."' 
										AND TERM = '".$_SESSION['term']."'") or die();
			   
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
if(isset($_GET['func']) && $_GET['func'] == "drop_5") { 
   drop_5($_GET['drop_var']); 
}

function drop_5($drop_var)
{  
	session_start();
    include_once('connect.php');

    $_SESSION['subject'] = $drop_var;


    $subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID ='".$_SESSION['subject']."'"));



    // $subtype = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID ='".$subject['SUBTYPE']."'"));

    if( $subject['DEPARTMENT'] == 0 ){
    	$sql = mysql_query("SELECT * FROM lecturer");
    }
    else{
    	$sql = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = '".$subject['DEPARTMENT']."'");
    }
	
	echo'<br/>	
		<label>Lecturer:</label>
		<select class = "form-control" name = "drop_6" id="drop_6" class="aw">
		<option selected hidden disabled>';

		while($lecturers = mysql_fetch_array($sql)){
			$lecturerObtained = 1;

			echo'<option value = '.$lecturers['LECTURER_ID'].'>'.$lecturers['LASTNAME'].' , '.$lecturers['FIRSTNAME'].' '.$lecturers['MIDDLENAME'].'</option>';
		}

	echo'</select>';

	if (!isset($lecturerObtained)){


		 	echo '<br/><div class = "alert alert-danger">Sorry No Lecturers Available from the Department for the Subject</div><br/><a href="lecturer.php"><button class = "btn btn-primary" type="button">Add Lecturer</button></a>';
		 	return 0;


	}

	echo "<script type=\"text/javascript\">
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

	if(!isset($time)){
		echo "<script type=\"text/javascript\">

		$('#result_6').hide();
		$('#result_7').hide();
		$('#result_8').hide();
		$('#result_9').hide();
		$('#result_0').hide();
	</script>";
}


}


///////////////////////////////////////////////////////////////////////////////FINDROOM///FINDROOM
///////////////////////////////////////////////////////////////////////////////FINDROOM///FINDROOM
///////////////////////////////////////////////////////////////////////////////FINDROOM///FINDROOM

if(isset($_GET['func']) && $_GET['func'] == "drop_6") { 
   drop_6($_GET['drop_var']); 
}

function drop_6($drop_var)
{
	session_start();
    include_once('connect.php');
    if(isset($_SESSION['one']))unset( $_SESSION['one'] );
	if(isset($_SESSION['room1'])) unset( $_SESSION['room1']);
	if(isset($_SESSION['room2'])) unset( $_SESSION['room2']);
	if(isset($_SESSION['class'])) unset( $_SESSION['class']);
	if(isset($_SESSION['class1'])) unset( $_SESSION['class1']);
	if(isset($_SESSION['class2'])) unset( $_SESSION['class2']);
	if(isset($_SESSION['day1'])) unset( $_SESSION['day1']);
	if(isset($_SESSION['day2'])) unset( $_SESSION['day2']);
	if(isset($_SESSION['start1'])) unset( $_SESSION['start1']);
	if(isset($_SESSION['start2'])) unset( $_SESSION['start2']);
	if(isset($_SESSION['end1']))  unset( $_SESSION['end1']);
	if(isset($_SESSION['end2'])) unset( $_SESSION['end2']);

	$_SESSION['lecturer'] = $drop_var;


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



	$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$_SESSION['subject']."'"));

	$subjectType = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID = '".$subject['SUBTYPE']."'")) ;


	$opening = "07:00";
	$closing = "18:00";

	$avoid = -1;

	$hour = array(0,0);
	$rType = array(0,0);
	$startTime = array("","");
	$endTime = array("","");
	$day = array(0,0);
	$fRoom = array(0,0);
	$class = array(0,0);

	$lectAvailDays = lecturerAvailableDays($_SESSION['lecturer']);
	$subAvailDays = subjectAvailableDays($_SESSION['subject']);
	// for( $i = 0 ; $i < 6 ; $i++ ){
	// 	echo $lectAvailDays[$i]."</br>";
		
	// }
	// for( $i = 0 ; $i < 6 ; $i++ ){
	// 	echo $subAvailDays[$i]."</br>";
		
	// }

	$availDayCount = 0;

	for( $i = 0 ; $i < 6 ; $i++ ){

		if( $lectAvailDays[$i] && $subAvailDays[$i]){
			$availDayCount++;
			$availableDay[$i] = 1;
		}
	}
	// for( $i = 0 ; $i < 6 ; $i++ ){
	// 	echo $availableDay[$i]."</br>";
		
	// }

	if($availDayCount == 1){
		$_SESSION['one'] = 1;
	}

	




	if( $subject['LECHOURS'] > 0 && $subject['LABHOURS'] > 0 ){



		$hour[0] = $subject['LECHOURS'];
		$hour[1] = $subject['LABHOURS'];

		$rType[0] = 1;
		$rType[1] = $subjectType['ROOMTYPE'];
		$_SESSION['class1'] = 1;
		$_SESSION['class2'] = 2;
		if(isset($_SESSION['one']))$_SESSION['both'] = 1;


	}
	else if( $subject['LECHOURS'] > 0 ){

		if( $subject['LECHOURS'] <= 2 || isset($_SESSION['one'])){

			$hour[0] = $subject['LECHOURS'];

			$rType[0] = 1;

			$_SESSION['class1'] = 1;

			$_SESSION['one'] = 1;


		}
		else{

			$hour[0] = $subject['LECHOURS'];
			$hour[1] = $hour[0]/2;

			$rType[0] = 1;
			$rType[1] = 1;
			$_SESSION['class1'] = 1;
			$_SESSION['class2'] = 1;


		}
	}
	else if( $subject['LABHOURS'] > 0 ){

			$hour[0] = $subject['LABHOURS'];

			echo $hour[0];

			$rType[0] = $subjectType['ROOMTYPE'];

			$_SESSION['class1'] = 2;

			$_SESSION['one'] = 1;

	}
	

	$lecturer = fillLecturer($lecturer,$drop_var,$_SESSION['term'],$_SESSION['sy']);

	$section = fillSection($section,$_SESSION['section'],$_SESSION['term'],$_SESSION['sy'],$_SESSION['year'],$_SESSION['course']);



		for( $i = 0; $i <= 1 ; $i++ ){

			$queryR = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '".$rType[$i]."'");

			while( $rooms = mysql_fetch_array($queryR)){
				// echo $rooms[ 'ROOM_ID' ];

				$room = fillRoom($room,$rooms[ 'ROOM_ID' ],$_SESSION['term'],$_SESSION['sy']);


				
				for( $j = 0 ; $j <= 22 ; $j++ ){

					if( strtotime($mirror[0][ $j ]) + $hour[ $i ]*60*60  > strtotime($closing) ){

						break;
					}
					$day[$i] = compareTime( $mirror[0][$j], $mirror[0][$j + $hour[$i]*2],$avoid, $lecturer, $section, $room , $availableDay);
					if( $day[$i] != 0  ){
						// if(isset($takeAbreak) ){

						// 	if($takeAbreak != 0 ){
						// 		$takeAbreak--;
						// 		continue;
						// 	}
							
						// }
						// if(!isset( $takeAbreak ) && breakTime($mirror[0][$j + $hour[$i]*2])){


						//  	if($takeAbreak = breakTime($mirror[0][$j + $hour[$i]*2]) )continue;

						// }
						$startTime[$i] = $mirror[0][$j];
						$endTime[$i] = $mirror[0][$j + $hour[$i]*2];
						$froom[$i] = $rooms['ROOM_ID'];
						$avoid = $day[$i];
						if(isset($_SESSION['one']) && $subject['LECHOURS'] > 0 && $subject['LECHOURS'] > 0){


							for( $k = $j ; $k <= ($j+$hour[$i]) ; $k++ ){

								$section[$day[$i]][$k] = $mirror[0][$k];


							}

							$avoid = -1;	
						} 	
						$proceed = 1;

						break;
					}

					// else if($i == 1){

					// 	if( $day[$i] == $avoid ){
					// 		$startTime[$i] = "";
					// 		$endTime[$i] = "";
					// 		$froom[$i] = -1;

					// 		continue;
					// 	}
					// }
					
				}
				if(isset($proceed))break;

			}
			if(isset($proceed))unset($proceed);
			if(isset($takeAbreak))unset($takeAbreak);

			if(isset($_SESSION['one']) &&( $subject['LECHOURS'] == 0 || $subject['LECHOURS'] == 0)){
				break;
			}
		}
		if( isset($froom[0]) && isset($day[0]) && isset($startTime[0]) && isset($endTime[0])){


			$_SESSION['room1']= $froom[0];
		
			$_SESSION['day1']= $day[0];

			$_SESSION['start1']= $startTime[0];
			
			$_SESSION['end1']= $endTime[0];
			
			printsched(1);


			if( isset($froom[1]) && isset($day[1]) && isset($startTime[1]) && isset($endTime[1])){

				$_SESSION['room2'] = $froom[1];

				$_SESSION['day2'] = $day[1];

				$_SESSION['start2'] = $startTime[1];

				$_SESSION['end2'] = $endTime[1];

				printsched(2);
				
			}
			else{
				if(!isset($_SESSION['one'])){

					echo '<br/><div class = "alert alert-danger">Cannot Find Available Room and Time Slot for the Lecturer</div><br/>';
					return 0;
				}
			}


		}
		else{
			echo '<br/><div class = "alert alert-danger">Cannot Find Available Room and Time Slot for the Lecturer</div><br/>';
			return 0;
		}
	echo '<br/><button class = "btn btn-primary" type="submit" name="submitschedule"  value="Submit" >Submit</button>';
}



?>




