<?php
//**************************************
//     Page load dropdown results     //
//**************************************
function getTierOne()
{
	$result = mysql_query("SELECT * FROM subjecttype") 
	or die(mysql_error());

	  while($tier = mysql_fetch_array( $result )) 
  
		{
		   echo '<option value="'.$tier['TID'].'">'.$tier['TYPE'].'</option>';
		}

}

//**************************************
//     First selection results     //
//**************************************
if(isset($_GET['func']) && $_GET['func'] == "drop_1") { 
   drop_1($_GET['drop_var']); 
}

function drop_1($drop_var)
{  
    include_once('connect.php');
	$result = mysql_query("SELECT * FROM subject WHERE SUBTYPE='$drop_var'") 
	or die(mysql_error());
	$count=mysql_num_rows($result);
	if($count>0){
	echo '<br/><select class = "form-control" name="drop_2" id="drop_2">
	      <option value=" " disabled="disabled" selected="selected">Choose one</option>';

		   while($drop_2 = mysql_fetch_array( $result )) 
			{
			  echo '<option value="'.$drop_2['SID'].'">'.$drop_2['SUBJECT'].'</option>';
			}
	
	echo '</select>';

	echo "<script type=\"text/javascript\">
$('#wait_2').hide();
	$('#drop_2').change(function(){
	  $('#wait_2').show();
	  $('#result_2').hide();
      $.get(\"func.php\", {
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

	echo '<br/><a href = "isubject.php?type='.$drop_var.'" ><button type="button" class="btn btn-primary"  value ="Add Subject">Add Subject</button></a>';

}
}

//second
if(isset($_GET['func']) && $_GET['func'] == "drop_2") { 
   drop_2($_GET['drop_var']); 
}
function drop_2($drop_var)
{  
	echo '<br/><button type="submit" name="submit" class="btn btn-primary" >Submit</button> ';
}




?>