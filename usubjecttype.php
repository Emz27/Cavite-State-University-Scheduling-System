<?php
    session_start();
    include("weblock.php");
    include("header.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `subjecttype` WHERE  TID='$id'"));


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="subjecttype.php">Subject Type</a>
            </li>
            <li>
                <a href="#">Update Subject Type</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> <?php echo $row['TYPE'];?></h2>

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
            $type=$_POST['type'];
            $dep=$_POST['dep'];
            $roomtype = $_POST['roomtype'];
            echo $type."</br>";
            echo $dep."</br>";
            echo $roomtype."</br>";

            $results = mysql_query("UPDATE subjecttype SET TYPE ='$type', ROOMTYPE='$roomtype',DEPARTMENT='$dep' WHERE TID = '$id'");

            if($results){
                echo "<script>
                        window.alert('Changes Saved!');
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
                                <input type="text"  name="type" class="form-control" value="<?php echo $row['TYPE'];?>" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Room Type</label>
                                <select  name="roomtype"  class="form-control" required/>
                                    <option value="" selected hidden disabled></option>
                                    <?php
                                        $roomType = mysql_fetch_array(mysql_query("SELECT * FROM roomtype WHERE ROOMTYPENO= '".$row['ROOMTYPE']."'"));
                                        echo "<option value=".$roomType['ROOMTYPENO']." selected>".$roomType['ROOMTYPE']."</option>";

                                        $results=mysql_query("SELECT * FROM `roomtype`");
                                        while($dept = mysql_fetch_array($results)){
                                            if($dept['ROOMTYPENO'] == $row['ROOMTYPE'])continue;
                                            echo "<option value=".$dept['ROOMTYPENO'].">".$dept['ROOMTYPE']."</option>";
                                        }
                                    ?>

                                </select>
                        </tr>
                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Department</label>
                                <select class = "form-control" required name="dep">
                                    <?php

                                    $dept = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID= '".$row['DEPARTMENT']."'"));
                                    echo "<option value = '".$row['DEPARTMENT']."' selected/> ".$dept['DEPARTMENT'];
                                    $depts = mysql_query("SELECT * FROM department");
                                    while($depop = mysql_fetch_array($depts)){
                                        if($depop['DID']!=$row['DEPARTMENT']){
                                        ?>
                                            <option value = "<?php echo $depop['DID'];?>"><?php echo $depop['DEPARTMENT'];?></option>
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