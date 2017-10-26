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
                <a href="#">Year</a>
            </li>
        </ul>
    </div>


    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-th"></i> Year
        <a href="iyear.php" style="margin-left:550px;"><i class="glyphicon glyphicon-plus"></i>Add Year</a></h2>

        <!-- <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div> -->
    </div>
    <div class="box-content">   

    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>YEAR</th>
        
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
        
        <td class="center"><?php echo $row['YEAR'];?></td>
       
        <td class="center">

            <a class="btn btn-info" href="uyear.php?id=<?php echo $row['YEAR_ID'];?>" title="Update">
                <i class="glyphicon glyphicon-edit icon-white"></i>
             
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?');" href="dyear.php?id=<?php echo $row['YEAR_ID'];?>" title="Delete">
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