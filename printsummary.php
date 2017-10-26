<!DOCTYPE html>
<html>

<?php 
	 include_once('connect.php');
	 $termd = mysql_fetch_array(mysql_query("SELECT * FROM term WHERE TERM = '$_GET[term]'"));
	$term= $termd['TERM_CODE'];

	$syd = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear WHERE SY = '$_GET[sy]'"));
	$sy = $syd['SY_ID'];   
?>

<head>
	<title></title>
</head>
<style type="text/css">

	table{
		/*border: 1px solid black;*/
		margin: 0 auto;

		border-collapse: collapse;
	}
	#row{
		height:32px;
	}
	.center{
		text-align: center;
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
	<table>	
			<table>	
				<tr>

					<th class="center" style="font-size:15px;">CAVITE STATE UNIVERSITY-TRECE MARTIRES CITY CAMPUS</th>
				</tr>
				<tr>

					<th class="center" style="font-size:12px;">SUMMARY OF FACULTY LOAD</th>

				</tr>
				<tr>
					<td class="center" style="font-size:10px;"><?php echo $_GET['term']." SEMESTER , SY ".$_GET['sy'];?></td>
				</tr>
		</table>
		</br>
<?php
 
	$heading = array('DEPARTMENT','DISCIPLINE','NAME','TYPE OF APPOINTMENT','TEACHING HOURS','CONSULTATION HOURS','TOTAL CONTACT HOURS','NUMBER OF PREPARATIONS');
    
echo "<table id='sched_table'>";
	
	echo "<thead>";
	
		for( $i = 0; $i <= 7 ; $i++ ){
			
			echo "<th id='sched_heading'>".$days[$i]."</th>";
			
		}
	echo "</thead>";
	echo "<tbody>";
		





	echo "</tbody>";

	echo "</table>";
?>
	</br>

	<table style="width:100%;">
		<tr>
			<td id="signature_data">
				Prepared by:
				</br>
				</br>
				</br>
				</br>
				<?php

				$users = mysql_fetch_array(mysql_query("SELECT * from users WHERE UID = '1'"));

				echo '<span id="signature_name">'.$users['REGISTRAR'].'</span></br>';

				?>
				<span id="signature_label">Campus Registrar</span>
			</td>
			<td id="signature_data">
				Approved:
				</br>
				</br>
				</br>
				</br>
				<?php

					echo '<span id="signature_name">'.$users['DEAN'].'</span></br>';

				?>
				<span id="signature_label">Campus Dean</span>
			</td>
		</tr>
	</table>
</div>
</body>

<script type="text/javascript">window.print();</script>
</html>