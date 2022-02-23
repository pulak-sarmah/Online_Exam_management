<?php

    session_start();
    if (!isset($_SESSION['student_name'])) {
        header("refresh:1; url= student_sign_in.php");
    }
    else{
        error_reporting(0);
        include_once('../config/dbconnect.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>student Panel</title>
        <link type="text/css" href="../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../Assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='../Assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top ">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="Dashboard.php">Dashboard</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav">
                            <li><a class="options" href="../config/student_logout.php">Logout</a></li>
                        </ul>
                        <ul class="nav pull-right">
                            <li><a class="options" href="subject_list.php">Subject List</a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container" style="height: 15000px;">
                <div class="row">
                    <div class="span9" style="margin-left: 150px;">
                        <center><h2 style="text-decoration: underline;">Check Your Responses for : </h2></center>
                        <center><h3><a href="Result1.php?subject=Artifical Inteligence"><input type="submit" name="button" value="Artifical Inteligence" class="btnadmin"></a></h3></center> 
                            <center><h3><a href="Result.php?subject=Mathematics"><input type="submit" name="button" value="Mathematics" class="btnadmin"></a></h3></center>
                            <center><h3><a href="Result.php?subject=C++"><input type="submit" name="button" value="C++" class="btnadmin"></a></h3></center>
                            <center><h3><a href="Result.php?subject=Java"><input type="submit" name="button" value="Java" class="btnadmin"></a></h3></center>  
                            <center><h3><a href="Result.php?subject=PHP"><input type="submit" name="button" value="PHP" class="btnadmin"></a></h3></center>
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <script src="../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../Assets/scripts/common.js" type="text/javascript"></script>

    </body>
