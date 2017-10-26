<!DOCTYPE html>
<html>
<?php  
include_once("connect.php");
    	$coursed = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE COURSE_CODE = '$_GET[course]'"));
    	$course = $coursed['CID'];

    	$termd = mysql_fetch_array(mysql_query("SELECT * FROM term WHERE TERM = '$_GET[term]'"));
    	$term= $termd['TERM_CODE'];

    	$syd = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear WHERE SY = '$_GET[sy]'"));
    	$sy = $syd['SY_ID'];    	

    	$sectiond = mysql_fetch_array(mysql_query("SELECT * FROM section WHERE SECTION = '$_GET[section]'"));
    	$section = $sectiond['SECTION_ID'];

    	$yearr =  mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '$_GET[year]'"));
    	$year = $yearr['YEAR_ID'];
 ?>
<head>

</head>
<style type="text/css">
	.center{
		text-align: center;
	}
	table{
		/*border: 1px solid black;*/
		margin: 0 auto;

		border-collapse: collapse;
	}
	#row{
		height:32px;
	}

	#sched_data{
		
		border-right:1px solid black;
		width: 90px;
		height:30px;
		font-size: 10px;
		text-align:center;
		font-weight: bold;
	}
	#sched_time{
		font-size: 10px;
		border-right:1px solid black;
		border-bottom:1px solid black;
		width:150px;
		height:30px;
		text-align:center;
	}
	#sched_heading{
		
		border-right:1px solid black;
		border-bottom:1px solid black;
		width:90px;
		height:25px;
		text-align:center;
		font-size:12px;
	}
	#sched_table{
	
		border:1px solid black;
		border-collapse: collapse;
		margin:auto;

	}
	#container{
		width:706px;
		margin:auto;
	}
	#sched_data2{
		border-left:1px solid black;
		border-top:1px solid black;
		width: 115.5px;
		height:20px;
		font-size: 10px;
		text-align:center;
	}
	#signature_data{
		height:100px;
		width:240px;
		font-size:10px;
	}
	#signature_name{
		font-size: 12px;
		font-weight: bold;
	}
	#signature_label{
		font-style: italic;
	}
</style>
<body>
<div id="container">
	</br>
	</br>
	</br>
	<table>	
			<table>	
				<tr>
					<td rowspan="3" style="width:100px;"><img src="img/logo.png"/ width="70px" height="50px" ></td>
					<th class="center" style="font-size:15px;">CAVITE STATE UNIVERSITY</th>
					<td style="width:100px;"></td>
				</tr>
				<tr>
					<th class="center" style="font-size:12px;">TRECE MARTIRES CITY CAMPUS</th>
					<td style="width:100px;"></td>
				</tr>
				<tr>
					<td class="center" style="font-size:11px;">Trece Martires City, Cavite</td>
					<td style="width:100px;"></td>
				</tr>
				<tr><td style="height:20px;"></td><td></td><td></td></tr>
				<tr>
					<td style="width:100px;"></td>
					<th class="center" style="font-size:12px;">SCHEDULE OF CLASSES</th>
					<td style="width:100px;"></td>
				</tr>
		
				<tr>
					<td style="width:100px;"></td>
					<td class="center" style="font-size:10px;"><?php echo $_GET['term']." SEMESTER , SY ".$_GET['sy'];?></td>
					<td style="width:100px;"></td>
				</tr>
		</table>
		</br>
		<table style="font-size:12px;width:717px;">
				<tr></tr>
				
				<tr>
					<td style="width:50px;">
						Course:
					</td>
					<td>
						<b><?php echo $coursed['COURSE'];?></b>
					</td>
					<td></td>
				</tr>
				<tr>
					<td style="width:50px">
						Year:
					</td>
					<td>
						<b>
						<?php $yeard = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '$year'")) ; 
							$years = $yeard['YEAR']; echo $years." YEAR";?>
						</b>
					</td>				
					<td></td>
				</tr>
				<tr>
					<td style="width:50px">

						Section:
					</td>
					<td>
						<b>
						<?php echo $_GET['section'];?>
					</b>
					</td>
					<td></td>
				</tr>

		</table>
	</br>


	<?php session_start();
	echo'<br/>';
    include_once('connect.php');
	    
	$time = array( 
		array("",""),
		array("7:00 am","07:00"),
		array("7:30 am","07:30"),
		array("8:00 am","08:00"),
		array("8:30 am","08:30"),
		array("9:00 am","09:00"),
		array("9:30 am","09:30"),
		array("10:00 am","10:00"),
		array("10:30 am","10:30"),
		array("11:00 am","11:00"),
		array("11:30 am","11:30"),
		array("12:00 pm","12:00"),
		array("12:30 pm","12:30"),
		array("1:00 pm","13:00"),
		array("1:30 pm","13:30"),
		array("2:00 pm","14:00"),
		array("2:30 pm","14:30"),
		array("3:00 pm","15:00"),
		array("3:30 pm","15:30"),
		array("4:00 pm","16:00"),
		array("4:30 pm","16:30"),
		array("5:00 pm","17:00"),
		array("5:30 pm","17:30"),
		array("6:00 pm","18:00")
	);
 
	$rowCounter = array(0,0,0,0,0,0,0);
 
	$days = array('TIME','MONDAY','TUESDAY','WEDNESDAY','THURSDAY','FRIDAY','SATURDAY');
    
	echo "<table id='sched_table'>";
	
	echo "<thead>";
	
