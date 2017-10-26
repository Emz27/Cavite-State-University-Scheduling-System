<?php
	session_start();
	include("weblock.php");
	include("header.php");
    $id=$_GET['id'];
    $row=mysql_fetch_array(mysql_query("SELECT * FROM `section` WHERE  SECTION_ID='$id'"));


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="section.php">Section</a>
            </li>
            <li>
                <a href="#">Update Section</a>
            </li>
           
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> <?php echo $row['SECTION'];?></h2>

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
            $section=$_POST['section'];

            $results=mysql_query("UPDATE `section` SET`SECTION`='$section' WHERE `SECTION_ID`= '$id'");
            if($results){
                echo "<script>
    window.alert('Changes Saved!');
    window.location.href='section.php';
</script> ";
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Section</label>
                                <input type="text"  name="section" class="form-control" value="<?php echo $row['SECTION'];?>" required/></td>
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