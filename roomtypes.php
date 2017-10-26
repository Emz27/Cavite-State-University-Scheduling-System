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
                <a href="#">Room Types</a>
            </li>
        </ul>
    </div>


   <!--/span-->
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th"></i> Room Type
        <a href="iroomtype.php" style="margin-left:550px;"><i class="glyphicon glyphicon-plus"></i>Add Room Type</a></h2>


        <!--<div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div> -->
    </div>
    <div class="box-content">

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>CODE</th>
        <th>ROOM TYPE</th>
        <th>CLASS TYPE</th>
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
        <td class="center"><?php if($row['CLASS']==1)echo 'LECTURE'; else echo'LABORATORY';?></td>
       
        <td class="center"> 

            <a class="btn btn-info" href="uroomtype.php?id=<?php echo $row['ROOMTYPENO'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');" href="droomtypes.php?id=<?php echo $row['ROOMTYPENO'];?>" title="Delete">
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