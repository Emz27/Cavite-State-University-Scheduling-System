<?php
	session_start();
	include("weblock.php");
	include("header.php");
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `roomtype`"));


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="roomtypes.php">Room Type</a>
            </li>
            <li>
                <a href="#"> Add New Room Type</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-plus"></i> Add New Subject</h2>

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
            $roomtype=$_POST['roomtype'];
            
            $class=$_POST['class'];

            $results=mysql_query("INSERT INTO `roomtype`( `ROOMTYPE`,`CLASS`) VALUES ('$roomtype','$class')");
            
            if($results){
                echo "<script>
    window.alert('Successfully Added!');
    window.location.href='roomtypes.php';
</script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
        <tbody>
            <form action="" method="POST">

                <tr>
                          
                    <td class="center"><label for="exampleInputEmail1">Room Type</label>
                                <input type="text"  name="roomtype" class="form-control" value="" required/></td>
                </tr>
                
                <tr>
                    <td class="center"><label for="exampleInputEmail1">Class Type</label>
                        <select class = "form-control" name="class" required>
                            <?php
                            echo "<option value = '' selected>";
                            echo "<option value = '".$row['CLASS']."'>";

                            /*if ($row['CLASS']==1)*/ echo 'LECTURE</option><option value = "2">LAB</option>';
                            //else echo 'LAB</option><option value = "1">LECTURE</option>';
                            ?>
                        </select>
                </tr>                
                
                <tr>
                    <td>
                        <button class="btn btn-info" name="update" onclick="return confirm('Are you sure you want add this subject?');">
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