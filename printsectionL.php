<!DOCTYPE html>
<html>
<head>
	<title></title>
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
		border-right:1px solid black;
		border-top:1px solid black;
		height:20px;
		font-size: 10px;
		text-align:center;
	}
	#sched_heading2{
		border-right:1px solid black;
		border-bottom:1px solid black;
		width:90px;
		height:20px;
		text-align:center;
		font-size:12px;
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

	<?php 

			 include_once('connect.php');
			 $termd = mysql_fetch_array(mysql_query("SELECT * FROM term WHERE TERM = '$_GET[term]'"));
			$term= $termd['TERM_CODE'];

			$syd = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear WHERE SY = '$_GET[sy]'"));
			$sy = $syd['SY_ID']; 

			 $lect = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '$_GET[lect]'")) ; 

			 $dept = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$lect['DEPARTMENT']."'")) ; 

			 $dept = $dept['DEPARTMENT'];

			 $availability = mysql_fetch_array(mysql_query("SELECT * FROM availability WHERE LECTURER = '".$lect['LECTURER_ID']."'")) ; 

			 $startTime = date("h:i A", strtotime($availability['START_TIME']));  

			 $endTime = date("h:i A", strtotime($availability['END_TIME']));  

			 $name = $lect['FIRSTNAME']." ".$lect['MIDDLENAME']." ".$lect['LASTNAME'];


			 $subresult=mysql_query("SELECT * FROM schedule 
								WHERE TERM = '".$term."' 
								AND LECTURER = '".$_GET['lect']."' 
								AND SCHOOL_YEAR = '".$sy."' 
								ORDER BY SCHOOL_YEAR DESC ");
			 $class="";

			

		    $contactH=0;
		    $totalU=0;
		    $preparation=0;
		   
		    while($subrow = mysql_fetch_array($subresult)){

		    	$subjresult = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));

		    	$contactH += (strtotime($subrow['END_TIME']) - strtotime($subrow['START_TIME']))/3600;
		    	$totalU += $subjresult['LECUNITS'] + $subjresult['LABUNITS'];

		    	if($subjresult['LECUNITS'] && $subjresult['LABUNITS']){
		    		$preparation += 2;
		    	}
		    	else if($subjresult['LECUNITS']){
		    		$preparation += 1;
		    	}
		    	else{

		    	}

		    }
		    if($totalU >= 18)$contactH+=2;
		      
	?>


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
	<?php

				echo '
				<table style="font-size:15px;width:100%;">
					<tr>
						<td style="width:380px;">
							Name: <b>'.$name.'</b>
						</td>
						<td>
							Department: <b>'.$dept.'</b>
						</td>
					</tr>
					<tr>
						<td>
							No. of Preparation(s): <b>'.$preparation.'</b>
						</td>
						<td>
							Total Number of Contact Hours: <b>'.$contactH.'</b>
						</td>
					</tr>
					<tr>
						<td>

						</td>
						<td>
							Official Time: <b>'.$startTime.' - '.$endTime.'</b>
						</td>
					</tr>
				</table>
				</br>
				';

		    	
			
		    
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
		    
			echo "<table id = 'sched_table'>";
			
			echo "<thead>";
			
		for( $i = 0; $i <= 6 ; $i++ ){
			
			echo "<th id='sched_heading'>".$days[$i]."</th>";
			
		}
			echo "</thead>";
			echo "<tbody id = 'sched_body'>";
		 
		 for ( $i = 1 ; $i <= 22 ; $i++ ){
			 
			 echo "<tr id='row'>";
			 
			 if( ( ($i) % 2) == 1 ){
				 
				 echo "<td id = 'sched_time' rowspan = '2' >" . 
					$time[ $i ][ 0 ] . " - " . $time[ $i + 2 ][ 0 ]. " </td> ";
				 
			 }
			 
			 for ( $j = 1 ; $j <= 6 ; $j++ ){
				 
				 $query = mysql_query("SELECT * FROM schedule WHERE 
					LECTURER = '".$_GET['lect']."' AND 
					DAYS = '".$j."' AND 
					TERM = '".$term."' AND
					SCHOOL_YEAR = '".$sy."' AND 
					START_TIME = '".$time[$i][1]."'
					ORDER BY SCHOOL_YEAR DESC "); 
				
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

					if ($sched['CLASS']==1)
								$class = 'LEC';
					else
						$class = 'LAB';

					
					$subject = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".
						$sched['SUBJECT']."'"));
						
					$room = mysql_fetch_array(mysql_query("SELECT * FROM room WHERE ROOM_ID = '".
						$sched['ROOM']."'"));

			    	$couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$sched['COURSE']."'"));
		            $course = $couresult['COURSE_CODE'];

		            $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$sched['SECTION']."'"));
		            $section = $secresult['SECTION']; 

					echo "<td id='sched_data' class='".$days[$j]."' rowspan = '".$row.
						"' style = 'border-top:1px solid black;border-bottom:1px solid black'>".
						$subject['SUBJECT_CODE']."</br>(".$class.")</br>".$course.$sched['YEAR'].
						"-".$section."</br>"."(".$room['ROOM'].")</td>";
						
				}
				else if( mysql_num_rows( $query ) == 0 ){
					
					if( $rowCounter[$j] == 0 ){

						echo "<td id = 'sched_data' class='".$days[$j]."'></td>";

					}

				}
				else if( mysql_num_rows( $query ) > 1 ){
					
					echo "<td id = 'sched_data' class='".$day[$j]."'>multiple data found</td>";
					
				}
			 }
			 
			 echo "</tr>";
			 
			 for( $g = 1 ; $g <= 6 ; $g++ ){
				 if( $rowCounter[$g] ){
					 $rowCounter[$g]--;
				 }
			 }
			 
		 }
	echo "</tbody>";
	echo "</table></br>";


	echo '
	<table style="font-size:10px;width:100%;">
	 	<tr>
	 		<td>
	 			<div style = "float:left;">Consultation: </div>
	 			<b><div id="consultation" style = " border-bottom:1px solid black; width:175px;float:left;height:10px; "> </div></b>
	 		</td>
	 		<td>
	 			<div style = "float:left;">Research: </div>
	 			<b><div style = " border-bottom:1px solid black; width:150px;float:left;height:10px; ">'.$lect['RESEARCH'].' </div></b>
	 		</td>
	 		<td>
	 			<div style = "float:left;">Extension: </div>
	 			<b><div style = " border-bottom:1px solid black; width:150px;float:left;height:10px; ">'.$lect['EXTENSION'].' </div></b>
	 		</td>
	 	</tr>
	 	<tr>
	 		<td colspan="3">
	 			<div style = "float:left;">Designation: </div>
	 			<b><div style = " border-bottom:1px solid black; width:652px;float:left;height:10px; ">'.$lect['DESIGNATION'].'</span></div>
	 		</td>
	 	</tr>

	 </table>
	</br>';	 

 ?>	


 <script type="text/javascript">

		var days = ["MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY"];

		var restday = [1,1,1,1,1,1];
		
		var conDay = [];
		
		var conTime = [];
		
		var conCount = 0;
		
		var conIndex = -1;

		var consultation = [[-1,-1],[-1,-1]];

		var consultationText = "";

		var schedTime = [
				 "7:00 am",
				 "7:30 am",
				 "8:00 am",
				 "8:30 am",
				 "9:00 am",
				 "9:30 am",
				 "10:00 am",
				 "10:30 am",
				 "11:00 am",
				 "11:30 am",
				 "12:00 pm",
				 "12:30 pm",
				 "1:00 pm",
				 "1:30 pm",
				 "2:00 pm",
				 "2:30 pm",
				 "3:00 pm",
				 "3:30 pm",
				 "4:00 pm",
				 "4:30 pm",
				 "5:00 pm",
				 "5:30 pm",
				"6:00 pm"
			];
		

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
		for( var i = 0 ; i < 6 ; i++ ){

			var data = document.getElementsByClassName(days[i]);

			for( var j = 0; j < data.length ; j++ ){
				
			
				if( j < data.length - 3 ){

					
				
					if( data[j].getAttribute("rowspan") === null && data[j+1].getAttribute("rowspan") === null && data[j+2].getAttribute("rowspan") === null && data[j+3].getAttribute("rowspan") === null && restday[i] == 0 ){
						
						conDay.push(i);
						
						conTime.push(j);
					
					}
				}
			}
		}
		
		for( i = 0 ; i < 6 ; i++ ){
			
			var data = document.getElementsByClassName(days[i]);

			if(restday[i] == 1 ){

				data[11].innerHTML = "<b style='font-size:15px;'>Rest Day</b>";
				
			}
			
		 }
		 </script>
