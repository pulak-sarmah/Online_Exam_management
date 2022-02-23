<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= Admin_Signin.php");
    }
    else{
        error_reporting(0);
        include_once('../../config/dbconnect.php');
    }

    //deleting a row.
    if (isset($_GET['delete'])) {
        $sql = "DELETE FROM question WHERE q_no='{$_GET['q_no']}'";
        $dQuery = mysqli_query($conn,$sql);
        if ($dQuery) {
            header('Refresh:1; question_list.php');
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='../../Assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top ">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="../Dashboard.php">Dashboard</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav">
                            <li><a class="options" href="../../config/logout.php">Logout</a></li>
                        </ul>
                        <ul class="nav pull-right">
                            <li><a class="options" href="student_list.php">student List</a></li>
                            <li><a class="options" href="../forms/Add_new_question.php">Add new Question</a></li>
                            <li><a class="options" href="question_list.php">Question List</a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span9" style="margin-left: 60px; width: 1100px;">
                        <div class="module">
                            <div class="module-head">
                                <h3>question List</h3>
                            </div>
                            <div class="module-body table">
                                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>subject_title</th>
                                            <th>question</th>
                                            <th>correct answer</th>
                                            <th>option1</th>
                                            <th>option2</th>
                                            <th>option3</th>
                                            <th>option4</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql="SELECT * FROM `question`";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {
                                                ?>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td><?php echo $row->subject_title; ?></td>
                                                <td><?php echo $row->question; ?></td>
                                                <td><?php echo $row->correct_answer; ?></td>
                                                <td><?php echo $row->option1; ?></td>
                                                <td><?php echo $row->option2; ?></td>
                                                <td><?php echo $row->option3; ?></td>
                                                <td><?php echo $row->option4; ?></td>
                                                    <td><a href="../forms/Edit_question.php?edit=1&q_no=<?php echo $row->q_no; ?>" ><input class="btn btn-primary btn-small" value="EDIT" type="submit" name="edit"></a></td>
                                                    <td><a href="question_list.php?delete=1&q_no=<?php echo $row->q_no; ?>" ><input class="btn btn-primary btn-small" value="DELETE" type="submit" name="delete"></a></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                        }
                                    ?>
                                    
                                    <tfoot>
                                        <tr>
                                            <th>subject_title</th>
                                            <th>question</th>
                                            <th>correct answer</th>
                                            <th>option1</th>
                                            <th>option2</th>
                                            <th>option3</th>
                                            <th>option4</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!--/.module-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <script src="../../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/common.js" type="text/javascript"></script>

    </body>
