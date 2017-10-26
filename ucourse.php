<?php
	session_start();
	include("weblock.php");
	include("header.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `course` WHERE  CID='$id'"));
    ob_start();

?>

<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="course.php">Courses</a>
            </li>
            <li>
                <a href="#">Update Course Details</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> <?php echo $row['COURSE'];?></h2>

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
            $course=$_POST['course'];
            $dept = $_POST['dept'];

           
            $results=mysql_query("UPDATE `course` SET `COURSE_CODE`='$code',`COURSE`='$course',`DEPARTMENT`='$dept' WHERE `CID`='$id'");
            if($results){
                echo "<script>
    window.alert('Changes Saved!');
    window.location.href='course.php';
</script> ";
            }
    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Course Code</label>
                                <input type="text" id = "course" name="code" class="form-control" value="<?php echo $row['COURSE_CODE'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Course</label>
                                <input type="text"  name="course" class="form-control" value="<?php echo $row['COURSE'];?>" required/></td>
                        </tr>
                        <tr>
                    <td class="center"><label for="exampleInputEmail1">Department</label>
                        <select class = "form-control" name="dept" required>
                            <?php


                            echo "<option value = '".$row['DEPARTMENT']."' selected>".$resul['DEPARTMENT']."</option>";
                            $resulta = mysql_query("SELECT * FROM department");
                            while($resultas = mysql_fetch_array($resulta)){

                                if($resultas['DID']!=$row['DEPARTMENT']){
                                    ?>
                                    <option value="<?php echo $resultas['DID'];?>"><?php echo $resultas['DEPARTMENT'];?></option>
                                    <?php
                                }

                            }
                            ?>
                        </select>
                </tr>
                          
                       <tr>
                        <td>
                            <button class="btn btn-info" name="update" onclick="return confirm('Are you sure you want save the changes?');">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Update
                            </button>

                            <button class="btn btn-info" type = "button" name="addsub" id = "addsub" onclick="location.href='cursubs.php?course=<?php echo $row['CID'];?>'">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    View Curriculum
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