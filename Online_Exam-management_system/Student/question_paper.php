<?php

    session_start();
    if (!isset($_SESSION['student_name'])) {
        header("refresh:1; url= student_sign_in.php");
    }
    else{
        error_reporting(0);
        include_once('../config/dbconnect.php');
    }

    $subject = $_GET['subject'];
    $_SESSION['subject'] = $subject;
    $studentName = $_SESSION['student_name'];
    $dateOfResponse = date("Y-m-d");
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
    <body onload="timeout()">
        <div class="navbar navbar-fixed-top ">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand">Questions For <?php echo $subject; ?> :</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container" style="height: 15000px;">
                    <?php 
                                          $student_name = $_SESSION['student_name'];

                                          $sqlC = "SELECT * FROM `answer_responses` WHERE s_name='$student_name' AND subject_title='$subject'";
                                          $resultC = mysqli_query($conn, $sqlC);
                                          $count = mysqli_num_rows($resultC);
                                          $rowC = mysqli_fetch_assoc($resultC);

                                          if ($count >= 1 && $rowC['s_name'] && $rowC['subject_title']) {

                                            ?>
                                                <center><h3><p style="font-weight: bold">You Already Gave the Exam!!!</p></h3></center>
                                                <br> 
                                            <?php
                                            header("refresh:1; url=student_Dashboard.php");
                                          }
                                          else{

                                 ?>
                <div class="row">
                    <div class="span5">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <h2><div id="time-left" style="font-weight: bold">timeout</div></h2>
                               <!-- <div style="font-weight: bold" id="exam-time-left"> -->

                                    <script type="text/javascript">
                                        var timeLeft=60*10;
                                        function timeout()
                                        {
                                            var hours=Math.floor(timeLeft/3600);
                                            var minute=Math.floor((timeLeft-(hours*60*60)-30)/60);
                                            var second=timeLeft%60;
                                            var hrs=checktime(hours);
                                            var mint=checktime(minute);
                                            var sec=checktime(second);
                                            if(timeLeft<=0)
                                            {
                                                clearTimeout(tm);
                                                document.getElementById("exam_form").submit();
                                            } 
                                            else
                                            {

                                                document.getElementById("time-left").innerHTML="Time Left : "+mint+" minutes, "+sec+" seconds";
                                            }
                                            timeLeft--;
                                            var tm= setTimeout(function(){timeout()},1000);
                                        }
                                        function checktime(msg)
                                        {
                                            if(msg<10)
                                            {
                                                msg="0"+msg;
                                            }
                                            return msg;
                                        }
                                    </script>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="span9" style="margin-left: 150px;">
                         <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Your Questions</h3></center>
                            </div>
                            <div class="module-body">
                                    <br />
                                    <?php

                                        $sql="SELECT * FROM `question` WHERE subject_title = '$subject' ORDER BY rand() LIMIT 10";
                                        $query=mysqli_query($conn,$sql);

                                        if (mysqli_num_rows($query)>0) {
                                            while ($row=mysqli_fetch_object($query)) {

                                                $subject_title = $row->subject_title;
                                                $question = $row->question;
                                                $q_no = $row->q_no;
                                                $correct_answer = $row->correct_answer;
                                               
												$option1=$row->option1;
                                                $option2 = $row->option2;
                                                $option3 = $row->option3;
                                                $option4 = $row->option4;
                                                $i++;
                                            ?>
                                <form method="post" action="response_insert.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group">
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $i;?> .<?php echo $question; ?></p>
                                                <input type="hidden" name="question[]" value="<?php echo $question?>">
                                                <input type="hidden" name="dateOfresponse[]" value="<?php echo $dateOfResponse?>">
                                                <input type="hidden" name="studentName[]" value="<?php echo $studentName?>">
                                                <input type="hidden" name="subject[]" value="<?php echo $subject?>">
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $q_no; ?>]" value="<?php echo $option1; ?>" >
                                                    <?php echo $option1; ?>
                                                </label> <br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $q_no; ?>]" value="<?php echo $option2; ?>">
                                                    <?php echo $option2; ?>
                                                </label><br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $q_no; ?>]" value="<?php echo $option3; ?>" >
                                                    <?php echo $option3; ?>
                                                </label> <br>
                                                <label class="radio inline">
                                                    <input type="radio" name="response[<?php echo $q_no; ?>]" value="<?php echo $option4; ?>">
                                                    <?php echo $option4; ?>
                                                </label><br>
                                                <label class="radio inline">
                                                    <input type="radio" checked="checked" name="response[<?php echo $q_no; ?>]" style="display:none" value="no_attempt">
                                                </label><br>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        }
                                        else{
                                            ?>
                                                <center><h3><p style="font-weight: bold">No Questions Available!!!</p></h3></center>
                                               
                                                <center><h3><a style="font-weight: bold; color: white;" href="subject_list.php">Try Other Subject</a></h3></center>
                                            <?php
                                        }

                                    
                                    ?>
                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Insert" type="submit" class="btn btn-primary btn-xl">Submit</button>
                                            </div>
                                        </div>
                                    <?php } ?>
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
        <script src="../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../Assets/scripts/common.js" type="text/javascript"></script>

    </body>
