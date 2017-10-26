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
                <a href="room.php">Room</a>
            </li>
            <li>
                <a href="#">Add New Room</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-plus"></i> Add New Room</h2>

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
    if(isset($_POST['update'])){
            $room=$_POST['room'];
            $roomtype=$_POST['roomtype'];
           
            $results=mysql_query("INSERT INTO `room`( `ROOM`,`ROOM_TYPE` ) VALUES ('$room','$roomtype')");
            if($results){
                echo "<script>
    window.alert('Successfully Added!');
    window.location.href='room.php';
</script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Room Name</label>
                                <input type="text"  name="room" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Room Type</label>
                                <select  name="roomtype"  class="form-control" required/>
                                    <option value="" selected></option>
                                    <?php
                                        $results=mysql_query("SELECT * FROM `roomtype`");
                                        while($dept=mysql_fetch_array($results)){

                                            echo "<option value=".$dept['ROOMTYPENO'].">".$dept['ROOMTYPE']."</option>";
                                        }
                                  ?>

                                </select>
                        </tr>
                          
                       <tr>
                        <td>
                            <button class="btn btn-info" name="update" onclick="return confirm('Are you sure you want to add this course?');">
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