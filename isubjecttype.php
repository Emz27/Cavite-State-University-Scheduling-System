<?php
	session_start();
	include("weblock.php");
	include("header.php");
    

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
                <a href="subjecttype.php">Subject Type</a>
            </li>
            <li>
                <a href="isubjecttype.php">Add New Subject Type</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-plus"></i> Add New Subject Type</h2>

        <!-- <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div> -->
    </div>
    <div class="box-content">
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
   <!-- //starthere -->
<?php
    if(isset($_POST['create'])){
            $type=$_POST['type'];
            $dep=$_POST['dep'];
            $roomtype=$_POST['roomtype'];

            echo $type."</br>";
            echo $roomtype."</br>";
            echo $dep."</br>";
            

            echo "<script>
                        window.alert('Successfully Added!');

                    </script> ";

           
            $results=mysql_query("INSERT INTO `subjecttype`( `TYPE`,`ROOMTYPE`, `DEPARTMENT`) VALUES ('$type','$roomtype','$dep')");
            if($results){
                echo "<script>
                        window.alert('Successfully Added!');
                        window.location.href='subjecttype.php';
                    </script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Subject Type</label>
                                <input type="text"  name="type" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Room Type</label>
                                <select  name="roomtype"  class="form-control" required/>
                                    <option value="" selected hidden disabled></option>
                                    <?php
                                        $results=mysql_query("SELECT * FROM `roomtype`");
                                        while($dept=mysql_fetch_array($results)){

                                            echo "<option value=".$dept['ROOMTYPENO'].">".$dept['ROOMTYPE']."</option>";
                                        }
                                  ?>

                                </select>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Faculty Department</label>
                                <select  name="dep"  class="form-control"/>
                                    <option value="" selected hidden disabled></option>
                                    <?php
                                        $results=mysql_query("SELECT * FROM `department`");
                                        while($dept=mysql_fetch_array($results)){

                                            echo "<option value=".$dept['DID'].">".$dept['DEPARTMENT']."</option>";
                                        }
                                  ?>

                                </select>
                        </tr>
                          
                       <tr>
                        <td>
                            <button class="btn btn-info" name="create" onclick="return confirm('Are you sure you want to add this course?');">
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