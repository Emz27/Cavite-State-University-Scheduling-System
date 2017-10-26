<?php
	session_start();
	include("weblock.php");
	include("header.php");
?>
<script type="text/javascript">
    function schoolYear(){
        var e = document.getElementById("year");
        var year = e.options[e.selectedIndex].value;
        var f = document.getElementById("term");
        var term = f.options[f.selectedIndex].value;
        if (term){
        location.href="schedule.php?year="+year+"&term="+term;
        }
        else
        location.href="schedule.php?year="+year;
    }
    function Term(){
        var e = document.getElementById("year");
        var year = e.options[e.selectedIndex].value;
        var f = document.getElementById("term");
        var term = f.options[f.selectedIndex].value;
        if (year){
        location.href="schedule.php?year="+year+"&term="+term;
        }
        else
        location.href="schedule.php?term="+term;
    }
</script>

<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="home.php">Home</a>
            </li>
            <li>
                <a href="#">Schedule</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-alt"></i>Schedule<a href="addsched.php" style="margin-left:700px;"> <i class="glyphicon glyphicon-plus"></i>Add Schedule</a><a href="resched.php" style="margin-left:2%;"> <i class="glyphicon glyphicon-plus"></i>Re-Schedule</a></h2>

        <div class="box-icon">
           <!--  <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">
    <div class="col-md-4">
    <label>School Year</label>
        <select class="form-control" onchange="schoolYear()" id = "year">
        <?php 
            
            if (isset($_GET['year'])) {
                
                $select = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear WHERE SY_ID = '".$_GET['year']."'"));
                echo "<option selected value = '".$_GET['year']."'>".$select['SY']."</option>";
            }
            else echo "<option hidden selected disabled></option>";

        ?>
        <?php include_once("connect.php");
            $result = mysql_query("SELECT * FROM schoolyear");
             while($row = mysql_fetch_array($result)){
                if (isset($_GET['year'])){
                if ($row['SY_ID']!=$_GET['year']){
        ?>
        <option value="<?php echo $row['SY_ID'];?>"><?php echo $row['SY'];?></option>
        <?php 
                }
            }
                else{
                    ?>

        <option value="<?php echo $row['SY_ID'];?>"><?php echo $row['SY'];?></option>
                    <?php
                }
        } ?>

        </select>
        


    </div>
    <div class="col-md-4">
        <label>
            Term
        </label>
                <select class="form-control" onchange="Term()" id = "term">
        <?php 

            if (isset($_GET['term'])) {
                $term = mysql_fetch_array(mysql_query("SELECT * FROM term WHERE TERM_CODE = '".$_GET['term']."'"));
                echo "<option selected value = '".$_GET['term']."'>".$term['TERM']."</option>";
            }
            else echo "<option hidden selected disabled></option>";

        ?>
        <?php include_once("connect.php");
            $result2 = mysql_query("SELECT * FROM term");
            while($row2 = mysql_fetch_array($result2)){
                if (isset($_GET['term'])){
                if ($row2['TERM_CODE']!=$_GET['term']){
        ?>
        <option value="<?php echo $row2['TERM_CODE'];?>"><?php echo $row2['TERM'];?></option>
        <?php 
                }
            }
                else{
                    ?>

        <option value="<?php echo $row2['TERM_CODE'];?>"><?php echo $row2['TERM'];?></option>
                    <?php
                }
        } ?>

        </select>
                                
    </div>
    <div class="col-md-4">
        
        <a class="btn btn-primary" href="schedprof.php" title="">Lecturer
        </a>        
        <a class="btn btn-primary" href="schedclass.php" title="">Sections
        </a>    
        <a class="btn btn-primary" href="schedroom.php" title="">Rooms
        </a>
        
    <br/>
    </div>
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>SUBJECT CODE</th>
        <th>SUBJECT</th>
        <th>COURSE YEAR&SECTION</th>
        <th>DAY</th>
        <th>TIME</th>
        <th>ROOM</th>
        <th>LECTURER</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include("connect.php");
            if (isset($_GET['year'])){
                $year = $_GET['year']; 
                if(isset($_GET['term'])){
                    $term = $_GET['term'];
                    $subresult=mysql_query("SELECT * FROM schedule WHERE TERM = '$term' AND SCHOOL_YEAR = '$year' ORDER BY SCHOOL_YEAR DESC ");            
                }
                else{
                $subresult=mysql_query("SELECT * FROM schedule WHERE SCHOOL_YEAR = '$year' ORDER BY SCHOOL_YEAR DESC ");
                }
            }
            else if (isset($_GET['term'])){
                $term = $_GET['term'];
                $subresult=mysql_query("SELECT * FROM schedule WHERE TERM = '$term' ORDER BY SCHOOL_YEAR DESC "); 
            }
            else {$subresult=mysql_query("SELECT * FROM schedule ORDER BY SCHOOL_YEAR DESC");}
            while($subrow=mysql_fetch_array($subresult)){
                $subjresult = mysql_fetch_array(mysql_query("SELECT SUBJECT_CODE,SUBJECT FROM subject WHERE SID = '".$subrow['SUBJECT']."'"));
                $subjectcode = $subjresult['SUBJECT_CODE'];
                $subject = $subjresult['SUBJECT'];
                
                //$sectman = mysql_fetch_array(mysql_query("SELECT * FROM classmanager WHERE CM_ID = '".$subrow['CM_ID']."'"));
                //$yearresult = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '".$sectman['YEAR']."'"));
               // $year = $sectman['YEAR'];
                $couresult = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$subrow['COURSE']."'"));
                $course = $couresult['COURSE_CODE'];
                $secresult = mysql_fetch_array(mysql_query("SELECT SECTION FROM section WHERE SECTION_ID = '".$subrow['SECTION']."'"));
                $section = $secresult['SECTION']; 
                //$dtresult = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DT_ID = '".$sectman['DT_ID']."'"));
                $days = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_ID = '".$subrow['DAYS']."'"));
                $day = $days['DAY_CODE'];
                $start = date("h:i A", strtotime($subrow['START_TIME']));  
                $end = date("h:i A", strtotime($subrow['END_TIME']));         

                $termresult = mysql_fetch_array(mysql_query("SELECT TERM FROM term WHERE TERM_CODE = '".$subrow['TERM']."'"));
                $term = $termresult['TERM'];

                //$rooms = mysql_fetch_array(mysql_query("SELECT * FROM roommanager WHERE ROOMMAN_ID = '".$subrow['RM_ID']."'"));
                $roomresult = mysql_fetch_array(mysql_query("SELECT ROOM FROM room WHERE ROOM_ID = '".$subrow['ROOM']."'"));
                $room = $roomresult['ROOM'];       

                $syresult = mysql_fetch_array(mysql_query("SELECT SY FROM schoolyear WHERE SY_ID = '".$subrow['SCHOOL_YEAR']."'"));
                $sy = $syresult['SY'];

                //$lects = mysql_fetch_array(mysql_query("SELECT * FROM lectmanager WHERE LM_ID = '".$subrow['LM_ID']."'"));
                $lectresult = mysql_fetch_array(mysql_query("SELECT LASTNAME FROM lecturer WHERE LECTURER_ID = '".$subrow['LECTURER']."'"));
                $lect = $lectresult['LASTNAME']; 
                $year = $subrow['YEAR'];   
        ?>
        <td><?php echo $subjectcode; ?></td>
        <td><?php echo $subject; ?></td>
        <td><?php if(isset($course)){echo $course."-".$year.$section;} else{echo "PETITION";} ?></td>
        <td><?php echo $day; ?></td>
        <td><?php echo $start."-".$end; ?></td>
        <td><?php echo $room; ?></td>
        <td><?php echo $lect; ?></td>


                                <td>
                                <!-- <a class="btn btn-info" href="usched.php?id=<?php echo $subrow['SCHED_ID'];?>" title="Update">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                </a> -->
                                <a class="btn btn-danger"  data-noty-options="{"text":"Delete Successful","layout":"topLeft","type":"success"}" href="dsched.php?id=<?php echo $subrow['SCHED_CODE'];?>" title="Delete">
                                    <i class="glyphicon glyphicon-trash icon-white"></i> 
                                </a>
                                </td>
                                
    </tr>      
   <?php
    }
   ?>
    
    </tbody>
    </table>
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