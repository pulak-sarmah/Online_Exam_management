<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= ../Admin_Signin.php");
    }
    else{
        //error_reporting(0);
        include_once('../../config/dbconnect.php');
    }

        
        $question = "";
        $correct_answer = "";
        $option1 = "";
        $option2 = "";
        $option3 = "";
        $option4 = "";

    if (isset($_POST['Update'])) {
        $q_no = $_POST['q_no'];
        $question = $_POST['question'];
        $correct_answer = $_POST['correct_answer'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
    
        $sqlu = "UPDATE question SET question='$_POST[question]', correct_answer='$_POST[correct_answer]', 
                option1='$_POST[option1]', option2='$_POST[option2]', option3='$_POST[option3]', option4='$_POST[option4]' 
                WHERE q_no='$q_no'";

        if (mysqli_query($conn, $sqlu)) 
        {
            $successmsz = 'Question Successfully Updated.';
            header('Refresh:1; ../lists/question_list.php');
        }
        else
        {
            $errormsz = mysqli_error($conn);
        }

    }

    if (isset($_GET['edit'])) {
        $sqlE = "SELECT * FROM question WHERE q_no='{$_GET['q_no']}'";
        $eQuery = mysqli_query($conn,$sqlE);
        $row = mysqli_fetch_object($eQuery);

        $q_no = $row->q_no;
        $question = $row->question;
        $correct_answer = $row->correct_answer;
        $option1 = $row->option1;
        $option2 = $row->option2;
        $option3 = $row->option3;
        $option4 = $row->option4;

    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta title="viewport" content="width=device-width, initial-scale=1.0">
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
                            <li><a class="options" href="../lists/student_list.php">Student List</a></li>
                            <li><a class="options" href="../lists/subject_list.php">List Subject</a></li>
                            <li><a class="options" href="Add_new_question.php">Add new Question</a></li>
                            <li><a class="options" href="../lists/question_list.php">Question List</a></li>
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
                    <div class="span9"  style="margin-left: 150px;">
                        <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Update Question Details</h3></center>
                            </div>
                            <div class="module-body">

                                    <?php
                                            if(isset($successmsz))
                                            {
                                              ?>
                                              <div class="alert alert-success">
                                                <a href="#"><?php echo $successmsz; ?><a/> 
                                              </div>
                                              <?php
                                            }
                                       ?>

                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <input type="hidden" id="subject_code" value="<?php echo $q_no; ?>"
                                         name="q_no" class="span8"><br><br>

                                        <div class="control-group">
                                            <label class="control-label" for="question">Question</label>
                                            <div class="controls">
                                                <input type="text" id="question" value="<?php echo $question; ?>" name="question" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="correct_answer">Correct Answer</label>
                                            <div class="controls">
                                                <input type="text" id="correct_answer" value="<?php echo $correct_answer; ?>" name="correct_answer" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option1">option 1</label>
                                            <div class="controls">
                                                <input type="text" id="option1" value="<?php echo $option1; ?>" name="option1" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option2">option 2</label>
                                            <div class="controls">
                                                <input type="text" id="option2" value="<?php echo $option2; ?>" name="option2" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option3">option 3</label>
                                            <div class="controls">
                                                <input type="text" id="option3" value="<?php echo $option3; ?>" name="option3" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option4">option 4</label>
                                            <div class="controls">
                                                <input type="text" id="option4" value="<?php echo $option4; ?>" name="option4" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Update" type="submit" class="btn btn-primary btn-xl">Update</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div><!--/.content-->
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
