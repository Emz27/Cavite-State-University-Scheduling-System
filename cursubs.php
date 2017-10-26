<?php
	session_start();
	include("weblock.php");
	include("header.php");
    if (isset($_GET['del'])){
        $sub = $_GET['del'];
        $course = $_GET['course'];
        $result = mysql_query("DELETE FROM curriculum WHERE SUBJECT = '$sub' AND COURSE = '$course'");
        if($result){ 
            unset($_GET['del']);
            header("location:cursubs.php?course=".$course);}
    }
?>

<script type="text/javascript">
    
    //     $(document).ready(function() {
    //     $('#page-help').each(function() {
    //         var $link = $(this);
    //         var $dialog = $('<div></div>')
    //             .load($link.attr('href') + ' #content')
    //             .dialog({
    //                 autoOpen: false,
    //                 title: $link.attr('title'),
    //                 width: 600,
    //                 height: 600
    //             }).dialog('widget').position({ my: 'center', at: 'center', of: $(this).addClass("modal-dialog"); });
     
    //         $link.click(function() {
    //             $dialog.dialog('open');
     
    //             return false;
    //         });
    //     });
    // });

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
        <h2><i class="glyphicon glyphicon-edit"></i> <?php $course = mysql_fetch_array(mysql_query("SELECT COURSE_CODE FROM course WHERE CID = '".$_GET['course']."'")); echo $course['COURSE_CODE'];?></h2>

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
        <th>SUBJECT</th>
        <th>LECTURE UNITS</th>
        <th>LABORATORY UNITS</th>
        <th>TOTAL UNITS</th>
        <th>ACTION</th>
    </tr>
    </thead>

    <tbody>
    	<?php
    		include("connect.php");
            $totalunits = 0;
            $courseunits = 0;
            for($year = 1; $year<=4; $year++){

                ?>
                <tr>
                    <th colspan="6"><?php switch ($year) {
                        case '1':echo "FIRST YEAR";
                            break;
                        case '2':echo "SECOND YEAR";
                            break;
                        case '3':echo "THIRD YEAR";
                            break;
                        case '4':echo "FOURTH YEAR";
                            break;
                        
                        default:
                            # code...
                            break;
                    }?></th>
                </tr>
                <?php
                for($term = 1; $term<=2; $term++){
            ?>
            <tr>
                <td colspan="5">
                    <?php
                        if ($term==1)echo 'Term 1';
                        else echo 'Term 2';
                    ?>
                </td>        
                <td class="center">
                    <a id="page-help" href="addcursub.php?course=<?php echo $_GET['course'].'&year='.$year.'&term='.$term;?>"><i class="glyphicon glyphicon-plus"></i>Add Subject</a>
                </td>
            </tr>
            <?php
    		$result=mysql_query("SELECT * FROM curriculum WHERE YEAR_OFF = '".$year."' AND TERM = '".$term."' AND COURSE = '".$_GET['course']."' ORDER BY YEAR_OFF ASC");
    		while($row=mysql_fetch_array($result)){
    	?>
        <td class="center"><?php $subres = mysql_fetch_array(mysql_query("SELECT * FROM subject WHERE SID = '".$row['SUBJECT']."'")); echo $subres['SUBJECT_CODE'];?></td>
        <td class="center"><?php echo $subres['SUBJECT'];?></td>

        </td>
        <td class="center">
           <?php echo $subres['LECUNITS'];?>
        </td>
        <td class="center">
           <?php echo $subres['LABUNITS'];?>
        </td>
         <td class="center">
           <?php echo $subres['TOTAL_UNITS']; $totalunits = $totalunits+$subres['TOTAL_UNITS'];?>
        </td>
        <td class="center">
            <a class="btn btn-success" href="vsubject.php?id=<?php echo $subres['SID'];?>&course=<?php echo $_GET['course'];?>" title="View">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
              
            </a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this subject?');" href="cursubs.php?del=<?php echo $subres['SID'];?>&course=<?php echo $_GET['course'];?>" title="Delete">
                <i class="glyphicon glyphicon-trash icon-white"></i>
               
            </a>
        </td>
    </tr>
   <?php
   	}
    ?>
                <tr>
                    <?php if ($year>0)
                    echo "<td colspan='3'></td><td>Sub Total</td><td>".$totalunits."</td>";
                    $courseunits = $courseunits + $totalunits;
                    $totalunits = 0;
                    ?>
                </tr><?php

   }
}

    echo "<tr></tr><tr><th colspan='4'>Total Units</th><th>".$courseunits."</th></tr>";
                    
   ?>
    
    </tbody>
    </table>

                            <button class="btn btn-info" type = "button" name="addsub" id = "addsub" onclick="location.href='course.php'">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Back to Courses
                            </button>
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
