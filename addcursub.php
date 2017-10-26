<?php

	session_start();
	include("weblock.php");
	include("header.php");
  	include('func.php');
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
      $.get("func.php", {
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
</script>
<?php
	if (isset($_POST['submit'])){

	$subject = $_POST['drop_2'];
	$course = $_GET['course'];
	$year = $_GET['year'];
	$term = $_GET['term'];
	$check = mysql_num_rows(mysql_query("SELECT * FROM curriculum WHERE COURSE = '$course' AND SUBJECT='$subject'"));
	if ($check==0){
		$result = mysql_query("INSERT INTO `curriculum`(`COURSE`, `SUBJECT`, `YEAR_OFF`, `TERM`) VALUES ('$course','$subject','$year','$term')");
		if ($result)
			header('location:addcursub.php?course='.$course.'&year='.$year.'&term='.$term);
		}
	else echo"<script type='text/javascript'>window.alert('Subject already in the Course');</script>";
	}
?>

<div id="content" class="col-lg-10 col-sm-10">

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-alt"></i><?php echo $_GET['course']."-"; switch ($_GET['year']) {
                        case '1':echo "FIRST YEAR";
                            break;
                        case '2':echo "SECOND YEAR";
                            break;
                        case '3':echo "THIRD YEAR";
                            break;
                        case '4':echo "FOURTH YEAR";
                            break;
                        
                        default:
                            # code...
                            break;
                    }
                    if ($_GET['term']==1) echo"-FIRST TERM";
                    else echo"- SECOND TERM";
                    ?></h2>

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
			    <label>Insert Subjects</label>
			    <select class = "form-control" name="drop_1" id="drop_1" >
			      <option value="" selected="selected" disabled="disabled">Subject Type</option>
			      
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
			</form><br/>
			<label>Current Subjects</label>
		    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
			    <thead>
			    <tr>
			        <th>CODE</th>
			        <th>SUBJECT</th>
			        <th>LECTURE UNITS</th>
			        <th>LABORATORY UNITS</th>
			        <th>TOTAL UNITS</th>
			        <th>ACTION</th>
			    </tr>
			    </thead>

			    <tbody>
			    	<?php
			    		include_once("connect.php");
			            $totalunits = 0;
			                ?>
			                <tr>
			                    <th colspan="6"><?php switch ($_GET['year']) {
			                        case '1':echo "FIRST YEAR";
			                            break;
			                        case '2':echo "SECOND YEAR";
			                            break;
			                        case '3':echo "THIRD YEAR";
			                            break;
			                        case '4':echo "FOURTH YEAR";
			                            break;
			                        
			                        default:
			                            # code...
			                            break;
			                    }?></th>
			                </tr>
			                <?php
			            ?>
			            <tr>
			                <td colspan="5">
			                    <?php
			                        if ($_GET['term']==1)echo 'Term 1';
			                        else echo 'Term 2';
			                    ?>
			                </td>     
			            </tr>
			            <?php
			    		$result=mysql_query("SELECT * FROM curriculum WHERE YEAR_OFF = '".$_GET['year']."' AND TERM = '".$_GET['term']."' AND COURSE = '".$_GET['course']."' ORDER BY YEAR_OFF ASC");
			    		while($row=mysql_fetch_array($result)){
			    	?>
			        <td class="center"><?php $subres = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$row['SUBJECT']."'")); echo $subres['SUBJECT_CODE'];?></td>
			        <td class="center"><?php echo $subres['SUBJECT'];?></td>

			        </td>
			        <td class="center">
			           <?php echo $subres['LECUNITS'];?>
			        </td>
			        <td class="center">
			           <?php echo $subres['LABUNITS'];?>
			        </td>
			         <td class="center">
			           <?php echo $subres['TOTAL_UNITS']; $totalunits = $totalunits+$subres['TOTAL_UNITS'];?>
			        </td>
			        <td class="center">
			            <a class="btn btn-success" href="vsubject.php?id=<?php echo $subres['SID'];?>&course=<?php echo $_GET['course'];?>" title="View">
			                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
			              
			            </a>
			            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');" href="cursubs.php?del=<?php echo $subres['SID'];?>&course=<?php echo $_GET['course'];?>" title="Delete">
			                <i class="glyphicon glyphicon-trash icon-white"></i>
			               
			            </a>
			        </td>
			    </tr>
			                <tr>
			                    <?php
			                }	
			                    echo "<td colspan='3'></td><td>Total Units</td><td>".$totalunits."</td>";
			                
			                    ?>
			                </tr>
			    
			    </tbody>
			</table>	

                            <button class="btn btn-info" type = "button" name="addsub" id = "addsub" onclick="location.href='cursubs.php?course=<?php echo $_GET['course'];?>'">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Back to Curriculum
                            </button>
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