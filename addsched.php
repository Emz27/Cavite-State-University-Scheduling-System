<?php

	session_start();
	include("weblock.php");
	include("header.php");
	include("schedfunc.php");

	$sy = date("Y")."-".(date("Y")+1);


	$query = mysql_query("SELECT * FROM schoolyear WHERE SY = '".$sy."'");

	if(mysql_num_rows($query) == 0){

		mysql_query("INSERT INTO `schoolyear`(`SY`) VALUES (`".$sy."`)");
	}

	$result = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear WHERE SY = '".$sy."'"));

	$_SESSION['sy'] = $result['SY_ID'];

?>
<!--<script type="text/javascript" src="js/schedcheck.js"></script>-->
<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script type = "text/javascript" 
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {
	$('#wait_1').hide();
	$('#drop_1').change(function(){
	  $('#wait_1').show();
	  $('#result_1').hide();
      $.get("schedfunc.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
      });
    	return false;
	});
});

function finishAjax(id, response) {

  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
  
}
function finishAjax2(id, response) {
  $('#wait_2').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_three(id, response) {
  $('#wait_3').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_four(id, response) {
  $('#wait_4').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_five(id, response) {
  $('#wait_5').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_six(id, response) {
  $('#wait_6').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}

</script>
<?php

function insertsched($sched,$sy,$term,$course,$year,$section,$subject,$room,$day,$start,$end,$class,$lect){
	
	//$day = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = (SELECT DT_ID FROM lectmanager WHERE LM_ID = '".$lect."')"));
	$result = mysql_query("INSERT INTO `schedule`(`SCHED_CODE`, `SCHOOL_YEAR`, `TERM`, `COURSE`, `YEAR`, `SECTION`, `SUBJECT`, `ROOM`, `DAYS`, `START_TIME`, `END_TIME`, `CLASS`, `LECTURER`) 
							VALUES ('$sched','$sy','$term','$course','$year','$section','$subject','$room','$day','$start','$end','$class','$lect')"); 
}
if (isset($_POST['submitschedule'])){

	include_once("connect.php");
	$SCHED_CODE = mysql_fetch_array(mysql_query("SELECT SCHED_CODE FROM schedule ORDER BY SCHED_CODE DESC"));
	$sched = $SCHED_CODE['SCHED_CODE']+1;

		//$courses = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE COURSE_CODE = '".$_SESSION['course']."'"));
		if(isset($_SESSION['course'])) $course = $_SESSION['course'];
		if(isset($_SESSION['year'])) $year = $_SESSION['year'];
		if(isset($_SESSION['section'])) $section = $_SESSION['section'];
		if(isset($_SESSION['term'])) $term = $_SESSION['term'];
		if(isset($_SESSION['sy'])) $sy = $_SESSION['sy'];
 		if(isset($_SESSION['subject'])) $subject = $_SESSION['subject'];
 		if(isset($_SESSION['lecturer'])) $lect = $_SESSION['lecturer'];
 		if(isset($_SESSION['room1'])) $room1 = $_SESSION['room1'];
 		if(isset($_SESSION['room2'])) $room2 = $_SESSION['room2'];
 		if(isset($_SESSION['class'])) $class = $_SESSION['class'];
 		if(isset($_SESSION['class1'])) $class1 = $_SESSION['class1'];
 		if(isset($_SESSION['class2'])) $class2 = $_SESSION['class2'];
 		if(isset($_SESSION['day1'])) $day1 = $_SESSION['day1'];
 		if(isset($_SESSION['day2'])) $day2 = $_SESSION['day2'];
 		if(isset($_SESSION['start1'])) $start1 = $_SESSION['start1'];
 		if(isset($_SESSION['start2'])) $start2 = $_SESSION['start2'];
 		if(isset($_SESSION['end1']))  $end1 = $_SESSION['end1'];
 		if(isset($_SESSION['end2'])) $end2 = $_SESSION['end2'];

 		insertsched($sched,$sy,$term,$course,$year,$section,$subject,$room1,$day1,$start1,$end1,$class1,$lect);
 		if( !isset($_SESSION['one']) || isset($_SESSION['both']))insertsched($sched,$sy,$term,$course,$year,$section,$subject,$room2,$day2,$start2,$end2,$class2,$lect);

 		if(isset($_SESSION['one']))unset( $_SESSION['one'] );
 		if(isset($_SESSION['both']))unset( $_SESSION['both'] );

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



}
?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="home.php">Home</a>
            </li>
            <li>
                <a href="schedule.php">Schedule</a>
            </li>
            <li>
                <a href="#">Add Schedule</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-alt"></i> Add Schedule</h2>

        <div class="box-icon">
           <!--  <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->

		<div class="page-wrapper white">

			<form method="POST" action="">
			<label>Course:</label>
			<select class="form-control" name="drop_1" id="drop_1" >
    
			      <option value="" selected="selected" disabled="disabled">Select Course</option>
			      
			      <?php getTierOne(); ?>
			    
			</select> 
			    
			    <span id="wait_1" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_1" style="display: none;"></span>
			    <span id="wait_2" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_2" style="display: none;"></span> 
			    <span id="wait_3" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_3" style="display: none;"></span>
			    <span id="wait_4" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_4" style="display: none;"></span>
			    <span id="wait_5" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_5" style="display: none;"></span>
			    <span id="wait_6" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_6" style="display: none;"></span>
			    <span id="wait_7" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
				</div>
			</form>
		</div>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->





<!--/row-->
    </div><!--/#content.col-md-0-->
</div>
<?php
	include("footer.php");
?>