<?php

	if($totalU >= 18){
?>
		 <script type="text/javascript">
		 
		 var day = -1;
		 
		 while( conCount < 1 ){

			 index = Math.floor((Math.random() * conDay.length ));

			 if( index == conIndex || conDay[index] == day ){
				 continue;
			 }
			 else{

				 conIndex = index;
				 
				 day = conDay[index];

				 var time = conTime[index];

				 consultation[conCount][0] = day;
				 consultation[conCount][1] = time;
				 
				var data = document.getElementsByClassName(days[day]);
			 				
				data[time].rowSpan = 4;
				
				data[time].innerHTML = "<b style = 'font-size:8px;'>CONSULTATION</br>HOURS<b>";
				
				data[time].style.borderTop = "1px solid black";
				data[time].style.borderBottom = "1px solid black";
				
				data[time+1].remove();
				data[time+1].remove();
				data[time+1].remove();

				conCount++;
			 }
		 }








	

		
	 	var schedRow = document.getElementById("sched_body").childNodes;
	/*
	 	document.write(consultation[0][0]);
	 	document.write("</br>");
		document.write(consultation[0][1]);
		document.write("</br>");
		document.write("</br>");
		document.write(consultation[1][0]);
		document.write("</br>");
		document.write(consultation[1][1]);
	*/


	 	for( var i = 0 ; i < 2 ; i++ ){

	 		if( consultation[i][0] ==-1 || consultation[i][1] == -1 ) continue;

	 		for( var j = 0 ; j <= 22 ; j++ ){

		 		if( schedRow[j] === document.getElementsByClassName(    days[   consultation[i][0]   ]   )   [ consultation[i][1] ].parentNode ){
		 			//document.getElementsByClassName(    days[   consultation[i][0]   ]   )   [ consultation[i][1] ].style =" background-color:green;";
		 			
		 			if( i == 1 ){
		 				consultationText += ", " + days[ consultation[i][0] ] + "(" + schedTime[ j ] + " - " + schedTime[ j+4 ] + ")";
		 			}
		 			else {
		 				consultationText += days[ consultation[i][0] ] + "(" + schedTime[ j ] + " - " + schedTime[ j+4 ] + ") ";
		 			}
		
		 		}
	 		}
	 	}

	 	document.getElementById("consultation").innerHTML = consultationText;

	 </script>
<?php
	}
		 echo '<table style="width:100%;border:1px solid black;">
	    <thead>
		    <tr>
		        <th id="sched_heading2" colspan="2" rowspan="2">SUBJECT</th>
		        <th id="sched_heading2" rowspan="2">PROGRAM</th>
		        <th id="sched_heading2" colspan="2">CONTACT HOURS</th>
		        <th id="sched_heading2" colspan="2" rowspan="2">Room</th>
		    </tr>
		    <tr>
		    	<th id="sched_heading2" >Lecture</th>
		    	<th id="sched_heading2" >Laboratory</th>
		    </tr>
	    </thead>
	    <tbody>
	    	';
	    	// $subcode array();
	    	// $subject =array();
	    	// $subProgram = array();
	    	// $subLec = array();
	    	// $subLab = array();
	    	// $subRoom = array();

	    	$sub = array(
	    		array(),
	    		array(),
	    		array(),
	    		array(),
	    		array(),
	    		array()
	    	);

	    	$EtotalHours = array(0,0);
	    	$Eprogram ="";
	    	$Eroom="";

	    	$subresult=mysql_query("SELECT * FROM schedule 
							WHERE TERM = '".$term."' 
							AND LECTURER = '".$_GET['lect']."' 
							AND SCHOOL_YEAR = '".$sy."' 
							ORDER BY SUBJECT ASC ,SCHOOL_YEAR DESC , DAYS ASC, START_TIME ASC");

	    	while($subrow=mysql_fetch_array($subresult)){

	    			$lecH = 0;
	                $labH = 0;

	    			$contactH = (strtotime($subrow['END_TIME']) - strtotime($subrow['START_TIME']))/3600;

	                if($subrow['CLASS'] == "1" ){

					 	$lecH = $contactH;

					}
					else $labH = $contactH;

	    			$contactH += (strtotime($subrow['END_TIME']) - strtotime($subrow['START_TIME']))/3600;

	                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
	    
	                $subjectcode = $subjresult['SUBJECT_CODE'];
	                $subject = $subjresult['SUBJECT'];

	                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$subrow['COURSE']."'"));
	                $course = $couresult['COURSE_CODE'];
	 
	                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$subrow['SECTION']."'"));
	                $section = $secresult['SECTION'];      

	                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$subrow['ROOM']."'"));
	                $room = $roomresult['ROOM'];    

	                $year = $subrow['YEAR'];  

	                $program = $course."-".$year.$section;

		    		array_push($sub[0],$subjectcode);
		    		array_push($sub[1],$subject);
		    		array_push($sub[2],$program);
		    		array_push($sub[3],$lecH);
		    		array_push($sub[4],$labH);
		    		array_push($sub[5],$room);
	    }
	    $EtotalHours[0] = $sub[3][0];
		$EtotalHours[1] = $sub[4][0];
		$Eprogram = $sub[2][0];
		$Eroom = $sub[5][0];

	    for( $i = 1 ; $i < count($sub[0]) ; $i++ ){

	    	// $EtotalHours[0] += $sub[3][$i];
	    	// $EtotalHours[1] += $sub[4][$i];
	    	// if($sub[2][$i] != $sub[2][$i-1])$Eprogram .= $sub[2][$i];
	    	// if($sub[5][$i] != $sub[5][$i-1])$Eroom .= $sub[5][$i];


	    	if( $sub[0][$i] == $sub[0][$i-1]){

	    		$EtotalHours[0] += $sub[3][$i];
	    		$EtotalHours[1] += $sub[4][$i];
	    		if($sub[2][$i] != $sub[2][$i-1])$Eprogram .= ",".$sub[2][$i];
	    		if($sub[5][$i] != $sub[5][$i-1])$Eroom .= ",".$sub[5][$i];

	    		if($i == count($sub[0])-1 ){


					echo'
				        <td id="sched_data2">'.$sub[0][$i].'</td>
				        <td id=sched_data2>'.$sub[1][$i].'</td>
				        <td id=sched_data2>'.$Eprogram.'</td>
				        <td id=sched_data2>'.$EtotalHours[0].'</td>
				        <td id=sched_data2>'.$EtotalHours[1].'</td>
				        <td id=sched_data2>'.$Eroom.'</td></tr>
				        ';
				    continue;
		    	}

	    	}
	    	else{


	    		echo'
			        <td id="sched_data2">'.$sub[0][$i-1].'</td>
			        <td id=sched_data2>'.$sub[1][$i-1].'</td>
			        <td id=sched_data2>'.$Eprogram.'</td>
			        <td id=sched_data2>'.$EtotalHours[0].'</td>
			        <td id=sched_data2>'.$EtotalHours[1].'</td>
			        <td id=sched_data2>'.$Eroom.'</td></tr>
			        ';

			    $EtotalHours[0] = $sub[3][$i];
				$EtotalHours[1] = $sub[4][$i];
		    	$Eprogram = $sub[2][$i];
				$Eroom = $sub[5][$i];

				if($i == count($sub[0])-1 ){


					echo'
				        <td id="sched_data2">'.$sub[0][$i].'</td>
				        <td id=sched_data2>'.$sub[1][$i].'</td>
				        <td id=sched_data2>'.$Eprogram.'</td>
				        <td id=sched_data2>'.$EtotalHours[0].'</td>
				        <td id=sched_data2>'.$EtotalHours[1].'</td>
				        <td id=sched_data2>'.$Eroom.'</td></tr>
				        ';
				    continue;

		    	}



	    	}



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

							$department = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$lect['DEPARTMENT']."'"));
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