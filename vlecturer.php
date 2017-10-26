<?php
	session_start();
	include("weblock.php");
	include("header.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT lecturer.*,department.*,status.* FROM `lecturer` left join department ON lecturer.DEPARTMENT=department.DID left join status on lecturer.STATUS=status.STAT_ID WHERE  lecturer.LECTURER_ID='$id'"));


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="lecturer.php">Lecturers</a>
            </li>
            <li>
                <a href="#">Lecturer Details</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> <?php echo $row['FIRSTNAME']." ".$row['MIDDLENAME']." ".$row['LASTNAME'];?></h2>

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
                            <th>FIRSTNAME</th>
                            <td class="center"><?php echo $row['FIRSTNAME'];?></td>
                        </tr>
                        <tr>
                            <th>MIDDLENAME</th>
                            <td class="center"><?php echo $row['MIDDLENAME'];?></td>
                        </tr>
                          <tr>
                            <th>LASTNAME</th>
                            <td class="center"><?php echo $row['LASTNAME'];?></td>
                        </tr>
                        <tr>
                            <th>DEPARTMENT</th>
                            <td class="center"><?php echo $row['DEPARTMENT'];?></td>
                        </tr>
                        <tr>
                            <th>ADVISEE</th>
                            <td class="center"><?php echo $row['ADVISEE'];?></td>
                        </tr>
                        <tr>
                            
                                <th>Designation</th>
                                <td class="center"><?php echo $row['DESIGNATION'];?></td>
                            
                        </tr>
                        <tr>
                            
                                <th>Research</th>
                                <td class="center"><?php echo $row['RESEARCH'];?></td>
                           
                        </tr>
                        <tr>
                            
                                <th>Extension</th>
                                <td class="center"><?php echo $row['EXTENSION'];?></td>
                            
                        </tr>
                        <tr>
                            <th>AVAILABILITY</th>
                            <td class="center">
                                <?php 
                                    $results=mysql_query("SELECT `availability`.*,days.* FROM availability RIGHT JOIN days ON `availability`.`DAYS`=`days`.`DAY_ID` WHERE LECTURER='$id' order by `availability`.`AVAIL_ID`  ");
                                    while($avail=mysql_fetch_array($results)){
                                            
                                            echo $avail['DAY']."    ".$avail['START_TIME']."-".$avail['END_TIME']."</br>";


                                            }
                                 ?>

                                


                             </td>
                        </tr>
                        <tr>
                            <th>STATUS</th>
                            <td class="center"><?php echo $row['EMPLOYMENT_STATUS'];?></td>
                        </tr> 
                        <tr>
                            <td colspan="2">
                                <a class="btn btn-info" href="ulecturer.php?id=<?php echo $id;?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>Edit
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this lecturer?');" href="dlecturer.php?id=<?php echo $id;?>" title="Delete">
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