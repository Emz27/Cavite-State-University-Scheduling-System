<?php

	session_start();
	include("weblock.php");
	include("header.php");
	include("schedfuncmanual.php");
	$result = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear ORDER BY SY_ID DESC"));
	$_SESSION['sy']=$result['SY_ID'];
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
      $.get("schedfuncmanual.php", {
		func: "drop_1",
		drop_var: $('#drop_1').val()
      }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 200);
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
function finishAjax_tier_seven(id, response) {
  $('#wait_6').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}
function finishAjax_tier_eight(id, response) {
  $('#wait_6').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
}

</script>
<?php

function insertsched($sched,$subject,$term,$sy,$room,$lect,$class){
	//echo $subject.$course.$section.$term.$days.$start.$end.$year.$class.$room.$sy;
	$day = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = (SELECT DT_ID FROM lectmanager WHERE LM_ID = '".$lect."')"));
	// if ($day['DAY']==1){
		$result = mysql_query("INSERT INTO schedule(`SCHED_CODE`, `SUBJECT`, `TERM`, `SCHOOL_YEAR`, `RM_ID`, `LM_ID`, `CM_ID`) VALUES ('$sched','$subject','$term','$sy','$room','$lect','$class')"); 
		// $secondday = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE START_TIME = '".$day['START_TIME']."' AND DAY = '4'"));
		// $result1 = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
		// $result3 = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
		// $result2 = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
		// $superresult = mysql_query("INSERT INTO schedule(`SCHED_CODE`, `SUBJECT`, `TERM`, `SCHOOL_YEAR`, `RM_ID`, `LM_ID`, `CM_ID`) VALUES ('$sched','$subject','$term','$sy','".$result1['ROOMMAN_ID']."','".$result2['LM_ID']."','".$result3['CM_ID']."')"); 
	// }	
	// else if ($day['DAY']==2){
	// 	$result = mysql_query("INSERT INTO schedule(`SCHED_CODE`, `SUBJECT`, `TERM`, `SCHOOL_YEAR`, `RM_ID`, `LM_ID`, `CM_ID`) VALUES ('$sched','$subject','$term','$sy','$room','$lect','$class')"); 
	// 	$secondday = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE START_TIME = '".$day['START_TIME']."' AND DAY = '5'"));
	// 	$result1 = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
	// 	$result3 = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
	// 	$result2 = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
	// 	$superresult = mysql_query("INSERT INTO schedule(`SCHED_CODE`, `SUBJECT`, `TERM`, `SCHOOL_YEAR`, `RM_ID`, `LM_ID`, `CM_ID`) VALUES ('$sched','$subject','$term','$sy','".$result1['ROOMMAN_ID']."','".$result2['LM_ID']."','".$result3['CM_ID']."')"); 
	// }	
	// else if ($day['DAY']==3){
	// 	$result = mysql_query("INSERT INTO schedule(`SCHED_CODE`, `SUBJECT`, `TERM`, `SCHOOL_YEAR`, `RM_ID`, `LM_ID`, `CM_ID`) VALUES ('$sched','$subject','$term','$sy','$room','$lect','$class')"); 
	// 	$secondday = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE START_TIME = '".$day['START_TIME']."' AND DAY = '6'"));
	// 	$result1 = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
	// 	$result3 = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
	// 	$result2 = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE `DT_ID`='".$secondday['DT_ID']."'"));
	// 	$superresult = mysql_query("INSERT INTO schedule(`SCHED_CODE`, `SUBJECT`, `TERM`, `SCHOOL_YEAR`, `RM_ID`, `LM_ID`, `CM_ID`) VALUES ('$sched','$subject','$term','$sy','".$result1['ROOMMAN_ID']."','".$result2['LM_ID']."','".$result3['CM_ID']."')"); 
	// }
}
if (isset($_POST['submitschedule'])){

	include_once("connect.php");
	$SCHED_CODE = mysql_fetch_array(mysql_query("SELECT SCHED_CODE FROM schedule ORDER BY SCHED_CODE DESC"));
	$sched = $SCHED_CODE['SCHED_CODE']+1;
		$courses = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE COURSE_CODE = '".$_SESSION['course']."'"));
		$course = $courses['CID'];
		$section = $_SESSION['section'];
		$term = $_SESSION['term'];
		$sy = $_SESSION['sy'];
 		$subject = $_SESSION['subject'];
 		$lect = $_SESSION['lecturer'];
 		$room = $_SESSION['room'];
 		$class = $_SESSION['class'];
 		insertsched($sched,$subject,$term,$sy,$room,$lect,$class);
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
			    <span id="result_7" style="display: none;"></span>
			    <span id="wait_8" style="display: none;">
			    <img alt="Please Wait" src="ajax-loader.gif"/>
			    </span>
			    <span id="result_8" style="display: none;"></span>
			    <span id="wait_9" style="display: none;">
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