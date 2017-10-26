<!DOCTYPE html>
<?php
    if(isset($_POST['submit'])){
        $user=$_POST['user'];
        $pass=md5($_POST['pass']);
        include "connect.php";

        $result=mysql_query("SELECT * FROM users WHERE USERNAME='$user' AND PASSWORD='$pass'");
        $row=mysql_fetch_array($result);
        $count=mysql_num_rows($result);

        if($count==1){
            $user=$row['USERNAME'];
            $id=$row['UID'];

            session_start();
            $_SESSION['user']=$user;
            $_SESSION['id']=$id;

            echo "<script type='text/javascript'>
                        window.alert('Success');
                        window.location.href = 'home.php';
                </script>";
        }
        else{
            echo "<script type='text/javascript'>
                    window.alert('Failed');
                    window.location.href = 'index.php';
                </script>";

        }





    }
?>

<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Cavite State University Scheduling System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    
    <!-- <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'> -->
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>


    <!-- jQuery -->
    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <style type="text/css">
        body{
                /*background-color: rgba(0, 128, 2, 0.46);    */
        }
    </style>

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2><img src="img/logo.png" width="150px">  Cavite State University  Scheduling System</h2>
        </div>
        <!--/span-->
    </div><!--/row-->
    </br>
    </br>
    </br>
     </br>
    </br>
    <div class="row">
        <div class="well col-md-5 center login-box">
            <div class="alert alert-info">
                Please login with your Username and Password.
            </div>
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" name="user" placeholder="Username" required/>
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                    </div>
                    <div class="clearfix"></div>

                    <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div>
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <input type="submit" name="submit" class="btn btn-primary" value="Login">
                    </p>
                </fieldset>
            </form>
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="bower_components/responsive-tables/responsive-tables.js"></script>


</body>
</html>