for( $i = 0; $i <= 6 ; $i++ ){
	
	echo "<th id='sched_heading'>".$days[$i]."</th>";
	
}
	echo "</thead>";
	echo "<tbody>";


// $tdCounter = 0;/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //$multiCounter = 0;/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //$spanCounter = 0;/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 for ( $i = 1 ; $i <= 22 ; $i++ ){
	 
	 echo "<tr id='row'>";
	 
	 if( ( ($i) % 2) == 1 ){
		 
		 echo "<td id = 'sched_time' rowspan = '2' >" . 
			$time[ $i ][ 0 ] . " - " . $time[ $i + 2 ][ 0 ]. " </td> ";
		 
	 }
	 
	 for ( $j = 1 ; $j <= 6 ; $j++ ){
		 
		 $query = mysql_query("SELECT * FROM schedule WHERE 
			SECTION = '".$section."' AND 
			DAYS = '".$j."' AND 
			YEAR = '".$year."' AND 
			TERM = '".$term."' AND
			COURSE = '".$course."' AND 
			SCHOOL_YEAR = '".$sy."' AND 
			START_TIME = '".$time[$i][1]."'"); 
		
		if( mysql_num_rows($query) == 1){
			
			$sched = mysql_fetch_array( $query ); 
			
			for( $h = 1 ; $h <= 22 ; $h++ ){
				if( date("H:i",strtotime($sched['END_TIME'])) == date("H:i",strtotime($time[$h][1]) )) $eTime = $h;
			}
			for( $h = 1 ; $h <= 22 ; $h++ ){
				if( date("H:i",strtotime($sched['START_TIME'])) == date("H:i",strtotime($time[$h][1])) ) $sTime = $h;
			}

			$row = $eTime - $sTime ; 
			$rowCounter[$j] = $row;

			//$spanCounter += $row;

			if ($sched['CLASS']==1)
						$class = 'LEC';
			else
				$class = 'LAB';

			
			$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".
				$sched['SUBJECT']."'"));
				
			$room = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".
				$sched['ROOM']."'"));



			
			echo "<td id = 'sched_data' class='".$days[$j]."' rowspan = '".$row.
				"' style = 'border-top:1px solid black;border-bottom:1px solid black'>".
				$subject['SUBJECT_CODE']."</br>(".$class.")</br>".$coursed['COURSE_CODE'].$year.
				"-".$sectiond['SECTION']."</br>"."(".$room['ROOM'].")</td>";
				
		}
		else if( mysql_num_rows( $query ) == 0 ){
			
			if( $rowCounter[$j] == 0 ){
				echo "<td id = 'sched_data' class='".$days[$j]."'></td>";
				//$tdCounter++;
			}

		}
		else if( mysql_num_rows( $query ) > 1 ){
			
			echo "<td id = 'sched_data' class='".$days[$j]."'>multiple data found</td>";
			//$multiCounter++;
			
		}
	 }
	 
	 echo "</tr>";
	 
	 for( $g = 1 ; $g <= 6 ; $g++ ){
		 if( $rowCounter[$g] ){
			 $rowCounter[$g]--;
		 }
	 }
	 
 }


 //echo $tdCounter."</br>".$multiCounter."</br>".$spanCounter;/////////////////////////////////////////////////////////////////////////////////////////////////////////

 ?>
<script>

var days = ["MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY"];

var restday = [1,1,1,1,1,1];

for( var i = 0 ; i < 6 ; i++ ){

	var data = document.getElementsByClassName(days[i]);
	for( var j = 0; j < data.length ; j++ ){
		if(data[j].innerHTML){
			restday[i] = 0;
			break;

		}
		else{
			restday[i] = 1;
		} 
	}

}

