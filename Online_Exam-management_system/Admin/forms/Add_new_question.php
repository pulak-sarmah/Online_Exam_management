<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= ../Admin_Signin.php");
    }
    else{
        //error_reporting(0);
        include_once('../../config/dbconnect.php');
    }

        $subject_title = "";
        $question = "";
        $correct_answer = "";
        $option1 = "";
        $option2 = "";
        $option3 = "";
        $option4 = "";

    if (isset($_POST['Insert'])) {
        $subject_title = $_POST['subject_title'];
        $question = $_POST['question'];
        $correct_answer = $_POST['correct_answer'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
    

        $sql = "INSERT INTO question(subject_title, question, correct_answer, option1, option2, option3, option4) 
                VALUES ('$subject_title','$question','$correct_answer','$option1','$option2','$option3','$option4')"; 

        if (mysqli_query($conn, $sql)) 
        {
            $successmsz = 'question successfully registered.';
            header("refresh:1; url=Add_new_question.php");
        }
        else
        {
            $errormsz = mysqli_error($conn);
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
                            <li><a class="options" href="../lists/student_list.php">student List</a></li>
                            <li><a class="options" href="../lists/subject_list.php">Subject List</a></li>
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
                                <center><h3>Add question Details</h3></center>
                            </div>
                            <div class="module-body">

                                    <?php
                                            if(isset($successmsz))
                                            {
                                              ?>
                                              <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <a href="Add_new_question.php"><?php echo $successmsz; ?><a/> 
                                              </div>
                                              <?php
                                            }
                                       ?>

                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Subject Title</label>
                                            <div class="controls">
                                                <select name="subject_title" class="span8">
                                                    <option selected="selected">--Select Subject--</option>
                                                    <?php
                                                        $queryS = "SELECT * FROM subject";
                                                        $resultS = mysqli_query($conn,$queryS);
                                                        while($row=mysqli_fetch_assoc($resultS))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $row['subject_title']; ?>"><?php echo $row['subject_title']; ?></option>
                                                            <?php
                                                        } 
                                                    ?>
                                            </select>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="question">Your Question</label>
                                            <div class="controls">
                                                <textarea id="question" name="question" class="span8" rows="5" required></textarea><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="correct_answer">Correct Answer</label>
                                            <div class="controls">
                                                <input type="text"
                                                name="correct_answer" id="correct_answer" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option1">option1</label>
                                            <div class="controls">
                                                <input type="text" name="option1" id="option1" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option2">option2</label>
                                            <div class="controls">
                                                <input type="text" name="option2" id="option2" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option3">option3</label>
                                            <div class="controls">
                                                <input type="text" name="option3" id="option3" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="option4">option4</label>
                                            <div class="controls">
                                                <input type="text" name="option4" id="option4" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Insert" type="submit" class="btn btn-primary btn-xl">Insert</button>
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
