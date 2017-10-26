<!DOCTYPE html>
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
    <title>Class Scheduling System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>
<?php ob_start();?>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation" style="width:100%;">

        <div class="navbar-inner" >
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> <img alt="Charisma Logo" src="img/logo.png" class="hidden-xs"/>
                <span >Scheduling System</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="profile.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            
            <!-- theme selector ends -->


        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        
                        <li><a class="ajax-link" href="schedule.php"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Schedules</span></a>
                        </li>
                        <li><a class="ajax-link" href="subject.php"><i
                                    class="glyphicon glyphicon-edit"></i><span> Subjects</span></a></li>
                        <li><a class="ajax-link" href="course.php"><i class="glyphicon glyphicon-list-alt"></i><span> Courses</span></a>
                        </li>
                        </li>
                        <li><a class="ajax-link" href="year.php"><i class="glyphicon glyphicon-th"></i><span> Year</span></a>
                        </li>
                        </li>
                        <li><a class="ajax-link" href="section.php"><i class="glyphicon glyphicon-th"></i><span> Section</span></a>
                        </li>
                        <li><a class="ajax-link" href="lecturer.php"><i class="glyphicon glyphicon-user"></i><span> Lecturers</span></a>
                        </li>
                        <li><a class="ajax-link" href="department.php"><i class="glyphicon glyphicon-user"></i><span> Department</span></a>
                        </li>
                        <li><a class="ajax-link" href="room.php"><i class="glyphicon glyphicon-picture"></i><span> Rooms</span></a>
                        </li>
                        </li>
                        <li><a class="ajax-link" href="roomtypes.php"><i class="glyphicon glyphicon-picture"></i><span> Room Type</span></a>
                        </li>
                        <!-- <li><a class="ajax-link" href="maintenance.php"><i class="glyphicon glyphicon-th"></i><span> Maintenance</span></a>
                        </li> -->
                    </ul>
                   
                </div>
            </div>
        </div>

