<?php
    session_start();
    include("weblock.php");
    include("header.php");
   


?>
<script type="text/javascript">
function check(){
    if(document.getElementById('cM').checked){
        document.getElementById('cstartM').disabled=false;
        document.getElementById('cendM').disabled=false;
    }
    else{
        document.getElementById('cstartM').disabled=true;
        document.getElementById('cendM').disabled=true;
    }
     if(document.getElementById('cT').checked){
        document.getElementById('cstartT').disabled=false;
        document.getElementById('cendT').disabled=false;
    }
    else{
        document.getElementById('cstartT').disabled=true;
        document.getElementById('cendT').disabled=true;
    }
     if(document.getElementById('cW').checked){
        document.getElementById('cstartW').disabled=false;
        document.getElementById('cendW').disabled=false;
    }
    else{
        document.getElementById('cstartW').disabled=true;
        document.getElementById('cendW').disabled=true;
    }
     if(document.getElementById('cTH').checked){
        document.getElementById('cstartTH').disabled=false;
        document.getElementById('cendTH').disabled=false;
    }
    else{
        document.getElementById('cstartTH').disabled=true;
        document.getElementById('cendTH').disabled=true;
    }
     if(document.getElementById('cF').checked){
        document.getElementById('cstartF').disabled=false;
        document.getElementById('cendF').disabled=false;
    }
    else{
        document.getElementById('cstartF').disabled=true;
        document.getElementById('cendF').disabled=true;
    }
     if(document.getElementById('cSAT').checked){
        document.getElementById('cstartSAT').disabled=false;
        document.getElementById('cendSAT').disabled=false;
    }
    else{
        document.getElementById('cstartSAT').disabled=true;
        document.getElementById('cendSAT').disabled=true;
    }
    if(document.getElementById('cSUN').checked){
        document.getElementById('cstartSUN').disabled=false;
        document.getElementById('cendSUN').disabled=false;
    }
    else{
        document.getElementById('cstartSUN').disabled=true;
        document.getElementById('cendSUN').disabled=true;
    }


}
</script>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="lecturer.php">Lecturer</a>
            </li>
            <li>
                <a href="#"> Add New Lecturer</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-plus"></i> Add New Lecturer</h2>

        <div class="box-icon">
           <!--  <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
   <!-- //starthere -->
