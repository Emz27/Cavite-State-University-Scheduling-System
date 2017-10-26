<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT * FROM course") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['CID'].'">'.$tier['COURSE'].'</option>';
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
    $_SESSION['course'] = $drop_var;
    include_once('connect.php');
	$result = mysql_query("SELECT * FROM year")		 
	or die(mysql_error());
	$count=mysql_num_rows($result);
	if($count>0){
	echo '<br/>
			<label>Year:</label><select class = "form-control" name="drop_2" id="drop_2">
	      <option value=" " disabled="disabled" selected="selected">Select Year</option>';

		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['YEAR_ID'].'">'.$drop_2['YEAR'].'</option>';
			}
	
	echo '</select>';

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
      $.get(\"schedfuncmanual.php\", {
		func: \"drop_2\",
		drop_var: $('#drop_2').val()
      }, function(response){
        $('#result_2').fadeOut();
        setTimeout(\"finishAjax2('result_2', '\"+escape(response)+\"')\", 400);
      });
    	return false;
	});
</script>";
}
else{
echo "cannot be";
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

	//echo '<input type="submit"  name="submit" value="Submit" />';

}
}

//second
if(isset($_GET['func']) && $_GET['func'] == "drop_2") { 
   drop_2($_GET['drop_var']); 
}

