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
                <a href="#">Maintenance</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th"></i> Days</h2>

        <div class="box-icon">
        <!--   <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a> -->
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <!-- <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>CODE</th>
        <th>DAY</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include("connect.php");
    		$result=mysql_query("SELECT * FROM days");
    		while($row=mysql_fetch_array($result)){
    	?>
    <tr>
        <td><?php echo $row['DAY_CODE'];?></td>
        <td class="center"><?php echo $row['DAY'];?></td>
       
        <td class="center">
            
            <a class="btn btn-info" href="updatesub.php?id=" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" href="#" title="Delete">
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

    </div>
     <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th"></i> Year</h2>

        <div class="box-icon">
          <!-- <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a> -->
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
           <!--  <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>YEAR</th>
        <th>DESCRIPTION</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include("connect.php");
    		$result=mysql_query("SELECT * FROM year");
    		while($row=mysql_fetch_array($result)){
    	?>
    <tr>
        <td><?php echo $row['YEAR_ID'];?></td>
        <td class="center"><?php echo $row['YEAR'];?></td>
       
        <td class="center">

            <a class="btn btn-info" href="updatesub.php?id=" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" href="#" title="Delete">
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
     <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th"></i> Section</h2>

        <div class="box-icon">
          <!-- <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a> -->
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
           <!--  <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>CODE</th>
        <th>SECTION</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include("connect.php");
    		$result=mysql_query("SELECT * FROM section");
    		while($row=mysql_fetch_array($result)){
    	?>
    <tr>
        <td><?php echo $row['SECTION_ID'];?></td>
        <td class="center"><?php echo $row['SECTION'];?></td>
       
        <td class="center">

            <a class="btn btn-info" href="updatesub.php?id=" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" href="#" title="Delete">
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
     <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th"></i> Room Type</h2>

        <div class="box-icon">
          <!-- <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a> -->
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
           <!--  <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>CODE</th>
        <th>ROOM TYPE</th>
        <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
    	<?php
    		include("connect.php");
    		$result=mysql_query("SELECT * FROM roomtype");
    		while($row=mysql_fetch_array($result)){
    	?>
    <tr>
        <td><?php echo $row['ROOMTYPENO'];?></td>
        <td class="center"><?php echo $row['ROOMTYPE'];?></td>
       
        <td class="center">

            <a class="btn btn-info" href="updatesub.php?id=" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" href="#" title="Delete">
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

    </div><!--/row-->
<!--/row-->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    <hr>
<?php
	include("footer.php");
?>