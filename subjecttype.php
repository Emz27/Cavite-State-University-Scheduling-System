<?php
	session_start();
	include("weblock.php");
	include("header.php");
    if (isset($_GET['del'])){
        include_once("connect.php");
        $results = mysql_query("DELETE FROM subjecttype WHERE TID = '".$_GET['del']."'");
        $results2 = mysql_query("UPDATE subject SET SUBTYPE = 0 WHERE SUBTYPE = '".$_GET['del']."'");
        unset($_GET['del']);
        header("location:subjecttype.php");
    }
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
                <a href="subjecttype.php">Subject Type</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-picture"></i> Subject Types<a href="isubjecttype.php" style="margin-left:550px;"><i class="glyphicon glyphicon-plus"></i>Add Type</a>
            </h2>
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
        <th>TYPE ID</th>
        <th>SUBJECT TYPE</th>
        <th>ROOM TYPE</th>
        <th>DEPARTMENT</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include_once("connect.php");
    		$result=mysql_query("SELECT * FROM subjecttype");
    		while($row=mysql_fetch_array($result)){
    	?>
    <tr>
        <td><?php echo $row['TID'];?></td>
        <td class="center"><?php echo $row['TYPE'];?></td>

        <?php
            include_once("connect.php");
            $result1=mysql_fetch_array(mysql_query("SELECT * FROM roomtype WHERE ROOMTYPENO = '".$row['ROOMTYPE']."'"));
            $result2=mysql_fetch_array(mysql_query("SELECT * FROM department WHERE DID = '".$row['DEPARTMENT']."'"));
        ?>
        <td class="center"><?php echo $result1['ROOMTYPE'];?></td>

       <td class="center"><?php echo $result2['DEPARTMENT'];?></td>

        <td class="center">

            <a class="btn btn-info" href="usubjecttype.php?id=<?php echo $row['TID'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this room?');" href="subjecttype.php?del=<?php echo $row['TID'];?>" title="Delete">
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