function drop_2($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['year'] = $drop_var;
	$result = mysql_query("SELECT * FROM SECTION") 
	or die(mysql_error());
	$count=mysql_num_rows($result);
	if($count>0){
	echo '<br/>
			<label>Section:</label><select class = "form-control" name="drop_3" id="drop_3" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Choose Section</option>';

		   while($drop_3 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_3['SECTION_ID'].'">'.$drop_3['SECTION'].'</option>';
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
      $.get(\"schedfuncmanual.php\", {
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
	
	 echo '<input type="submit" name="submit" value="Submit" />';

}
}





//**************************************
//     Third selection results     //
//**************************************
if(isset($_GET['func']) && $_GET['func'] == "drop_3") { 
   drop_3($_GET['drop_var']); 
}

function drop_3($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['section']=$drop_var;
	$result = mysql_query("SELECT * FROM term") 
	or die(mysql_error());
	$count=mysql_num_rows($result);
	if($count>0){
	echo '<br/><label>Term:</label><select class = "form-control" name="drop_4" id="drop_4" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Term</option>';

		   while($drop_4 = mysql_fetch_array( $result )) 
			{
				echo '<option value="'.$drop_4['TERM_CODE'].'">'.$drop_4['TERM'].'</option>';
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
      $.get(\"schedfuncmanual.php\", {
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
{  session_start();
    include_once('connect.php');
    $_SESSION['term'] = $drop_var;
	
	echo '<br/><label>Subject:</label><select class = "form-control" name="drop_5" id="drop_5" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Subject</option>';

				$schedcheckers = mysql_query("SELECT * FROM schedule WHERE SCHOOL_YEAR = '".$_SESSION['sy']."'")or die(mysql_error());
			    if($schedcheckers){
			    	$m = 0;
			    	while ($row = mysql_fetch_array($schedcheckers)) 
			    	{
			    		$sections = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE CM_ID = '".$row['CM_ID']."'"));
			 		 	if ($sections['SECTION']==$_SESSION['section'])
			 		 	{
			 		 		$subtake = $subtake."-".$row['SUBJECT'];
			 		 	}			 		 
			    	}
			    }

			    $curric = mysql_query("SELECT * FROM curriculum WHERE COURSE = '".$_SESSION['course']."' AND YEAR_OFF = '".$_SESSION['year']."' AND TERM = '".$drop_var."'");
			    $sub = explode("-", $subtake);
			    $m = count($sub);
			    while($rows = mysql_fetch_array($curric)){
			    	$hit = 0;
			    	for ($i=0; $i <= $m; $i++){
			    		if ($sub[$i]==$rows['SUBJECT']){
			    			$hit=1;
			    		}
			    	}
			    	if($hit == 0){	
			    			$results = mysql_query("SELECT * FROM subject WHERE SID = '".$rows['SUBJECT']."'")or die(mysql_error());
			 				$resulted = mysql_fetch_array($results); 
			 			 	echo '<option value="'.$resulted['SID'].'">'.$resulted['SUBJECT'].'</option>';			 			
			    	}
			    	$time = 1;
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
      $.get(\"schedfuncmanual.php\", {
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

echo '<br/><a href = "addcursub.php?course='.$_SESSION['course'].'&year='.$_SESSION['year'].'&term='.$_SESSION['term'].'"><button class = "btn btn-primary" type="button">Add Subjects to Curriculum</button></a>';
}
}

if(isset($_GET['func']) && $_GET['func'] == "drop_5") { 
   drop_5($_GET['drop_var']); 
}

function drop_5($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['subject'] = $drop_var;

	$subtypes = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$drop_var."'"));
//========================================determine subject type to determine room type===========================================
//========================================determine subject type to determine room type===========================================
	$subtype = $subtypes['SUBTYPE'];
	if ($subtype == 11){
		$roomtype = 1;
		$lectdepart =  2;
	}
	else if ($subtype == 2){
		$roomtype = 2;
		$lectdepart =  1;
	}
	else if ($subtype == 5){
		$roomtype = 4;
		$lectdepart = 3;
	}
	else if ($subtype == 8){
		$roomtype = 5;
		$lectdepart = 4;
	}
	else{
		$roomtype = 3;
		$lectdepart = 3;
	}

	$rooms = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '$roomtype' AND COURSE = '".$_SESSION['course']."'");
	$count=mysql_num_rows($rooms);
	if($count>0){
	echo '<br/><label>Room:</label><select class = "form-control" name="drop_6" id="drop_6" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Room</option>';

		   while($drop_6 = mysql_fetch_array( $rooms )) 
			{
				echo '<option value="'.$drop_6['ROOM_ID'].'">'.$drop_6['ROOM'].'</option>';
			}
	
	echo '</select> ';
	//echo '<input type="submit" name="submit" class="aw" value="Submit" />';
    echo "<script type=\"text/javascript\">
	
	$('#result_5').hide();
	$('#result_6').hide();
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();

	$('#wait_6').hide();
	$('#drop_6').change(function(){
	  $('#wait_6').show();
	  $('#result_6').hide();
      $.get(\"schedfuncmanual.php\", {
		func: \"drop_6\",
		drop_var: $('#drop_6').val()
      }, function(response){
        $('#result_6').fadeOut();
        setTimeout(\"finishAjax_tier_six('result_6', '\"+escape(response)+\"')\", 100);
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

if(isset($_GET['func']) && $_GET['func'] == "drop_6") { 
   drop_6($_GET['drop_var']); 
}

function drop_6($drop_var)
{  session_start();
    include_once('connect.php');


    $schedcheck = mysql_query("SELECT * from schedule WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' AND TERM = '".$_SESSION['term']."'");
	$nums = mysql_num_rows($schedcheck);
	if($nums >0){
				
					$aaa = mysql_query("SELECT * FROM roommanager WHERE ROOM = '".$drop_var."' ORDER BY DT_ID ASC");
					while($dt = mysql_fetch_array($aaa)){
						$getch = 0;
						while($hits = mysql_fetch_array($schedcheck)){
							if ($dt['ROOMMAN_ID']==$hits['RM_ID']){
								$getch = 1;
								break;
							}
						}
							if ($getch == 0){
								$rm = $dt['ROOMMAN_ID'];
								break; 
							}
					}
				}
			else{ 
				$dt = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOM = '".$drop_var."' ORDER BY DT_ID ASC"));
				$rm = $dt['ROOMMAN_ID'];
			}
					
	$dts = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOMMAN_ID = '$rm'"));
	$dt = $dts['DT_ID'];

    $_SESSION['room'] = $dts['ROOMMAN_ID'];
    $daytime = mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = '$dt'");

	//$rooms = mysql_query("SELECT * FROM room WHERE ROOM_TYPE = '$roomtype'");
	$count=mysql_num_rows($daytime);
	if($count>0){
	echo '<br/><label>Day & Time:</label><select class = "form-control" name="drop_7" id="drop_7" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Day & Time</option>';
			
			while ($daytimes = mysql_fetch_array($daytime)){
				 $hit = 0;
				 for ($i = 0; $i<count($rm);$i++){
					if ($daytimes['ROOMMAN_ID']==$rm[$i])
					{
						$hit = 1;
					}
				}
				if($hit!=1){
					$day = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$daytimes['DAY']."'"));
					echo '<option value="'.$daytimes['DT_ID'].'">'.$day['DAY'].$daytimes['START_TIME']."-".$daytimes['END_TIME'].'</option>';
				}
			}
	echo '</select> ';
	//echo '<input type="submit" name="submit" class="aw" value="Submit" />';
    echo "<script type=\"text/javascript\">
	
	$('#result_6').hide();
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();

	$('#wait_7').hide();
	$('#drop_7').change(function(){
	  $('#wait_7').show();
	  $('#result_7').hide();
      $.get(\"schedfuncmanual.php\", {
		func: \"drop_7\",
		drop_var: $('#drop_7').val()
      }, function(response){
        $('#result_7').fadeOut();
        setTimeout(\"finishAjax_tier_seven('result_7', '\"+escape(response)+\"')\", 100);
      });
    	return false;
	});
</script>";
}
else{
	echo "<script type=\"text/javascript\">

	$('#result_6').hide();
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();
</script>";
	echo '<a href = "cursubs.php?course='.$_SESSION['course'].'"><button class = "btn btn-primary" type="button">View Course</button></a>';
}
}
if(isset($_GET['func']) && $_GET['func'] == "drop_7") { 
   drop_7($_GET['drop_var']); 
}	

function drop_7($drop_var)
{  session_start();
    include_once('connect.php');
    $_SESSION['dt'] = $drop_var;

	$subtypes = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$_SESSION['subject']."'"));
//========================================determine subject type to determine room type===========================================
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
	


    $lecturer = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = '".$lectdepart."'");

	$count=mysql_num_rows($lecturer);
	if($count>0){


	echo '<br/><label>Lecturer:</label><select class = "form-control" name="drop_8" id="drop_8" class="aw">
	      <option value=" " disabled="disabled" selected="selected">Select Lecturer</option>';

			while ($lecturers = mysql_fetch_array($lecturer)){

				$schedcheck = mysql_query("SELECT * from schedule WHERE SCHOOL_YEAR = '".$_SESSION['sy']."' AND TERM = '".$_SESSION['term']."'");
				$nums = mysql_num_rows($schedcheck);
				if($nums >0){
							
								$lects = mysql_query("SELECT * FROM lectmanager WHERE DT_ID = '".$drop_var."' AND LECTURER = '".$lecturers['LECTURER_ID']."' ORDER BY DT_ID ASC");
								while($dt = mysql_fetch_array($lects)){
									$getch = 0;
									while($hits = mysql_fetch_array($schedcheck)){
										if ($dt['LM_ID']==$hits['LM_ID']){
											$getch = 1;
											break;
										}
									}
										if ($getch == 0){
											$lm = $dt['LM_ID'];
											break; 
										}
								}
							}
						else{ 
							$lects = mysql_query("SELECT * FROM lectmanager WHERE DT_ID = '".$drop_var."' AND LECTURER = '".$lecturers['LECTURER_ID']."' ORDER BY DT_ID ASC");
							$lm = $dt['LM_ID'];
						}
				if($lm)
				echo '<option value="'.$lm.'">'.$lecturers['LASTNAME'].",".$lecturers['FIRSTNAME'].'</option>';
			}
	echo '</select> ';
	//echo '<input type="submit" name="submit" class="aw" value="Submit" />';
    echo "<script type=\"text/javascript\">
	
	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();

	$('#wait_8').hide();
	$('#drop_8').change(function(){
	  $('#wait_8').show();
	  $('#result_8').hide();
      $.get(\"schedfuncmanual.php\", {
		func: \"drop_8\",
		drop_var: $('#drop_8').val()
      }, function(response){
        $('#result_8').fadeOut();
        setTimeout(\"finishAjax_tier_eight('result_8', '\"+escape(response)+\"')\", 100);
      });
    	return false;
	});
</script>";
}
else{
	echo "<script type=\"text/javascript\">

	$('#result_7').hide();
	$('#result_8').hide();
	$('#result_9').hide();
	$('#result_0').hide();
</script>";
	echo '<a href = "cursubs.php?course='.$_SESSION['course'].'"><button class = "btn btn-primary" type="button">View Course</button></a>';
}
}

if(isset($_GET['func']) && $_GET['func'] == "drop_8") { 
   drop_8($_GET['drop_var']); 
}

function drop_8($drop_var)
{
	session_start();
	include("connect.php");
	$_SESSION['lecturer']=$drop_var;
	echo '<br/><button class = "btn btn-primary" type="submit" name="submitschedule"  value="Submit" >Submit</button>';
}

?>