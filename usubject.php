<?php
	session_start();
	include("weblock.php");
	include("header.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `subject` WHERE  SID='$id'"));


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="subject.php">Subjects</a>
            </li>
            <li>
                <a href="#">Update Subject Details</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> <?php echo $row['SUBJECT'];?></h2>

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
    if(isset($_POST['update'])){
            $code=$_POST['code'];
            $subject=$_POST['subject'];
            $subtype = $_POST['subtype'];
            $department = $_POST['department'];
            $lab=$_POST['lab'];
            $lec=$_POST['lec'];
            $lechours=$_POST['lechours'];
            $labhours=$_POST['labhours'];
            $total=$lec+$lab;
            
            $monday = 0;
            $tuesday = 0;
            $wednesday = 0;
            $thursday = 0;
            $friday = 0;
            $saturday = 0;

            if(isset($_POST['monday']))$monday = $_POST['monday'];
            if(isset($_POST['tuesday']))$tuesday = $_POST['tuesday'];
            if(isset($_POST['wednesday']))$wednesday = $_POST['wednesday'];
            if(isset($_POST['thursday']))$thursday = $_POST['thursday'];
            if(isset($_POST['friday']))$friday = $_POST['friday'];
            if(isset($_POST['saturday']))$saturday = $_POST['saturday'];

            $results = mysql_query("UPDATE subject 
                SET SUBJECT_CODE = '$code' , 
                SUBJECT = '$subject' , 
                SUBTYPE = '$subtype' , 
                DEPARTMENT = '$department' , 
                LECUNITS = '$lec' , 
                LABUNITS = '$lab' , 
                TOTAL_UNITS = '$total' , 
                LECHOURS = '$lechours' , 
                LABHOURS = '$labhours' , 
                MONDAY = '$monday' , 
                TUESDAY = '$tuesday' , 
                WEDNESDAY = '$wednesday' , 
                THURSDAY = '$thursday' , 
                FRIDAY = '$friday' , 
                SATURDAY = '$saturday' 
                WHERE SID = '$id'");

            if($results){
                echo "<script>
    window.alert('Changes Saved!');
    window.location.href='vsubject.php?id=$id';
</script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Subject Code</label>
                                <input type="text"  name="code" class="form-control" value="<?php echo $row['SUBJECT_CODE'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Subject</label>
                                <input type="text"  name="subject" class="form-control" value="<?php echo $row['SUBJECT'];?>" required/></td>
                        </tr>
                        <tr>
                            <td class="center"><label for="exampleInputEmail1">Subject Type</label>
                                <select name="subtype" class="form-control">
                                <?php $type = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID = '".$row['SUBTYPE']."'"));?>
                                    <option selected value="<?php echo $type['TID'];?>"><?php echo $type['TYPE'];?></option>

                                    <?php
                                        $result2 = mysql_query("SELECT * FROM subjecttype");
                                        while ($row2 = mysql_fetch_array($result2)) {
                                            if($row2['TID']!=$row['SUBTYPE']){
                                            ?>
                                            <option value = "<?php echo $row2['TID'];?>"><?php echo $row2['TYPE'];?></option>
                                            <?php
                                        }
                                        }
                                    ?>     
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="center"><label for="exampleInputEmail1">Department</label>

                                <select name="department" class="form-control">
                                    <?php
                                        $dept = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$row['DEPARTMENT']."'"));
                                    echo '<option selected value = '.$dept['DID'].' >'.$dept['DEPARTMENT'].'</option>
                                        <option value="0"></option>';
                                   
                                        $result = mysql_query("SELECT * FROM department");

                                        while ($row2 = mysql_fetch_array($result)) {

                                            if($row2['DID'] == $row['DEPARTMENT'])continue;

                                            echo '<option value = '.$row2['DID'].'>'.$row2['DEPARTMENT'].'</option>';

                                        }
                                    ?>     
                                </select>
                            </td>
                        </tr>
                          <tr>
                            
                            <td class="center"><label for="exampleInputEmail1">Lecture Units</label>
                                <input type="number" name="lec"   min="0"  max="6" class="form-control" value="<?php echo $row['LECUNITS'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Laboratory Units</label>
                                <input type="number" name="lab"  min="0"  max="6" class="form-control" value="<?php echo $row['LABUNITS'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Lecture Hours</label>
                                <input type="number" name="lechours"  min="0"  max="6" class="form-control" value="<?php echo $row['LECHOURS'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Laboratory Hours</label>
                                <input type="number" name="labhours"  min="0"  max="6" class="form-control" value="<?php echo $row['LABHOURS'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Days Available</label></br>
                                <?php
                                if($row['MONDAY'])  echo '<input type="checkbox" name="monday" value="1" checked >Monday</br> ';
                                else echo '<input type="checkbox" name="monday" value="1" >Monday</br> ';
                                if($row['TUESDAY']) echo ' <input type="checkbox" name="tuesday" value="1" checked   >Tuesday</br>';
                                else echo ' <input type="checkbox" name="tuesday" value="1"    >Tuesday</br>';
                                if($row['WEDNESDAY']) echo '<input type="checkbox" name="wednesday" value="1" checked >Wednesday</br> ';
                                else echo '<input type="checkbox" name="wednesday" value="1" >Wednesday</br> ';
                                if($row['THURSDAY']) echo '<input type="checkbox" name="thursday" value="1" checked >Thursday</br> ';
                                else echo '<input type="checkbox" name="thursday" value="1"  >Thursday</br> '; 
                                if($row['FRIDAY']) echo ' <input type="checkbox" name="friday" value="1" checked  >Friday</br>';
                                else echo ' <input type="checkbox" name="friday" value="1"   >Friday</br>'; 
                                if($row['SATURDAY']) echo '<input type="checkbox" name="saturday" value="1" checked  >Saturday</br> ';
                                else echo ' <input type="checkbox" name="saturday" value="1"   >Saturday</br>';


                                ?>
                            </td>
                        </tr>
                       <tr>
                        <td>
                            <button class="btn btn-info" name="update" onclick="return confirm('Are you sure you want save the changes?');">
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