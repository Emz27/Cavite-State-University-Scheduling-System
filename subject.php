<?php
	session_start();
	include("weblock.php");
	include("header.php");

?>
<script type="text/javascript">
    function changeCourse(){
        var d = document.getElementById("course");
        var course = d.options[d.selectedIndex].value;
        var e = document.getElementById("year");
        var year = e.options[e.selectedIndex].value;
        var f = document.getElementById("term");
        var term = f.options[f.selectedIndex].value;
        // if (year!=''&&term!=''){
        // location.href="subject.php?course="+course+"&year="+year+"&term="+term;
        // }
        // else if(year){
        // location.href="subject.php?course="+course+"&year="+year;        
        // }
        // else if(term){
        // location.href="subject.php?course="+course+"&term="+term;        
        // }
        // else
        location.href="subject.php?course="+course;
    }
    function changeTerm(){
        var d = document.getElementById("course");
        var course = d.options[d.selectedIndex].value;
        var e = document.getElementById("year");
        var year = e.options[e.selectedIndex].value;
        var f = document.getElementById("term");
        var term = f.options[f.selectedIndex].value;
        if (year!=''&&course!=''){
        location.href="subject.php?course="+course+"&year="+year+"&term="+term;
        }
        else if(year){
        location.href="subject.php?year="+year+"&term="+term;        
        }
        else if (course){
        location.href="subject.php?course="+course+"&term="+term;
        }
        else
        location.href="subject.php?term="+term;
    }
    function changeYear(){
        var d = document.getElementById("course");
        var course = d.options[d.selectedIndex].value;
        var e = document.getElementById("year");
        var year = e.options[e.selectedIndex].value;
        var f = document.getElementById("term");
        var term = f.options[f.selectedIndex].value;
        // if (course!=''&&term!=''){
        // location.href="subject.php?course="+course+"&year="+year+"&term="+term;
        // }
        if(course){
        location.href="subject.php?course="+course+"&year="+year;        
        }
        // else if (term){
        // location.href="subject.php?year="+year+"&term="+term;
        // }
        else
        location.href="subject.php?year="+year;
    }
