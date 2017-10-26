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
                <a href="#"> Add New Subject</a>
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

            $code=$_POST['code'];
            $subject=$_POST['subject'];
            $department=$_POST['department'];
            $subtype = $_POST['subtype'];
            $lab=$_POST['lab'];
            $lec=$_POST['lec'];
            $lechours=$_POST['lechours'];
            $labhours=$_POST['labhours'];
            $total=$lec+$lab;
            
            $monday = 0;
            $tuesday = 0;
            $wednesday = 0;
            $thursday = 0;
            $friday = 0;
            $saturday = 0;

            if(isset($_POST['monday']))$monday = $_POST['monday'];
            if(isset($_POST['tuesday']))$tuesday = $_POST['tuesday'];
            if(isset($_POST['wednesday']))$wednesday = $_POST['wednesday'];
            if(isset($_POST['thursday']))$thursday = $_POST['thursday'];
            if(isset($_POST['friday']))$friday = $_POST['friday'];
            if(isset($_POST['saturday']))$saturday = $_POST['saturday'];
           

            $results=mysql_query("INSERT INTO `subject`( `SUBJECT_CODE`, `SUBJECT`, `SUBTYPE`,`DEPARTMENT`, `LECUNITS`, `LABUNITS`, `TOTAL_UNITS`,`LECHOURS`,`LABHOURS`,`MONDAY`,`TUESDAY`,`WEDNESDAY`,`THURSDAY`,`FRIDAY`,`SATURDAY`) 
                VALUES ('$code','$subject','$subtype','$department','$lec','$lab','$total','$lechours','$labhours','$monday','$tuesday','$wednesday','$thursday','$friday','$saturday')");
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
                            <td class="center"><label for="exampleInputEmail1">Department</label>
                                <select name="department" class="form-control">
                                    <option selected disabled hidden>
                                        <option value="0" selected ></option>
                                    <?php
                                        $result = mysql_query("SELECT * FROM department");
                                        while ($row = mysql_fetch_array($result)) {
                                            ?>
                                            <option value = "<?php echo $row['DID'];?>"><?php echo $row['DEPARTMENT'];?></option>
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
                           
                            <td class="center"><label for="exampleInputEmail1">Lecture Hours</label>
                                <input type="number" name="lechours"  min="0"  max="6" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Laboratory Hours</label>
                                <input type="number" name="labhours"  min="0"  max="6" class="form-control" value="" required/></td>
                        </tr>
                        <tr>
                           
                            <td class="center"><label for="exampleInputEmail1">Days Available</label></br>
                                
                                <input type="checkbox" name="monday" value="1">Monday</br>
                                <input type="checkbox" name="tuesday" value="1">Tuesday</br>
                                <input type="checkbox" name="wednesday" value="1">Wednesday</br>
                                <input type="checkbox" name="thursday" value="1">Thursday</br>
                                <input type="checkbox" name="friday" value="1">Friday</br>
                                <input type="checkbox" name="saturday" value="1">Saturday</br>
                            </td>
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