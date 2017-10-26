            $subresult=mysql_query("SELECT * FROM schedule ORDER BY SCHOOL_YEAR DESC");}
            while($subrow=mysql_fetch_array($subresult)){
                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
                $subjectcode = $subjresult['SUBJECT_CODE'];
                $subject = $subjresult['SUBJECT'];
                
                $sectman = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE CM_ID = '".$subrow['CM_ID']."'"));
                //$yearresult = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '".$sectman['YEAR']."'"));
                $year = $sectman['YEAR'];
                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$sectman['COURSE']."'"));
                $course = $couresult['COURSE_CODE'];
                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$sectman['SECTION']."'"));
                $section = $secresult['SECTION']; 
                $dtresult = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = '".$sectman['DT_ID']."'"));
                $days = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$dtresult['DAY']."'"));
                $day = $days['DAY_CODE'];
                $start = $dtresult['START_TIME'];  
                $end = $dtresult['END_TIME'];         

                $termresult = mysql_fetch_array(mysql_query("SELECT TERM FROM term WHERE TERM_CODE = '".$subrow['TERM']."'"));
                $term = $termresult['TERM'];

                $rooms = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOMMAN_ID = '".$subrow['RM_ID']."'"));
                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$rooms['ROOM']."'"));
                $room = $roomresult['ROOM'];       

                $syresult = mysql_fetch_array(mysql_query("SELECT SY FROM schoolyear WHERE SY_ID = '".$subrow['SCHOOL_YEAR']."'"));
                $sy = $syresult['SY'];

                $lects = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE LM_ID = '".$subrow['LM_ID']."'"));
                $lectresult = mysql_fetch_array(mysql_query("SELECT LASTNAME FROM lecturer WHERE LECTURER_ID = '".$lects['LECTURER']."'"));
                $lect = $lectresult['LASTNAME'];    
        ?>
        <td><?php echo $subjectcode; ?></td>
        <td><?php echo $subject; ?></td>
        <td><?php echo $course."-".$year.$section; ?></td>
        <td><?php echo $day; ?></td>
        <td><?php echo $start."-".$end; ?></td>
        <td><?php echo $room; ?></td>
        <td><?php echo $lect; ?></td>