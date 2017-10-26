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
                <a href="#">Lecturers</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Lecturers <a href="ilecturer.php" style="margin-left:550px;"><i class="glyphicon glyphicon-plus"></i>Add Lecturer</a></h2>

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
        <th>FULLNAME</th>
        <th>DEPARTMENT</th>
        <th>ADVISEE</th>
        <th>STATUS</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
        <?php
            include("connect.php");
            $result=mysql_query("SELECT lecturer.*,department.*,status.* FROM `lecturer` left join department ON lecturer.DEPARTMENT=department.DID left join status on lecturer.STATUS=status.STAT_ID");
            while($row=mysql_fetch_array($result)){
        ?>
    <tr>
        <td><?php echo $row['FIRSTNAME']." ".$row['MIDDLENAME']." ".$row['LASTNAME'];?></td>
        <td class="center"><?php echo $row['DEPARTMENT'];?></td>
        <td class="center"><?php echo $row['ADVISEE'];?></td>
        <td class="center"><?php echo $row['EMPLOYMENT_STATUS'];?></td>
        <td class="center">
            <a class="btn btn-success" href="vlecturer.php?id=<?php echo $row['LECTURER_ID'];?>" title="View">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
              
            </a>
            <a class="btn btn-info" href="ulecturer.php?id=<?php echo $row['LECTURER_ID'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this lecturer?');" href="dlecturer.php?id=<?php echo $row['LECTURER_ID'];?>" title="Delete">
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