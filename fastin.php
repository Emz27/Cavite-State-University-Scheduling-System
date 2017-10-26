<?php
	session_start();
	include("weblock.php");
   


?>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->

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
            $code=$_POST['code'];
            $subject=$_POST['subject'];
            $subtype = $_POST['subtype'];
            $lab=$_POST['lab'];
            $lec=$_POST['lec'];
            $total=$lec+$lab;

           

            $results=mysql_query("INSERT INTO `subject`( `SUBJECT_CODE`, `SUBJECT`, `SUBTYPE`, `LECUNITS`, `LABUNITS`, `TOTAL_UNITS`) VALUES ('$code','$subject','$subtype','$lec','$lab','$total')");
            if($results){
//                 echo "<script>
//     window.alert('Successfully Added!');
//     window.location.href='subject.php';
// </script> ";
                unset($_POST['update']);
            }


    }
    
?>

   <table class="table table-striped table-bordered responsive">
                        
                        <tbody>
                    <form action="" method="POST">

                        <tr>
                          
                            <td class="center"><label for="exampleInputEmail1">Subject Code</label>
                                <input type="text"  name="code" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Subject</label>
                                <input type="text"  name="subject" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                            <td class="center"><label for="exampleInputEmail1">Subject Type</label>
                                <select name="subtype" class="form-control">
                                    <option selected disabled hidden>
                                    <?php
                                        $result = mysql_query("SELECT * FROM subjecttype");
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <option value = "<?php echo $row['TID'];?>"><?php echo $row['TYPE'];?></option>
                                            <?php
                                        }
                                    ?>     
                                </select>
                            </td>
                        </tr>
                          <tr>
                            
                            <td class="center"><label for="exampleInputEmail1">Lecture Units</label>
                                <input type="number" name="lec"   min="0"  max="6" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Laboratory Units</label>
                                <input type="number" name="lab"  min="0"  max="6" class="form-control" value="" required/></td>
                        </tr>
                       <tr>
                        <td>
                            <button class="btn btn-info" name="update" >
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