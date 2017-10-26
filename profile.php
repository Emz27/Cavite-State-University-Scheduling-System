<?php
	session_start();
	$id=$_SESSION['id'];

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
                <a href="#">Profile</a>
            </li>
        </ul>
    </div>
<?php
	if(isset($_POST['add'])){
			$uname=$_POST['uname'];
			$pass=md5($_POST['pass']);
            $confirm=md5($_POST['confirm']);
            $registrar=$_POST['registrar'];
            $dean=$_POST['dean'];

            if($pass!=$confirm){
                echo "<script>
                        window.alert('Password didnt match!');
                        window.location.href='profile.php';
                    </script> ";
            }
			$results=mysql_query("UPDATE `users` SET `USERNAME`='$uname',`PASSWORD`='$pass',`REGISTRAR`='$registrar',`DEAN`='$dean' WHERE `UID`='$id' ");
	if($results){
                echo "<script>
    window.alert('Successfully Updated!');
    window.location.href='profile.php';
</script> ";
            }
	}

?>

   <!--/span-->
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Edit Profile</h2>

                    <div class="box-icon">
                       <!--  <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a> -->
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        
                       
                        <form action="" method="POST">
                        <tbody>
 						<tr>
 						<?php
 							$row=mysql_fetch_array(mysql_query("SELECT * FROM users WHERE UID='$id'"));
 						?>
 							
                            
                           	<td class="center">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text"  name="uname" class="form-control" value="<?php echo $row['USERNAME'];?>" required/>
                            </td>
                         
                        </tr>
                        <tr>
                          
                           	<td class="center">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password"  name="pass" class="form-control" value="" required/>
                            </td>
                         
                        </tr>
                        <tr>
                          
                            <td class="center">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password"  name="confirm" class="form-control" value="" required/>
                            </td>
                         
                        </tr>
                       <tr>
                            <td class="center">
                                <label for="exampleInputEmail1">Registrar</label>
                                <input type="text"  name="registrar" class="form-control" value="<?php echo $row['REGISTRAR'];?>" required/>
                            </td>
                         
                        </tr>
                        <tr>                            
                            
                            <td class="center">
                                <label for="exampleInputEmail1">College Dean</label>
                                <input type="text"  name="dean" class="form-control" value="<?php echo $row['DEAN'];?>" required/>
                            </td>
                         
                        </tr>
                        <tr>
                        <td>
                            <button class="btn btn-info" name="add" >
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    Update
                                </button>
                        </td>
                       </tr>
</form>
                        
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