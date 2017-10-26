<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT * FROM subject") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['SID'].'">'.$tier['SUBJECT'].'</option>';
		}
}

//**************************************
//     First selection results     //
//**************************************
if(isset($_GET['func']) && $_GET['func'] == "drop_1") { 
   drop_1($_GET['drop_var']); 
}

function drop_1($drop_var)
{  session_start();
	unset($_SESSION['day1']);
	unset($_SESSION['day2']);
    include_once('connect.php');

    $_SESSION['term'] = $_GET['drop_var1'];
    $_SESSION['subject'] = $drop_var;
	$days = mysql_query("SELECT * FROM days");
	$count=mysql_num_rows($days);
	if($count>0){
	echo '<br/><label>Day:</label><select class = "form-control" name="drop_2" id="drop_2" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Day</option>';

		   while($drop_2 = mysql_fetch_array( $days )) 
			{
				echo '<option value="'.$drop_2['DAY_ID'].'">'.$drop_2['DAY_CODE'].'</option>';
			}

			$counter = 1;
			while($counter!=4){
				$day22 = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '$counter'"));
				$counter++;
					$day2nds = $counter+2;
					$day2nd = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '$day2nds'"));
					echo '<option value="'.$day22['DAY_ID'].'-'.$day2nd['DAY_ID'].'">'.$day22['DAY_CODE'].'-'.$day2nd['DAY_CODE'].'</option>';
				
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
      $.get(\"schedfuncspecial.php\", {
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
	echo '<a href = "cursubs.php?course='.$_SESSION['course'].'"><button class = "btn btn-primary" type="button">View Course</button></a>';
}
}


if(isset($_GET['func']) && $_GET['func'] == "drop_2") { 
   drop_2($_GET['drop_var']); 
}
function drop_2($drop_var)
{  session_start();
    include_once('connect.php');
	unset($_SESSION['day1']);
	unset($_SESSION['day2']);
    $day = explode("-",$drop_var);
    if (isset($day[1])){
    	if($day[1]!=""){
    	$_SESSION['day1'] = $day[0];
    	$_SESSION['day2'] = $day[1];    	
    	}
    }
    
    	else $_SESSION['day1'] = $day[0]; 	

	$subtypes = mysql_query("SELECT * FROM subject WHERE SID = '".$_SESSION['subject']."'");
//========================================determine subject type to determine room type===========================================
if(mysql_num_rows($subtypes)>0){
	echo '<br/><label>Time Start:</label><select class = "form-control" name="drop_3" id="drop_3" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Start Time</option>';
			echo 'option value="" selected disabled></option>';
                                                 
                $min=array("00","30");

            for($i=7;$i<18;$i++){
                foreach ($min as $v){
                   echo "<option value='$i:$v'>";
                   echo date("h:i A", strtotime($i.':'.$v));
                   echo "</option>";
                }
            }
	echo '<option value="18:00">';
	echo date("h:i A", strtotime("18:00"));
    echo'</option></select>';

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
      $.get(\"schedfuncspecial.php\", {
		func: \"drop_3\",
		drop_var: $('#drop_3').val()
      }, function(response){
        $('#result_3').fadeOut();
        setTimeout(\"finishAjax_tier_three('result_3', '\"+escape(response)+\"')\", 100);
      });
    	return false;
	});
</script>";
}

else{
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
	echo '<a href = "cursubs.php?course='.$_SESSION['course'].'"><button class = "btn btn-primary" type="button">View Course</button></a>';
}
}


if(isset($_GET['func']) && $_GET['func'] == "drop_3") { 
   drop_3($_GET['drop_var']); 
}

function drop_3($drop_var)
{
	session_start();
	unset($_SESSION['start1']);
	unset($_SESSION['start2']);
	unset($_SESSION['end1']);
	unset($_SESSION['end2']);
	include_once("connect.php");
	$_SESSION['start1']= $drop_var;
	$subtypes = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$_SESSION['subject']."'"));