</script>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Subjects</a>
            </li>

        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Subjects <a href="isubject.php" style="margin-left:650px;"> <i class="glyphicon glyphicon-plus"></i>Add Subject</a><a href="subjecttype.php"  style="margin-left:10px;"> <i class="glyphicon glyphicon-plus"></i>Subject Type</a></h2>

        <div class="box-icon">
           <!--  <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>

    <div class="box-content">
    <div class="col-md-4">
    <label>Course</label>
    <select class = "form-control col-md-6" id = "course" onchange="changeCourse()"> 
    <?php
        if (!isset($_GET['course'])){
            echo'<option hidden selected disabled/>';
        }
        else{
            $courset = mysql_fetch_array(mysql_query("SELECT * FROM course WHERE CID = '".$_GET['course']."'"));
            ?>
            <option value="<?php echo $courset['CID'];?>" selected><?php echo $courset['COURSE'];?></option>            
            <?php
        }
        $course = mysql_query("SELECT * FROM course");
        while($courses = mysql_fetch_array($course)){
            $coursehit = 0;
            if (isset($_GET['course'])){
                if($_GET['course']==$courses['CID'])
                    $coursehit = 1;
            }
            if($coursehit!=1){
            ?>
            <option value="<?php echo $courses['CID'];?>"><?php echo $courses['COURSE'];?></option>
            <?php
        }
        }
    ?>
    </select>
    </div>
    <div class="col-md-4">
    <label>Year</label>
    <select class = "form-control col-md-6" id = "year" onchange="changeYear()"> 
    <?php
        if (!isset($_GET['year'])){
            echo'<option hidden selected disabled/>';
        }
        else{
            $yearset = mysql_fetch_array(mysql_query("SELECT * FROM year WHERE YEAR_ID = '".$_GET['year']."'"));
            ?>
            <option value="<?php echo $yearset['YEAR_ID'];?>" selected><?php echo $yearset['YEAR'].' YEAR';?></option>            
            <?php
        }
        $year = mysql_query("SELECT * FROM year");
        while($years = mysql_fetch_array($year)){
            $yearhit = 0;
            if (isset($_GET['year'])){
                if($_GET['year']==$years['YEAR_ID'])
                    $yearhit = 1;
            }
            if ($yearhit!=1) {
            ?>
            <option value="<?php echo $years['YEAR_ID'];?>"><?php echo $years['YEAR'].' YEAR';?></option>
            <?php }
        }
    ?>
    </select>
    </div>
    <div class="col-md-4">
    <label>Term</label>
    <select class = "form-control col-md-6" id = "term" onchange="changeTerm()"> 
    <?php
        if (!isset($_GET['term'])){
            echo'<option hidden selected disabled/>';
        }
        $term = mysql_query("SELECT * FROM term");
        while($terms = mysql_fetch_array($term)){
            ?>
            <option value="<?php echo $terms['TERM_CODE'];?>"><?php echo $terms['TERM'].' TERM';?></option>
            <?php
        }
    ?>
    </select>
    </div>
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>CODE</th>
        <th>SUBJECT TYPE</th>
        <th>SUBJECT</th>
        <th>DEPARTMENT</th>
        <th>LECTURE UNITS</th>
        <th>LABORATORY UNITS</th>
        <th>TOTAL UNITS</th>
        <th>LECTURE HOURS</th>
        <th>LABORATORY HOURS</th>
        <th style="width:15%;">ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include("connect.php");
            if (isset($_GET['course'])){
                if (isset($_GET['year'])&&isset($_GET['term'])){
                      $resulted=mysql_query("SELECT * FROM curriculum WHERE COURSE = '".$_GET['course']."' AND YEAR_OFF = '".$_GET['year']."' AND TERM = '".$_GET['term']."'");
                  }
                else if (isset($_GET['year'])){
                        $resulted=mysql_query("SELECT * FROM curriculum WHERE COURSE = '".$_GET['course']."' AND YEAR_OFF = '".$_GET['year']."'");
                  }
                else if (isset($_GET['term'])){
                      $resulted=mysql_query("SELECT * FROM curriculum WHERE COURSE = '".$_GET['course']."' AND TERM = '".$_GET['term']."'");
                  }
                else{
                    $resulted=mysql_query("SELECT * FROM curriculum WHERE COURSE = '".$_GET['course']."'");
                }

            }
            else if(isset($_GET['year'])){
                if (isset($_GET['term'])){
                      $resulted=mysql_query("SELECT * FROM curriculum WHERE YEAR_OFF = '".$_GET['year']."' AND TERM = '".$_GET['TERM']."'");
                  }
                else{
                    $resulted=mysql_query("SELECT * FROM curriculum WHERE YEAR_OFF = '".$_GET['year']."'");
                }
            }
            else if(isset($_GET['term'])){
                      $resulted=mysql_query("SELECT * FROM curriculum WHERE TERM = '".$_GET['TERM']."'");
            }
            else
            $resulted = mysql_query("SELECT * FROM subject");
    		while($rows=mysql_fetch_array($resulted)){
                if (!isset($_GET['course'])&&!isset($_GET['year'])&&!isset($_GET['term']))
                    $row=mysql_fetch_array(mysql_query("SELECT * FROM  subject WHERE SID = '".$rows['SID']."'"));
                else
                    $row=mysql_fetch_array(mysql_query("SELECT * FROM  subject WHERE SID = '".$rows['SUBJECT']."'"));
    	?>
    <tr>
        <td><?php echo $row['SUBJECT_CODE'];?></td>
        <td class="center"><?php $subtype = mysql_fetch_array(mysql_query("SELECT * FROM subjecttype WHERE TID = '".$row['SUBTYPE']."'")); echo $subtype['TYPE'];?></td>
        <td class="center"><?php echo $row['SUBJECT'];?></td>
        <td class="center">
            <?php 
                $department = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$row['DEPARTMENT']."'"));

                echo $department['DEPARTMENT'];
            ?>
        </td>
        <td class="center"><?php echo $row['LECUNITS'];?></td>
        <td class="center"><?php echo $row['LABUNITS'];?></td>
        <td class="center"><?php echo $row['TOTAL_UNITS'];?></td>
        <td class="center"><?php echo $row['LECHOURS'];?></td>
        <td class="center"><?php echo $row['LABHOURS'];?></td>
        <td class="center">
            <a class="btn btn-success" href="vsubject.php?id=<?php echo $row['SID'];?>" title="View">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
              
            </a>
            <a class="btn btn-info" href="usubject.php?id=<?php echo $row['SID'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');" href="dsubject.php?id=<?php echo $row['SID'];?>" title="Delete">
                <i class="glyphicon glyphicon-trash icon-white"></i>
               
            </a>
        </td>
    </tr>
   <?php
   	}
   ?>
    
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