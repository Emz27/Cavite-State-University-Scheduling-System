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
                <a href="schedule.php">Home</a>
            </li>
            <li>
                <a href="#">Department</a>
            </li>

        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Department <a href="idepartment.php" style="margin-left:850px;"> <i class="glyphicon glyphicon-plus"></i>Add Department</a></h2>

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
        <th>DEPARTMENT CODE</th>
        <th>DEPARTMENT</th>
        <th>CHAIRPERSON</th>
        <th>NO OF SUBJECTS</th>
        <th style="width:15%;">ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include("connect.php");
    		$result=mysql_query("SELECT * FROM department");
    		while($row=mysql_fetch_array($result)){
    	?>
    <tr>
        <td class="center"><?php echo $row['DEP_CODE'];?></td>
        <td class="center"><?php echo $row['DEPARTMENT'];?></td>
        <td class="center">
            <?php

                $lecturer = mysql_fetch_array(mysql_query("SELECT * FROM lecturer WHERE LECTURER_ID = '".$row['CHAIRPERSON']."'"));
                echo $lecturer['FIRSTNAME']." ".$lecturer['MIDDLENAME']." ".$lecturer['LASTNAME'];



            ?>
        </td>
        <td class="center">
        <?php 
            $nosub = mysql_query("SELECT * FROM subject WHERE DEPARTMENT = '".$row['DID']."'");
            // $nosubs = 0;
            // while ($subrows = mysql_fetch_array($nosub)){
            //     $nosubs= $nosubs+1;
            // }
            echo mysql_num_rows($nosub);

        ?></td>
        <td class="center">
            <a class="btn btn-success" href="vdepartment.php?id=<?php echo $row['DID'];?>" title="View">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
              
            </a>
            <a class="btn btn-info" href="udepartment.php?id=<?php echo $row['DID'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');" href="ddepartment.php?id=<?php echo $row['DID'];?>" title="Delete">
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