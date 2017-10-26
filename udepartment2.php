<?php
	session_start();
    if (!isset($_GET['id']))header("location:department.php");
	include("weblock.php");
	include("header.php");
    include("connect.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `department` WHERE  DID='$id'"));
    if (isset($_GET['del'])){

               // echo $_GET['del'];
                $result = mysql_query("UPDATE lecturer SET DEPARTMENT = 0 WHERE LECTURER_ID = '".$_GET['del']."'");
                unset($_GET['del']);

    }


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="department.php">Department</a>
            </li>
            <li>
                <a href="#">Update Department Details</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> <?php echo $row['DEP_CODE'];?></h2>

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
            $depcode=$_POST['depcode'];
            $department=$_POST['department'];
            $depid = $_POST['depid'];
            $chairperson = $_POST['chairperson'];
            
            if (isset($_POST['handled'])) {
                $handled = $_POST['handled'];
                for($i=0, $count = count($handled);$i<$count;$i++) {
                    $handleds = $handled[$i];
                    //echo $result['DID'];          
                    $returns = mysql_query("UPDATE subjecttype SET DEPARTMENT = '$depid' WHERE TID = '$handleds'");
                 }
            
            }
            
            if (isset($_POST['lects'])) {
                $lects = $_POST['lects'];
                 for($i=0, $count = count($lects);$i<$count;$i++) {
                    $lect = $lects[$i];
                    //echo $result['DID'];          
                    $returns = mysql_query("UPDATE lecturer SET DEPARTMENT = '$depid' WHERE LECTURER_ID = '$lect'");
                 }
            
            }

            $results=mysql_query("UPDATE `department` SET`DEP_CODE`='$depcode',`DEPARTMENT`='$department' ,`CHAIRPERSON` = '$chairperson' WHERE `DID`= '$id'");
            if($results){
                echo "<script>
    window.alert('Changes Saved!');
    window.location.href='udepartment.php?id=$id';
</script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Department Code</label>
                                <input type="text"  name="depcode" class="form-control" value="<?php echo $row['DEP_CODE'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Department</label>
                                <input type="text"  name="department" class="form-control" value="<?php echo $row['DEPARTMENT'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Chairperson</label>
                                <?php 
                                    
                                    
                                    $chair = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$row['CHAIRPERSON']."'"));

                                    echo'<br/>  



                                        <select class = "form-control" name = "chairperson" class="aw">



                                        <option selected value = '.$row['CHAIRPERSON'].'>'.$chair['LASTNAME'].' , '.$chair['FIRSTNAME'].' '.$chair['MIDDLENAME'].'</option>';

                                        $sql = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = '".$id."'");

                                        while($lecturers = mysql_fetch_array($sql)){

                                            if($lecturers['LECTURER_ID'] == $row['CHAIRPERSON'])continue;

                                            $lecturerObtained = 1;



                                            echo'<option value = '.$lecturers['LECTURER_ID'].'>'.$lecturers['LASTNAME'].' , '.$lecturers['FIRSTNAME'].' '.$lecturers['MIDDLENAME'].'</option>';
                                        }

                                    echo'</select>';

                                    // if (!isset($lecturerObtained)){

                                    //         echo '<br/><div class = "alert alert-danger">Sorry No Lecturers Available from the Department for the Subject</div><br/><a href="lecturer.php"><button class = "btn btn-primary" type="button">Add Lecturer</button></a>';
                                    //         return 0;

                                    // }
                                ?>
                        </tr>
    
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Add Handled Subject Groups</label>
                                  
                                    <?php
                                        $handled = mysql_query("SELECT * FROM subjecttype WHERE DEPARTMENT = 0");
                                        if (mysql_num_rows($handled)==0){
                                            ?>
                                            <input class = "form-control" disabled value="All Subject Groups Allotted">
                                            <?php
                                        }  
                                        else {
                                        while ($handledrows = mysql_fetch_array($handled)) {?>
                                        <div>
                                            <input type="checkbox" name="handled[]" value="<?php echo $handledrows['TID'];  ?>" /> <?php echo $handledrows['TYPE']."</br>";?> 

                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                        </tr>
                        <tr>
                            <td class="center"><label for="exampleInputEmail1">Subject Groups Handled</label>
                               <?php 
                                    include_once("connect.php");
                                    $subjects = mysql_query("SELECT * FROM subjecttype WHERE DEPARTMENT = '".$row['DID']."'");
                                    while($subject = mysql_fetch_array($subjects)){?>
                                    <table class="table table-striped table-bordered responsive">
                                        <tbody>
                                            <tr>
                                                <td class="center" style="width:90%;">
                                            <?php
                                                echo $subject['TYPE'];
                                                echo '<br/>';?>
                                                </td>
                                                <!-- <td class="center">
                                                    <button class="btn btn-danger" formaction = "udepartment.php?id=<?php echo $id;?>&del=<?php echo $subject['TID'];?>" name="upsub" onclick="return confirm('Are you sure you want delete the subject from the department?');" >
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Remove
                                                    </button>

                                                </td> -->
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php

                                    }
                                ?>                                    
                            </td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Add Lecturers</label>
                                  
                                    <?php
                                        $lect = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = 0");
                                        if (mysql_num_rows($lect)==0){
                                            ?>
                                            <input class = "form-control" disabled value="All Lecturers Designated">
                                            <?php
                                        }  
                                        else {
                                        while ($lects = mysql_fetch_array($lect)) {?>
                                        <div>
                                            <input type="checkbox" name="lects[]" value="<?php echo $lects['LECTURER_ID'];  ?>" /> 
                                            <?php echo $lects['LASTNAME']." , ".$lects['FIRSTNAME']." ".$lects['MIDDLENAME'];
                                            echo '<br/>'; ?>
                                        </div>
                                    <?php
                                        }
                                    }
                                    ?>
                        </tr>
                        <tr>
                            <td class="center"><label for="exampleInputEmail1">Lecturers</label>
                               <?php 
                                    include_once("connect.php");
                                    $lect = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = '".$row['DID']."'");
                                    while($lects = mysql_fetch_array($lect)){?>
                                    <table class="table table-striped table-bordered responsive">
                                        <tbody>
                                            <tr>
                                                <td class="center" style="width:90%;">
                                            <?php
                                                echo $lects['LASTNAME']." , ".$lects['FIRSTNAME']." ".$lects['MIDDLENAME'];
                                                ?>
                                                </td>
                                                <td class="center">
                                                    <button class="btn btn-danger" formaction = "udepartment.php?id=<?php echo $id;?>&del=<?php echo $lects['LECTURER_ID'];?>" name="remlec" onclick="return confirm('Are you sure you want delete the subject from the department?');" >
                                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                                        Remove
                                                    </button>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php

                                    }
                                ?>                                    
                            </td>
                        </tr>
                        <tr>

                        <input type="hidden" name = "depid" value="<?php echo $row['DID'];?>">
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