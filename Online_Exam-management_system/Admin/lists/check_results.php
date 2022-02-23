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

    $student = $_POST['student'];
    $subject = $_POST['subject'];
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
                    <div class="span3">
                        <div class="sidebar">
                            <div class="controls">
                                            <form  method="post" action="check_results.php" id="exam_form" class="form-horizontal row-fluid">
                                                <p style="color: white; font-weight: bold;">Select Student :</p>
                                                <select name="student" class="span8">
                                                    <option selected="selected">--Select Student--</option>
                                                    <?php
                                                        $queryS = "SELECT * FROM student";
                                                        $resultS = mysqli_query($conn,$queryS);
                                                        while($rowS=mysqli_fetch_assoc($resultS))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $rowS['student_name']; ?>"><?php echo $rowS['student_name']; ?></option>
                                                            <?php
                                                        } 
                                                    ?>
                                                </select>
                                                <br><br>
                                                <p style="color: white; font-weight: bold;">Select Subject :</p>
                                                <select name="subject" class="span8">
                                                    <option selected="selected">--Select subject--</option>
                                                    <option>Artifical Inteligence</option>
                                                    <option>Mathematics</option>
                                                    <option>C++</option>
                                                    <option>Java</option>
                                                    <option>PHP</option>
                                                </select>
                                                <br><br>

                                                        <button name="check" type="submit" class="btn btn-primary btn-xl">check</button><br><br>
                                            </form>                                        
                            </div>
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9" style="margin-left: 60px; width: 1100px;">
                        <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Student Answers</h3></center>
                            </div>
                            <div class="module-body">
                                    <br />
                                    <?php

                                        $sql="SELECT * FROM `answer_responses` WHERE subject_title = '$subject' AND s_name = '$student'";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {

                                                $s_name = $row->s_name;
                                                $question = $row->question;
                                                $response = $row->response;
                                                $dateOfResponse = $row->dateOfResponse;
                                                $i++;
                                            ?>
                                <form method="post" action="marks_insert.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group" style="margin-left: 50px;">
                                            <p style="margin-top: 5px;"><?php echo $i;?> .<?php echo $question; ?></p>
                                            <p style="margin-top: 5px;">Answer : <?php echo $response; ?></p><br>
                                        </div>
                                        <?php
                                            }
                                        }
                                    ?>
                                    </form>
                            </div>
                        </div> 
                        <!-- module Solution -->
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Correct Solutions</h3></center>
                            </div>
                            <div class="module-body">
                                    <br />
                                    <?php

                                        $sql="SELECT * FROM `question` WHERE subject_title = '$subject'";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {

                                                $subject_title = $row->subject_title;
                                                $question = $row->question;
                                                $q_no = $row->q_no;
                                                $correct_answer = $row->correct_answer;
                                            ?>
                                <form method="post" action="marks_insert.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group" style="margin-left: 50px;">
                                            <p style="margin-top: 5px;">Question : <?php echo $question; ?></p>
                                            <p style="margin-top: 5px;">Correct Answer : <?php echo $correct_answer; ?></p><br>
                                        </div>
                                        <?php
                                            }
                                        }
                                    ?>
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
