<?php
	session_start();
	include("weblock.php");
	include("header.php");
?>
 <script type="text/javascript">
    function getClass(){
        var e = document.getElementById("sections");
        var sec = e.options[e.selectedIndex].value;
        var year = document.getElementById("year").value;
        var term = document.getElementById("term").value;
        $.get("getsched.php", {
            getclass: "getclass",
            section: sec,
            year: year,
            term: term
          }, function(response){
            $('#result_1').fadeOut();
            setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
          });
    }

    function finishAjax(id, response) {
      //$('#wait_1').hide();
      $('#'+id).html(unescape(response));
      $('#'+id).fadeIn();
    }
</script>
<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="home.php">Home</a>
            </li>
            <li>
                <a href="schedule.php">Schedule</a>
            </li>

            <li>
                <a href="schedclass.php">Class Schedule</a>
            </li>
        </ul>
    </div>

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-list-alt"></i>Schedule<a href="addsched.php" style="margin-left:200%;"> <i class="glyphicon glyphicon-plus"></i>Add Schedule</a><a href="addschedspecial.php" style="margin-left:2%;"> <i class="glyphicon glyphicon-plus"></i>Open Request</a></h2>

        <div class="box-icon">
           <!--  <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a> -->
        </div>
    </div>
    <div class="box-content">
    <div class="col-md-4">
    <label>School Year *required</label>
        <select class="form-control" id = "year" required>
        <?php 
            if (isset($_GET['year'])) {
                
                $select = mysql_fetch_array(mysql_query("SELECT * FROM schoolyear WHERE SY_ID = '".$_GET['year']."'"));
                echo "<option selected value = '".$_GET['year']."'>".$select['SY']."</option>";
            }
            else echo "<option hidden selected disabled></option>";

        ?>
        <?php include_once("connect.php");
            $result = mysql_query("SELECT * FROM schoolyear");
             while($row = mysql_fetch_array($result)){
                if (isset($_GET['year'])){
                if ($row['SY_ID']!=$_GET['year']){
        ?>
        <option value="<?php echo $row['SY_ID'];?>"><?php echo $row['SY'];?></option>
        <?php 
                }
            }
                else{
                    ?>

        <option value="<?php echo $row['SY_ID'];?>"><?php echo $row['SY'];?></option>
                    <?php
                }
        } ?>

        </select>
        


    </div>
    <div class="col-md-4">
        <label>
            Term *required        
            </label>
                <select class="form-control" id = "term" required>
        <?php 

            if (isset($_GET['term'])) {
                $term = mysql_fetch_array(mysql_query("SELECT * FROM term WHERE TERM_CODE = '".$_GET['term']."'"));
                echo "<option selected value = '".$_GET['term']."'>".$term['TERM']."</option>";
            }
            else echo "<option hidden selected disabled></option>";

        ?>
        <?php include_once("connect.php");
            $result2 = mysql_query("SELECT * FROM term");
            while($row2 = mysql_fetch_array($result2)){
                if (isset($_GET['term'])){
                if ($row2['TERM_CODE']!=$_GET['term']){
        ?>
        <option value="<?php echo $row2['TERM_CODE'];?>"><?php echo $row2['TERM'];?></option>
        <?php 
                }
            }
                else{
                    ?>

        <option value="<?php echo $row2['TERM_CODE'];?>"><?php echo $row2['TERM'];?></option>
                    <?php
                }
        } ?>

        </select>
                                
    </div>
    <div class="col-md-4">
              
    </div>

    <div class="col-md-4" style="margin-top:2.5%;">
        <a class="btn btn-primary" href="schedprof.php" title="">Lecturer
        </a>        
        <a class="btn btn-primary" href="schedclass.php" title="">Sections
        </a>    
        <a class="btn btn-primary" href="schedroom.php" title="">Rooms
        </a>
        
    <br/>
    </div>

    <div class="col-md-4">
<br/>
<label>Course Year & Section:</label>
    <select class="form-control" id = "sections" onchange="getClass()">
    <option hidden disabled selected></option>
    <?php
        $courses = mysql_query("SELECT * FROM course");
        while ($course = mysql_fetch_array($courses)){
            $years = mysql_query("SELECT * FROM year");
            while ($year = mysql_fetch_array($years)){
                $sections = mysql_query("SELECT * FROM section");
                while ($section = mysql_fetch_array($sections)){
            ?>
            <option value="<?php echo $course['CID'].'-'.$year['YEAR_ID'].'-'.$section['SECTION_ID'];?>"><?php echo $course['COURSE_CODE'].'-'.$year['YEAR_ID'].$section['SECTION'];?></option>
            <?php
        }
        }
        }
    ?>  
    </select>
</div>
    </div>

    <span id="result_1" style="display: none;"></span>
                
   <!--  <div class="alert alert-info">For help with such table please check <a href="http://datatables.net/" target="_blank">http://datatables.net/</a></div> -->
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->





<!--/row-->
    </div><!--/#content.col-md-0-->
</div>
<?php
	include("footer.php");
?>