//========================================determine subject type to determine room type===========================================
	$subtype = $subtypes['SUBTYPE'];
	if ($subtype == 11){
		$lectdepart =  2;
	}
	else if ($subtype == 2){
		$lectdepart =  1;
	}
	else if ($subtype == 5){
		$lectdepart = 3;
	}
	else if ($subtype == 8){
		$lectdepart = 4;
	}
	else{
		$lectdepart = 3;
	}
	
	if(isset($_SESSION['day2'])){
		$lechours = $subtypes['LECHOURS'];
		$labhours = $subtypes['LABHOURS'];
		if ($subtypes['LABHOURS']!=0){
			$day1 = $lechours;
			$day2 = $labhours;
		}
		else{
			$day1 = $lechours/2;
			$day2 = $lechours/2;
		}
		$starttime = date("h:i A", strtotime($drop_var));
		$end = date("H:i", strtotime($drop_var) + $day1*60*60);
		$endtime = date("h:i A", strtotime($end));
		$_SESSION['end1']= $end;
		$_SESSION['start2']= $_SESSION['start1'];
		$end2 = date("H:i", strtotime($drop_var) + $day2*60*60);
		$endtime2 = date("h:i A", strtotime($end2));
		$_SESSION['end2']= $end2;
		echo '<br/><label>Time End:</label><input class = "form-control" value = "'.$endtime.'">';
		echo '<br/><label>Day 2 Time Start:</label><input class = "form-control" value = "'.$starttime.'">';
		echo '<br/><label>Day 2 Time End:</label><input class = "form-control" value = "'.$endtime2.'">';
	}
	else{
		$lechours = $subtypes['LECHOURS'];
		$labhours = $subtypes['LABHOURS'];
		$_SESSION['class1'] = 1;
		if ($subtypes['LABHOURS']!=0){
			$day1 = $lechours;
			$day2 = $labhours;
			$_SESSION['labs'] = 1;
			$_SESSION['class2'] = 2;
		}
		else{
			$day1 = $lechours;		
		}
		$end = date("H:i", strtotime($drop_var) + $day1*60*60);
		$endtime = date("h:i A", strtotime($end));
		echo '<br/><label>Time End:</label><input class = "form-control" value = "'.$endtime.'">';
		$_SESSION['end1'] = $end;
		if(isset($day2)){
			echo '<br/><label>Lab Time Start:</label><input class = "form-control" value = "'.$endtime.'">';
			$end2 = date("H:i", strtotime($drop_var) + $day2*60*60);
			$endtime2 = date("h:i A", strtotime($end2));
			echo '<br/><label>Lab Time End:</label><input class = "form-control" value = "'.$endtime2.'">';		
			$_SESSION['day2'] = $_SESSION['day1'];
			$_SESSION['start2'] = $end;
			$_SESSION['end2'] = $end2;
		}
	}


	
    $lecturer = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = (SELECT DEPARTMENT FROM subjecttype WHERE TID = (SELECT SUBTYPE FROM subject WHERE SID = '".$_SESSION['subject']."'))");

	$count=mysql_num_rows($lecturer);
	if($count>0){


	echo '<br/><label>Lecturer:</label><select class = "form-control" name="drop_4" id="drop_4" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Lecturer</option>';

			while ($lecturers = mysql_fetch_array($lecturer)){
				echo '<option value="'.$lecturers['LECTURER_ID'].'">'.$lecturers['LASTNAME'].' , '.$lecturers['FIRSTNAME'].' '.$lecturers['MIDDLENAME'].'</option>';
	}
	echo '</select> ';
	//echo '<input type="submit" name="submit" class="aw" value="Submit" />';
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
      $.get(\"schedfuncspecial.php\", {
		func: \"drop_4\",
		drop_var: $('#drop_4').val()
      }, function(response){
        $('#result_4').fadeOut();
        setTimeout(\"finishAjax_tier_four('result_4', '\"+escape(response)+\"')\", 100);
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
	echo '<a href = "cursubs.php?course='.$_SESSION['course'].'"><button class = "btn btn-primary" type="button">View Course</button></a>';
}
}

if(isset($_GET['func']) && $_GET['func'] == "drop_4") { 
   drop_4($_GET['drop_var']); 
}

function drop_4($drop_var)
{
	session_start();
	include_once("connect.php");
	$_SESSION['lecturer']= $drop_var;
 	$room = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = (SELECT ROOMTYPENO FROM roomtype WHERE DEPARTMENT = 0)");
	$count=mysql_num_rows($room);
	if($count>0){
		echo '<br/><label>Room:</label><select class = "form-control" name="drop_5" id="drop_5" class="aw">
		      <option value=" " disabled="disabled" selected="selected">Select Room</option>';

				while ($rooms = mysql_fetch_array($room)){
					echo '<option value="'.$rooms['ROOM_ID'].'">'.$rooms['ROOM'].'</option>';
		}
		echo '</select> ';
		if(isset($_SESSION['labs'])){
			$room2=mysql_query("SELECT * FROM room WHERE ROOM_TYPE = (SELECT ROOMTYPENO FROM roomtype WHERE DEPARTMENT = (SELECT DEPARTMENT FROM subjecttype WHERE TID = (SELECT SUBTYPE FROM subject WHERE SID = '".$_SESSION['subject']."')) AND CLASS = 2)");
					$count2=mysql_num_rows($room2);
			if($count2>0){
				echo '<br/><label> Lab Room:</label><select class = "form-control" name="drop_5a" id="drop_5a" class="aw">
				      <option value=" " disabled="disabled" selected="selected">Select Room</option>';
						while ($rooms2 = mysql_fetch_array($room2)){
							echo '<option value="'.$rooms2['ROOM_ID'].'">'.$rooms2['ROOM'].'</option>';
				}
				echo '</select> ';
			}
		}
		echo "<script type=\"text/javascript\">
				
				$('#result_6').hide();
				$('#result_7').hide();
				$('#result_8').hide();
				$('#result_9').hide();
				$('#result_0').hide();

				$('#wait_5').hide();
				$('#drop_5').change(function(){
				  $('#wait_5').show();
				  $('#result_5').hide();
			      $.get(\"schedfuncspecial.php\", {
					func: \"drop_5\",
					drop_var: $('#drop_5').val()";
					if (isset($_SESSION['labs'])) {
						echo ",
						drop_var2:('#drop5a).val()";
					}
					echo "
			      }, function(response){
			        $('#result_5').fadeOut();
			        setTimeout(\"finishAjax_tier_five('result_5', '\"+escape(response)+\"')\", 100);
			      });
			    	return false;
				});
			</script>";	
	}
else{
	echo "<script type=\"text/javascript\">
	$('#result_5').hide();
	$('#result_6').hide();
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();
</script>";
	echo '<a href = "cursubs.php?course='.$_SESSION['course'].'"><button class = "btn btn-primary" type="button">View Course</button></a>';
}
}


if(isset($_GET['func']) && $_GET['func'] == "drop_5") { 
   drop_5($_GET['drop_var']); 
}

function drop_5($drop_var)
{
	session_start();
	unset($error);
	include("connect.php");
	$_SESSION['room1']=$drop_var;
	$sy = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear ORDER BY SY_ID"));
	$_SESSION['sy'] = $sy['SY_ID'];
	if (isset($_GET['drop_var2'])) {
		$_SESSION['room2'] = $_GET['drop_var2'];
	}

	if(!isset($_SESSION['day2'])){
		$checkroom = mysql_query("SELECT * FROM schedule WHERE ROOM = '".$_SESSION['room1']."' AND SCHOOL_YEAR = '".$_SESSION['sy']."' AND TERM = '".$_SESSION['term']."' AND DAYS = '".$_SESSION['day1']."'");
		if(mysql_num_rows($checkroom)>0){
			while($checkrooms = mysql_fetch_array($checkroom)){
				$start1 = date("H:i", strtotime($chechrooms['START_TIME']));
				$end1 = date("H:i", strtotime($chechrooms['END_TIME']));
				if ($_SESSION['start1']>=$start1&&$_SESSION['start1']<$end1){
					$roomhit = 1;
					$error = 1;
				}
				else if ($_SESSION['end1']>$start1&&$_SESSION['end1']<=$end1){
					$roomhit = 1;
					$error = 1;
				}
			}
		}

		$checklect = mysql_query("SELECT * FROM schedule WHERE LECTURER = '".$_SESSION['lecturer']."' AND SCHOOL_YEAR = '".$_SESSION['sy']."'AND TERM = '".$_SESSION['term']."'");
		if(mysql_num_rows($checklect)>0){
			while($checklects = mysql_fetch_array($checklect)){
				$start1 = date("H:i", strtotime($checklects['START_TIME']));
				$end1 = date("H:i", strtotime($checklects['END_TIME']));
				if ($_SESSION['start1']>=$start1&&$_SESSION['start1']<$end1){
					$lecthit = 1;
					$error = 1;
				}
				else if ($_SESSION['end1']>$start1&&$_SESSION['end1']<=$end1){
					$lecthit = 1;
					$error = 1;
				}
			}
		}
	}

	else{
		$checkroom = mysql_query("SELECT * FROM schedule WHERE ROOM = '".$_SESSION['room1']."' AND SCHOOL_YEAR = '".$_SESSION['sy']."'AND TERM = '".$_SESSION['term']."'");
		if(mysql_num_rows($checkroom)>0){
			while($checkrooms = mysql_fetch_array($checkroom)){
				$start1 = date("H:i", strtotime($chechrooms['START_TIME']));
				$end1 = date("H:i", strtotime($chechrooms['END_TIME']));
				if ($_SESSION['start1']>=$start1&&$_SESSION['start1']<$end1){
					$roomhit = 1;
					$error = 1;
				}
				else if ($_SESSION['end1']>$start1&&$_SESSION['end1']<=$end1){
					$roomhit = 1;
					$error = 1;
				}
			}
		}

		$checklect = mysql_query("SELECT * FROM schedule WHERE LECTURER = '".$_SESSION['lecturer']."' AND SCHOOL_YEAR = '".$_SESSION['sy']."'AND TERM = '".$_SESSION['term']."'");
		if(mysql_num_rows($checklect)>0){
			while($checklects = mysql_fetch_array($checklect)){
				$start1 = date("H:i", strtotime($checklects['START_TIME']));
				$end1 = date("H:i", strtotime($checklects['END_TIME']));
				if ($_SESSION['start1']>=$start1&&$_SESSION['start1']<$end1){
					$lecthit = 1;
					$error = 1;
				}
				else if ($_SESSION['end1']>$start1&&$_SESSION['end1']<=$end1){
					$lecthit = 1;
					$error = 1;
				}
			}
		}

		$checkroom2 = mysql_query("SELECT * FROM schedule WHERE ROOM = '".$_SESSION['room2']."' AND SCHOOL_YEAR = '".$_SESSION['sy']."'AND TERM = '".$_SESSION['term']."'");
		if(mysql_num_rows($checkroom2)>0){
			while($checkrooms2 = mysql_fetch_array($checkroom2)){
				$start2 = date("H:i", strtotime($chechrooms2['START_TIME']));
				$end2 = date("H:i", strtotime($chechrooms2['END_TIME']));
				if ($_SESSION['start1']>=$start2&&$_SESSION['start1']<$end2){
					$roomhit2 = 1;
					$error = 1;
				}
				else if ($_SESSION['end1']>$start2&&$_SESSION['end1']<=$end2){
					$roomhit2 = 1;
					$error = 1;
				}
			}
		}

		$checklect2 = mysql_query("SELECT * FROM schedule WHERE LECTURER = '".$_SESSION['lecturer']."' AND SCHOOL_YEAR = '".$_SESSION['sy']."'AND TERM = '".$_SESSION['term']."'");
		if(mysql_num_rows($checklect1)>0){
			while($checklects2 = mysql_fetch_array($checklect2)){
				$start3 = date("H:i", strtotime($checklects2['START_TIME']));
				$end3 = date("H:i", strtotime($checklects2['END_TIME']));
				if ($_SESSION['start1']>=$start3&&$_SESSION['start1']<$end3){
					$lecthit2 = 1;
					$error = 1;
				}
				else if ($_SESSION['end1']>$start3 && $_SESSION['end1']<=$end3){
					$lecthit2 = 1;
					$error = 1;
				}
			}
		}
	}
	echo '<br/><button class = "btn btn-primary" type="submit" name="submitschedule" value="Submit" ';
	if(isset($error)){echo "disabled";}	
	echo '>Submit</button>';
}
?>