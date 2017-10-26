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
                <a href="#">Subject Details</a>
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

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>


                        <tr>
                            <th>Subject Code</th>
                            <td class="center"><?php echo $row['SUBJECT_CODE'];?></td>
                        </tr>
                        <tr>
                            <th>Subject Type</th>
                            <td class="center"><?php $type = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID = '".$row['SUBTYPE']."'")); echo $type['TYPE'];?></td>
                        </tr>
                        <tr>
                            <th>Subject</th>
                            <td class="center"><?php echo $row['SUBJECT'];?></td>
                        </tr>
                         <tr>
                            <th>Department</th>
                            <td class="center">
                                <?php 
                                    $department = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$row['DEPARTMENT']."'"));

                                    echo $department['DEPARTMENT'];
                                ?>

                            </td>
                        </tr>
                          <tr>
                            <th>Lecture Units</th>
                            <td class="center"><?php echo $row['LECUNITS'];?></td>
                        </tr>
                        <tr>
                            <th>Laboratory Units</th>
                            <td class="center"><?php echo $row['LABUNITS'];?></td>
                        </tr>
                        <tr>
                            <th>Total Units</th>
                            <td class="center"><?php echo $row['TOTAL_UNITS'];?></td>
                        </tr> 
                        <tr>
                            <th>Lecture Hours</th>
                            <td class="center"><?php echo $row['LECHOURS'];?></td>
                        </tr> 
                        <tr>
                            <th>Laborartory Hours</th>
                            <td class="center"><?php echo $row['LABHOURS'];?></td>
                        </tr> 
                        <tr>
                            <th>Days Available</th>
                            <td class="center">
                                <?php
                                    if($row['MONDAY'])echo "Monday</br>";
                                    if($row['TUESDAY'])echo "Tuesday</br>";
                                    if($row['WEDNESDAY'])echo "Wednesday</br>";
                                    if($row['THURSDAY'])echo "Thursday</br>";
                                    if($row['FRIDAY'])echo "Friday</br>";
                                    if($row['SATURDAY'])echo "Saturday</br>";
                                ?>
                            </td>
                        </tr> 
                        <tr>
                            <td colspan="2">
                                <a class="btn btn-info" href="usubject.php?id=<?php echo $row['SID'];?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Edit
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');" href="dsubject.php?id=<?php echo $row['SID'];?>" title="Delete">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>  Delete             
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