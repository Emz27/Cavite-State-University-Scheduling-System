		while ($roommanager = mysql_fetch_array($ro0oloomman)) {


			$roomtime = explode(":", $roommanager['TIME_IN']);
			$roomavail = $roomtime[0];
			if($day==$roommanager['DAY']||$nextsub==$roomavail){
				$endtime = $nextsub+2;
				$time = $nextsub.":00-".$endtime."00";
				switch ($day) {
				case 'TH':
					echo 
					'<br/><label>Room:</label>
					<input class = "form-control" name = "room" value = "'.$rooms['ROOM'].'" readonly/>
					<br/><label>Day:</label>
					<input class = "form-control" name = "day" value = "M-TH" readonly/>
					<br/><label>Time:</label>
					<input class = "form-control" name = "time" value = "'.$time.'" readonly/>';
					break;
				case 'F':
					echo 
					'<br/><label>Room:</label>
					<input class = "form-control" name = "room" value = "'.$rooms['ROOM'].'" readonly/>
					<br/><label>Day:</label>
					<input class = "form-control" name = "day" value = "T-F" readonly/>
					<br/><label>Time:</label>
					<input class = "form-control" name = "time" value = "'.$time.'" readonly/>';
					break;
				default:
					echo 
					'<br/><label>Room:</label>
					<input class = "form-control" name = "room" value = "'.$rooms['ROOM'].'" readonly/>
					<br/><label>Day:</label>
					<input class = "form-control" name = "day" value = "'.$day.'" readonly/>
					<br/><label>Time:</label>
					<input class = "form-control" name = "time" value = "'.$time.'" readonly/>';
					break;
				}
				break;
			}

		}
	}			
	$count=100;