<?php
	session_start();
	include("weblock.php");
	include("header.php");
    include("connect.php");


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
        <h2><i class="glyphicon glyphicon-edit"></i>Add Department</h2>

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
    if(isset($_POST['create'])){
            $depcode=$_POST['depcode'];
            $department=$_POST['department'];

            $results=mysql_query("INSERT INTO `department`(DEP_CODE, DEPARTMENT) VALUES ('$depcode', '$department')");

            if (isset($_POST['handled'])) {
                $handled = $_POST['handled'];
                $result =mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DEP_CODE = '$depcode' AND DEPARTMENT = '$department'"));  
                 for($i=0, $count = count($handled);$i<$count;$i++) {
                    $handleds = $handled[$i];
                    //echo $result['DID'];          
                    $returns = mysql_query("UPDATE subjecttype SET DEPARTMENT = '".$result['DID']."' WHERE TID = '$handleds'");
                 }
            
            }
            if (isset($_POST['lects'])) {
                $lects = $_POST['lects'];
                $result =mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DEP_CODE = '$depcode' AND DEPARTMENT = '$department'"));  
                 for($i=0, $count = count($lects);$i<$count;$i++) {
                    $lect = $lects[$i];
                    //echo $result['DID'];          
                    $returns = mysql_query("UPDATE lecturer SET DEPARTMENT = '".$result['DID']."' WHERE LECTURER_ID = '$lect'");
                 }
            
            }
            if($results){
//                 echo "<script>
//     window.alert('Department Created!');
//     window.location.href='department.php';
// </script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Department Code</label>
                                <input type="text"  name="depcode" class="form-control" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Department</label>
                                <input type="text"  name="department" class="form-control" required/></td>
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
                        <td>
                            <button class="btn btn-info" name="create" type="submit" onclick="return confirm('Are you sure you want save the changes?');">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Create
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