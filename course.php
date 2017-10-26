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
                <a href="#">Courses</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-alt"></i> Courses <a href="icourse.php" style="margin-left:850px;"> <i class="glyphicon glyphicon-plus"></i>Add Course</a></h2>

        <div class="box-icon">
           <!--  <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>CODE</th>
        <th>COURSE</th>
        <th>DEPARTMENT</th>
        <th>UNITS</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include("connect.php");
            $result=mysql_query("SELECT * FROM course");
            while($row=mysql_fetch_array($result)){
                $dept = mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$row['DEPARTMENT']."'"));
            $totalunits = 0;
                $result2 = mysql_query("SELECT * FROM curriculum WHERE COURSE = '".$row['CID']."'");
                while($row2 = mysql_fetch_array($result2)){
                    $units = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$row2['SUBJECT']."'"));
                    $totalunits = $totalunits + $units['TOTAL_UNITS'];
                }
        ?>
    <tr>
        <td><?php echo $row['COURSE_CODE'];?></td>
        <td class="center"><?php echo $row['COURSE'];?></td>
        <td class="center"><?php echo $dept['DEPARTMENT'];?></td>
        <td><?php echo $totalunits;?></td>
        <td class="center">
            <a class="btn btn-info" href="ucourse.php?id=<?php echo $row['CID'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?');" href="dcourse.php?id=<?php echo $row['CID'];?>" title="Delete">
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