for( i = 0 ; i < 6 ; i++ ){

 	if(restday[i] == 1 ){

 		document.getElementsByClassName(days[i])[11].innerHTML = "<b style='font-size:15px;'>Rest Day</b>";

 	}
 }
 </script>


<?php
	echo "</tbody>";
echo "</table></br>";
	 echo '<table>
     <thead style="font-size: 12px;text-decoration: underline;text-align:left">
	    <tr>
	        <th style="width:110px;">COURSE CODE</th>
	        <th style="width:343px;">COURSE TITLE</th>
	        <th style="width:90px;"></th>

	        <th style="width:163px;">INSTRUCTOR</th>
	    </tr>
    </thead>
    <tbody>
    ';

// $subresult=mysql_query("SELECT * FROM schedule 
// 						WHERE TERM = '".$term."' 
// 						AND ROOM = '".$_GET['room']."' 
// 						AND SCHOOL_YEAR = '".$sy."'
// 						 ORDER BY SCHOOL_YEAR DESC, DAYS ASC, START_TIME ASC");    

			$subresult=mysql_query("SELECT * FROM schedule 
						WHERE SCHOOL_YEAR = '".$sy."' 
						AND COURSE = '".$course."' 
						AND YEAR= '".$year."'  
						AND SECTION = '".$section."' 
						AND TERM = '".$term."'
						ORDER BY SUBJECT ASC,DAYS ASC, START_TIME ASC"); 

			$lastSub = -1;       
               
            while($subrow=mysql_fetch_array($subresult)){

            	if($lastSub == $subrow['SUBJECT'])continue;
            	
            	$lastSub = $subrow['SUBJECT'];

                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
               
                $subjectcode = $subjresult['SUBJECT_CODE'];
                $subject = $subjresult['SUBJECT'];

                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$subrow['COURSE']."'"));
                $course = $couresult['COURSE_CODE'];

                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$subrow['SECTION']."'"));
                $section = $secresult['SECTION']; 

                $termresult = mysql_fetch_array(mysql_query("SELECT TERM FROM term WHERE TERM_CODE = '".$subrow['TERM']."'"));
                $term = $termresult['TERM'];

                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$subrow['ROOM']."'"));
                $room = $roomresult['ROOM'];       

                $syresult = mysql_fetch_array(mysql_query("SELECT SY FROM schoolyear WHERE SY_ID = '".$subrow['SCHOOL_YEAR']."'"));
                $sy = $syresult['SY'];

                $lectresult = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$subrow['LECTURER']."'"));
                $lect = $lectresult['LASTNAME']; 
                
                $year = $subrow['YEAR'];   

                $string = $course."-".$year.$section;
                $advisee = "";

        if( $string == $lectresult['ADVISEE'])$advisee = "Class Adviser";

        	echo'<tr style="font-size:10px;text-align:left;">
			        <td>'.$subjectcode.'</td>
			        <td>'.$subject.'</td>
			        <td style="font-style: italic;">'.$advisee.'</td>
			        <td>'.$lect.'</td>
		        </tr>';

        }
    

        echo'</tbody>
    </table>';
?>

	<table>
				<tr>
					<td id="signature_data">
										Recommending Approval:
						</br>
						</br>
						</br>
						</br>

						<?php

							$department = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$coursed['DEPARTMENT']."'"));
							$lect = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$department['CHAIRPERSON']."'"));

							echo '<span id="signature_name">'.$lect['FIRSTNAME'].' '.$lect['MIDDLENAME'].' '.$lect['LASTNAME'].'</span>'

						?>

						</br>
						<span id="signature_label">Department Chairperson</span>
					</td>
					<td id="signature_data">

					Approved:

						</br>
						</br>
						</br>
						</br>

						<?php
							$users = mysql_fetch_array(mysql_query("SELECT * from users WHERE UID = '1'"));

							echo '<span id="signature_name">'.$users['DEAN'].'</span>';

						?>
						
						</br>
						<span id="signature_label">Campus Dean</span>
					</td>
					<td id="signature_data">
						Prepared by:
						</br>
						</br>
						</br>
						</br>
						<?php
							

							echo '<span id="signature_name">'.$users['REGISTRAR'].'</span>';

						?>
						</br>
						<span id="signature_label">Campus Registrar</span>
					</td>
				</tr>
				<tr>
					<td id="signature_data">

					</td>
					<td id="signature_data"></td>
					<td id="signature_data"></td>
				</tr>
				<tr>
					<td id="signature_data"></td>
					<td id="signature_data">
						
					</td>
					<td id="signature_data"></td>
				</tr>

		</table>
</div>
</body>
<script type="text/javascript">window.print();</script>
</html>