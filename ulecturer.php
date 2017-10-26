<?php
    session_start();
    include("weblock.php");
    include("header.php");
    $id=$_GET['id'];
    $roe=mysql_fetch_array(mysql_query("SELECT * FROM `lecturer` WHERE LECTURER_ID='$id'"));
   


?>
<script type="text/javascript">
function check(){
    if(document.getElementById('c1').checked){
        $('#cstart1').prop('disabled', false);
        $('#cend1').prop('disabled', false);
        var cheer=document.getElementById('s1').value;
        var cheers=document.getElementById('e1').value;
        $('#cstart1').val(cheer);
        $('#cend1').val(cheers);
    }
    else{
        $('#cstart1').prop('disabled', true);
        $('#cend1').prop('disabled', true);
        $('#cstart1').val('');
         $('#cend1').val('');
    }
    if(document.getElementById('c2').checked){
        $('#cstart2').prop('disabled', false);
        $('#cend2').prop('disabled', false);
        var cheer=document.getElementById('s2').value;
        var cheers=document.getElementById('e2').value;
        $('#cstart2').val(cheer);
        $('#cend2').val(cheers);
    }
    else{
        $('#cstart2').prop('disabled', true);
        $('#cend2').prop('disabled', true);
        $('#cstart2').val('');
         $('#cend2').val('');
    }
    if(document.getElementById('c3').checked){
        $('#cstart3').prop('disabled', false);
        $('#cend3').prop('disabled', false);
        var cheer=document.getElementById('s3').value;
        var cheers=document.getElementById('e3').value;
        $('#cstart3').val(cheer);
        $('#cend3').val(cheers);
    }
    else{
        $('#cstart3').prop('disabled', true);
        $('#cend3').prop('disabled', true);
        $('#cstart3').val('');
         $('#cend3').val('');
    }
    if(document.getElementById('c4').checked){
        $('#cstart4').prop('disabled', false);
        $('#cend4').prop('disabled', false);
        var cheer=document.getElementById('s4').value;
        var cheers=document.getElementById('e4').value;
        $('#cstart4').val(cheer);
        $('#cend4').val(cheers);
    }
    else{
        $('#cstart4').prop('disabled', true);
        $('#cend4').prop('disabled', true);
        $('#cstart4').val('');
         $('#cend4').val('');
    }
    if(document.getElementById('c5').checked){
        $('#cstart5').prop('disabled', false);
        $('#cend5').prop('disabled', false);
        var cheer=document.getElementById('s5').value;
        var cheers=document.getElementById('e5').value;
        $('#cstart5').val(cheer);
        $('#cend5').val(cheers);
    }
    else{
        $('#cstart5').prop('disabled', true);
        $('#cend5').prop('disabled', true);
        $('#cstart5').val('');
         $('#cend5').val('');
    }
    if(document.getElementById('c6').checked){
        $('#cstart6').prop('disabled', false);
        $('#cend6').prop('disabled', false);
        var cheer=document.getElementById('s6').value;
        var cheers=document.getElementById('e6').value;
        $('#cstart6').val(cheer);
        $('#cend6').val(cheers);
    }
    else{
        $('#cstart6').prop('disabled', true);
        $('#cend6').prop('disabled', true);
        $('#cstart6').val('');
         $('#cend6').val('');
    }
        if(document.getElementById('c7').checked){
        $('#cstart7').prop('disabled', false);
        $('#cend7').prop('disabled', false);
        var cheer=document.getElementById('s7').value;
        var cheers=document.getElementById('e7').value;
        $('#cstart7').val(cheer);
        $('#cend7').val(cheers);
    }
    else{
        $('#cstart7').prop('disabled', true);
        $('#cend7').prop('disabled', true);
        $('#cstart7').val('');
         $('#cend7').val('');
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
                <a href="#"> Update Lecturer Details</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Update Lecturer Details</h2>

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

                $resultas=mysql_query("UPDATE `lecturer` SET `FIRSTNAME`='$fname',`MIDDLENAME`='$mname',`LASTNAME`='$lname',`DEPARTMENT`='$dept',`ADVISEE` = '$advisee',`DESIGNATION` = '$designation',`RESEARCH` = '$research',`EXTENSION` = '$extension',`STATUS`='$status' WHERE `LECTURER_ID`='$id'");
                    
                    if($resultas){
                            $ider=$_POST['ids'];
                            $dayd=$_POST['day'];
                            $start=$_POST['cstart'];
                            $end=$_POST['cend'];
                            //a$resulq=mysql_query("DELETE FROM `availability` WHERE `LECTURER`='$id'");
                            $resultss =mysql_query("DELETE FROM `lectmanager` WHERE `LECTURER`='$id'");
                             
                            for($i=0, $count = count($dayd);$i<$count;$i++) {
                                $iders=$ider[$i];
                                $daysd  = $dayd[$i];
                                $starts = $start[$i];
                                $ends=$end[$i];
                                //echo $days." ".$starts." ". $ends;

                                if($iders!=""){
                                        $resulq=mysql_query("UPDATE `availability` SET `DAYS`='$daysd',`START_TIME`='$starts',`END_TIME`='$ends' WHERE `AVAIL_ID`='$iders' and `LECTURER`='$id'");
                                        
                                        }
                                else{
                                            $resulq=mysql_query("INSERT INTO `availability`( `LECTURER`, `DAYS`, `START_TIME`, `END_TIME`) VALUES  ('$id','$daysd','$starts','$ends')");
                                }
                                    updatelec($id,$starts,$ends,$daysd);
                                    }
                                    if($resulq){
                                            echo "<script>
                                                 window.alert('Successfully Updated!');
                                                 window.location.href='lecturer.php';
                                             </script> ";
                                         }
                                    }
                            }
                                        function updatelec($id,$star,$en,$days){
                                                $j = array('8:00','10:00','13:00','15:00','17:00','19:00');
                                                $k = array('10:00','12:00','15:00','17:00','19:00','21:00');
                                                
                                                $starter = explode(":", $star);
                                                $starters = $starter[0];
                                                $ender = explode(":", $en);
                                                $enders = $ender[0];
                                                for ($l=0; $l < 6; $l++) { 
                                                    $daytime = mysql_fetch_array(mysql_query("SELECT * FROM days WHERE DAY_CODE = '$days'"));
                                                    $day = $daytime['DAY_ID'];
                                                    $started = explode(":", $j[$l]);
                                                    $starteds = $started[0];
                                                    $ended = explode(":", $k[$l]);
                                                    $endeds = $ended[0];
                                                    $daytimes = mysql_fetch_array(mysql_query("SELECT * FROM daytimemanager WHERE DAY = '$day' AND START_TIME = '$j[$l]' AND END_TIME = '$k[$l]'"));
                                                    
                                                    if($starters<=$starteds&&$enders>=$endeds&&isset($daytime)){
                                                        $results=mysql_query("INSERT INTO `lectmanager`( `LECTURER`, `DT_ID`) VALUES ('$id','".$daytimes['DT_ID']."')");
                                                    }
                                                }
                                            } 
                      

           
            

// echo "<script>
//                                                 window.alert('Successfully Added!');
//                                                 window.location.href='lecturer.php';
//                                             </script> ";

    
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Firstname</label>
                                <input type="text"  name="fname" class="form-control" value="<?php echo $roe['FIRSTNAME'];?>" required/>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Middlename</label>
                                <input type="text"  name="mname" class="form-control" value="<?php echo $roe['MIDDLENAME'];?>" required/>
                            </td>
                        </tr>
                          <tr>
                            
                            <td class="center">
                                <label for="exampleInputEmail1">Lastname</label>
                                <input type="text" name="lname"   class="form-control" value="<?php echo $roe['LASTNAME'];?>" required/>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Department</label>
                                <select  name="dept"  class="form-control" required/>
                                    

                                    <?php
                                        $did=$roe['DEPARTMENT'];
                                        $depts=mysql_fetch_array(mysql_query("SELECT * FROM `department` WHERE DID='$did'"));

                                            echo "<option value=".$depts['DID'].">".$depts['DEPARTMENT']."</option>";
                                        
                                  ?>
                                    <?php
                                        $results=mysql_query("SELECT * FROM `department`");
                                        while($dept=mysql_fetch_array($results)){
                                            if ($dept['DID']!=$depts['DID'])
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
                                
                                <?php
                                    echo '<option value="'.$roe['ADVISEE'].'" selected>'.$roe['ADVISEE'].'</option>';
                                    $courses = mysql_query("SELECT * FROM course");
                                    while ($course = mysql_fetch_array($courses)){
                                        $years = mysql_query("SELECT * FROM year");
                                        while ($year = mysql_fetch_array($years)){
                                            $sections = mysql_query("SELECT * FROM section");
                                            while ($section = mysql_fetch_array($sections)){
                                                unset($continue);
                                                unset($self);
                                                $string = $course['COURSE_CODE'].'-'.$year['YEAR_ID'].$section['SECTION'];
                                                $sql = mysql_query("SELECT * FROM lecturer");
                                                while($lect = mysql_fetch_array($sql)){

                                                    if($lect['ADVISEE'] == $string ){
                                                        $continue = 1;
                                                        break;
                                                    }
                                                }
                                                if(isset($continue)){
                                                    
                                                    continue;
                                                }

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
                                <input type="text"  name="designation" class="form-control" value="<?php echo $roe['DESIGNATION'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Research</label>
                                <input type="text"  name="research" class="form-control" value="<?php echo $roe['RESEARCH'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Extension</label>
                                <input type="text"  name="extension" class="form-control" value="<?php echo $roe['EXTENSION'];?>" />
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Availability</label>
                            </br>
                                <?php
                                    $resultsa=mysql_query("SELECT * FROM `days`");
                                    
                                    while($days=mysql_fetch_array($resultsa)){
                                        $dayss=$days['DAY_ID'];
                                ?>
                                <div style="width:800px;clear:both;">
                                    <div style="width:30%;float:left;">
                                        <input type="checkbox" name="day[]" id="<?php echo "c".$dayss."";?>" 
                                            value="<?php echo $dayss;?>" 
                                                <?php 
                                                    $raws=mysql_fetch_array(mysql_query("SELECT * FROM availability WHERE LECTURER='$id' AND DAYS='$dayss'"));
                                                    if($raws['DAYS']==$dayss){
                                                        echo "checked";
                                                    }
                                                    ?>

                                        onclick="check()"

                                        /> <?php echo $days['DAY']."</br>";?> 
                                    </div>
                                    <div style="width:40%;float:left;" >
                                       Start Time 
                                       <?php echo $dayss;?>
                                       <select name="cstart[]" id="<?php echo "cstart".$dayss."";?>" disabled/>
                                            
                                                        <?php $time = date("h:i A", strtotime($raws['START_TIME'])); ?>                                                  
                                            <option value="<?php echo $raws['START_TIME'];?>"><?php if (isset($raws['START_TIME']))echo $time;?></option>

                                            <option hidden disabled></option>
                                            <?php     
                                                    $min=array("00","30");

                                                for($i=7;$i<18;$i++){
                                                    foreach ($min as $v){
                                                        $times = $i.':'.$v;
                                                        
                                                        $time = date("h:i A", strtotime($times));
                                                        if ($raws['START_TIME']!=$time)
                                                            echo "<option value='$i:$v'>".$time."</option>";
                                                        }
                                                }
                                                        $time = date("h:i A", strtotime('18:00'));
                                                echo '<option value="18:00">'.$time.'</option>';
                                                ?>


                                        </select>
                                        <input type="hidden" id="<?php echo "s".$dayss."" ?>" value="<?php echo $raws['START_TIME'];?>">
 
                                        
                                    </div>
                                    <div style="width:30%;float:left;" >
                                       End Time 
                                       <select name="cend[]" id="<?php echo "cend".$dayss."";?>" disabled>

                                                        <?php $time = date("h:i A", strtotime($raws['END_TIME'])); ?>
                                        <option value="<?php echo $raws['END_TIME'];?>"><?php if (isset($raws['END_TIME']))echo $time;?></option>
                                         <option hidden disabled></option>
                                                 <?php     
                                                    $min=array("00","30");

                                                for($i=7;$i<18;$i++){
                                                    foreach ($min as $v){
                                                        $timer = $i.':'.$v;
                                                        $time = date("h:i A", strtotime($timer));
                                                        
                                                       echo "<option value='$i:$v'>$time</option>";
                                                             
                                                         }
                                                         }

                                                        $time = date("h:i A", strtotime('18:00'));
                                                echo '<option value="18:00">'.$time.'</option>';

                                                ?>

                                        </select>
                                           <input type="hidden" id="<?php echo "e".$dayss."" ?>" value="<?php echo $raws['END_TIME'];?>">

                                        <input type="hidden" name="ids[]" value="<?php echo $raws['AVAIL_ID'];?>">
                                       <!--  <?php echo $raws['AVAIL_ID'];?> --> 

                                       <a href="davailability.php?id=<?php echo $raws['AVAIL_ID'];?>&lecid=<?php echo $id;?>" title="Remove Availability"><i class="glyphicon glyphicon-trash"></i></a>
                                    </div>
                                </div>

                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Status</label>
                               <select  name="status"  class="form-control" required/>
  
                                    <?php
                                    $ids=$roe['STATUS'];
                                        $resulta=mysql_query("SELECT * FROM `status` WHERE STAT_ID='$ids'");
                                        while($deptu=mysql_fetch_array($resulta)){
                                            echo "<option value=".$deptu['STAT_ID']." disabled>".$deptu['EMPLOYMENT_STATUS']."</option>";
                                        }
                                  ?>
                                  
                                <?php
                                    
                                        $resultr=mysql_query("SELECT * FROM `status` ");
                                        while($deptur=mysql_fetch_array($resultr)){ 
                                            if($deptu['STAT_ID']!=$deptur['STAT_ID']){
                                                echo "<option value=".$deptur['STAT_ID'].">".$deptur['EMPLOYMENT_STATUS']."</option>";
                                            }
                                        }
                                  ?>
                                </select>
                            </td>
                        </tr>
                       <tr>
                        <td>
                            <button class="btn btn-info" name="add" >
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Update
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