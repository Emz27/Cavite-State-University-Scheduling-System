<?php
	session_start();
	include("weblock.php");
	include("header.php");
    if (!isset($_GET['id'])) header("location:department.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `department` WHERE DID = '".$_GET['id']."'"));
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
                <a href="#">Department Details</a>
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

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>


                        <tr>
                            <th>DEPARTMENT CODE</th>
                            <td class="center"><?php echo $row['DEP_CODE'];?></td>
                        </tr>
                        <tr>
                            <th>DEPARTMENT</th>
                            <td class="center"><?php echo $row['DEPARTMENT'];?></td>
                        </tr>
                        <tr>
                            <th>CHAIRPERSON</th>
                            <td class="center">
                                <?php

                                    $lecturer = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$row['CHAIRPERSON']."'"));
                                    echo $lecturer['FIRSTNAME']." ".$lecturer['MIDDLENAME']." ".$lecturer['LASTNAME'];



                                ?>
                            </td>
                        </tr>
                          <tr>
                            <th>SUBJECT TYPES HANDLED</th>
                            <td class="center"><?php 
                            include_once("connect.php");
                            $subjects = mysql_query("SELECT * FROM subjecttype WHERE DEPARTMENT = '".$row['DID']."'");
                            while($subject = mysql_fetch_array($subjects)){
                                echo $subject['TYPE'];
                                echo '<br/>';
                            }

                            ?></td>
                        </tr>
                          <tr>
                            <th>CURRENT LECTURERS</th>
                            <td class="center"><?php 
                            include_once("connect.php");
                            $lect = mysql_query("SELECT * FROM lecturer WHERE DEPARTMENT = '".$row['DID']."'");
                            while($lects = mysql_fetch_array($lect)){
                                echo $lects['LASTNAME']." , ".$lects['FIRSTNAME']." ".$lects['MIDDLENAME'];
                                echo '<br/>';
                            }

                            ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a class="btn btn-info" href="udepartment.php?id=<?php echo $id;?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>Edit
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this lecturer?');" href="ddepartment.php?id=<?php echo $id;?>" title="Delete">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>Delete             
                                </a>
                            </td>  
                        </tr>                         
                
                            
                        
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