<?php
    if(isset($_POST['add'])){


            $fname=$_POST['fname'];
            $mname=$_POST['mname'];
            $lname=$_POST['lname'];
            $dept=$_POST['dept'];
            $advisee=$_POST['advisee'];
            $designation=$_POST['designation'];
            $research=$_POST['research'];
            $extension=$_POST['extension'];
            $status=$_POST['status'];



            
                $resultas=mysql_query("INSERT INTO `lecturer`(`FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `DEPARTMENT`,`ADVISEE`,`DESIGNATION`,`RESEARCH`,`EXTENSION`, `STATUS`) VALUES ('$fname','$mname','$lname','$dept','$advisee','$designation','$research','$extension','$status');");
                    if($resultas){
                        $id=mysql_fetch_array(mysql_query("SELECT * FROM lecturer ORDER BY LECTURER_ID DESC"));


                        $ids= $id['LECTURER_ID'];

                            $day=$_POST['day'];
                            $start=$_POST['cstart'];
                            $end=$_POST['cend'];

                            for($i=0, $count = count($day);$i<$count;$i++) {
                                $days  = $day[$i];
                                $starts = $start[$i];
                                $ends=$end[$i];
                                   // echo $days." ".$starts." ". $ends;
                                         $resulq=mysql_query("INSERT INTO `availability`( `LECTURER`, `DAYS`, `START_TIME`, `END_TIME`) VALUES  ('$ids','$days','$starts','$ends')");
                                         //lectmanage($days,$starts,$ends);    
                                    
                                    if($resulq){
                                       header("location:lecturer.php");
                                   }
                            }
                    }
            }          

           
             
            // function lectmanage($day,$star,$en){
            //                                     $j = array('8:00','10:00','13:00','15:00','17:00','19:00');
            //                                     $k = array('10:00','12:00','15:00','17:00','19:00','21:00');
            //                                     $id = mysql_fetch_array(mysql_query("SELECT * FROM lecturer ORDER BY LECTURER_ID DESC"));
            //                                     $ids = $id['LECTURER_ID'];
            //                                     $starter = explode(":", $star);
            //                                     $starters = $starter[0];
            //                                     $ender = explode(":", $en);
            //                                     $enders = $ender[0];
            //                                     for ($l=0; $l < 6; $l++) { 
            //                                         $daytime = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_CODE = '$day'"));
            //                                         $day = $daytime['DAY_ID'];
            //                                         $started = explode(":", $j[$l]);
            //                                         $starteds = $started[0];
            //                                         $ended = explode(":", $k[$l]);
            //                                         $endeds = $ended[0];
            //                                         $daytimes = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DAY = '$day' AND START_TIME = '$j[$l]' AND END_TIME = '$k[$l]'"));
                                                    
            //                                         if($starters<=$starteds&&$enders>=$endeds&&isset($daytime)){
            //                                             $results=mysql_query("INSERT INTO `lectmanager`( `LECTURER`, `DT_ID`) VALUES ('$ids','".$daytimes['DT_ID']."')");
            //                                         }
            //                                     }
            //                                 } 


    
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Firstname</label>
                                <input type="text"  name="fname" class="form-control" value="" required/>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Middlename</label>
                                <input type="text"  name="mname" class="form-control" value="" required/>
                            </td>
                        </tr>
                          <tr>
                            
                            <td class="center">
                                <label for="exampleInputEmail1">Lastname</label>
                                <input type="text" name="lname"   class="form-control" value="" required/>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Department</label>
                                <select  name="dept"  class="form-control" required/>
                                    <option value="" selected></option>
                                    <?php
                                        $results=mysql_query("SELECT * FROM `department`");
                                        while($dept=mysql_fetch_array($results)){

                                            echo "<option value=".$dept['DID'].">".$dept['DEPARTMENT']."</option>";
                                        }
                                  ?>

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                            <label for="exampleInputEmail1">Advisee</label>
                                <select class="form-control" name = "advisee" >
                                <option hidden disabled selected></option>
                                <?php
                                    $courses = mysql_query("SELECT * FROM course");
                                    while ($course = mysql_fetch_array($courses)){
                                        $years = mysql_query("SELECT * FROM year");
                                        while ($year = mysql_fetch_array($years)){
                                            $sections = mysql_query("SELECT * FROM section");
                                            while ($section = mysql_fetch_array($sections)){
                                                unset($continue);
                                                $string = $course['COURSE_CODE'].'-'.$year['YEAR_ID'].$section['SECTION'];
                                                $sql = mysql_query("SELECT * FROM lecturer");
                                                while($lect = mysql_fetch_array($sql)){
                                                    
                                                    if($lect['ADVISEE'] == $string ){
                                                        $continue = 1;
                                                        break;
                                                    }
                                                }
                                                if(isset($continue))continue;

                                                echo '<option value="'.$string.'">'.$string.'</option>';
                                            }
                                        }
                                    }
                                ?>  
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Designation</label>
                                <input type="text"  name="designation" class="form-control" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Research</label>
                                <input type="text"  name="research" class="form-control" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Extension</label>
                                <input type="text"  name="extension" class="form-control" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Availability</label>
                            </br>
                                <?php
                                    $resultsa=mysql_query("SELECT * FROM `days`");
                                    $i=1;
                                    while($days=mysql_fetch_array($resultsa)){
                                ?>
                                <div style="width:800px;clear:both;">
                                    <div style="width:30%;float:left;">
                                        <input type="checkbox" name="day[]" id="<?php echo "c".$days['DAY_CODE']."";?>" value="<?php echo $days['DAY_ID'];  ?>" onclick="check()"/> <?php echo $days['DAY']."</br>";?> 
                                    </div>
                                    <div style="width:40%;float:left;" >
                                       Start Time 
                                       <select name="cstart[]" id="<?php echo "cstart".$days['DAY_CODE']."";?>" disabled/>
                                            <option value="" selected disabled></option>
                                            <?php     
                                                    $min=array("00","30");

                                                for($i=8;$i<18;$i++){
                                                    foreach ($min as $v){
                                                       echo "<option value='$i:$v'>$i:$v</option>";
                                                             
                                                         }
                                                         }

                                                ?>
                                                <option value="18:00">18:00</option>

                                        </select>
 
                                        
                                    </div>
                                    <div style="width:30%;float:left;" >
                                       End Time 
                                       <select name="cend[]" id="<?php echo "cend".$days['DAY_CODE']."";?>" disabled>
                                         <option value="" selected disabled></option>
                                                 <?php     
                                                    $min=array("00","30");

                                                for($i=12;$i<22;$i++){
                                                    foreach ($min as $v){
                                                       echo "<option value='$i:$v'>$i:$v</option>";
                                                             
                                                         }
                                                         }

                                                ?>
                                                <option value="21:00">21:00</option>

                                        </select>
                                    </div>
                                </div>

                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Status</label>
                               <select  name="status"  class="form-control" required/>
                                    <option value="" selected></option>
                                    <?php
                                        $resulta=mysql_query("SELECT * FROM `status`");
                                        while($dept=mysql_fetch_array($resulta)){

                                            echo "<option value=".$dept['STAT_ID'].">".$dept['EMPLOYMENT_STATUS']."</option>";
                                        }
                                  ?>

                                </select>
                            </td>
                        </tr>

                        <!-- <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Designation</label>
                                <input type="text"  name="designation" class="form-control" value="" required/>
                            </td>
                        </tr> -->
                       <tr>
                        <td>
                            <button class="btn btn-info" name="add" >
                                    <i class="glyphicon glyphicon-plus icon-white"></i>
                                    Add
                                </button>
                        </td>
                       </tr>
                                      
                
                            
                    </form>                  
                        </tbody>
                    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->





<!--/row-->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    <hr>
<?php
    include("footer.php");
?>