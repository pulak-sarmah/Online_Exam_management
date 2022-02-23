<?php

    session_start();
    if (!isset($_SESSION['student_name'])) 
	{
        header("refresh:1; url= student_sign_in.php");
    }
    else
	{
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
                        <i class="icon-reorder shaded"></i></a><a class="brand">Result For <?php echo $subject; ?> :</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav pull-right">
                            <li><a class="options" href="student_Dashboard.php">Dashboard</a></li>
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
                    <div class="span3">
                            </ul>
                        </div>
                    </div>
                    <div class="span9" style="margin-left: 150px;">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <center><h3>Your Answers</h3></center>
                            </div>
                            <div class="module-body">
                                    <br />
                                    <?php
                                        $sql="SELECT * FROM `answer_responses` WHERE subject_title = '$subject' AND s_name = '$studentName'";
                                        $query=mysqli_query($conn,$sql);
										$res=array(10);

                                        if (mysqli_num_rows($query)>0) 
										{
                                            while ($row=mysqli_fetch_object($query)) 
											{

                                                $s_name = $row->s_name;
                                                $question = $row->question;
                                                $response = $row->response;
                                                $dateOfResponse = $row->dateOfResponse;
                                                $i++;
												$res[i]=$response;
												//echo $res[i];
                                            ?>
									<form method="post" action="marks_insert.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group" style="margin-left: 50px;">
                                            <p style="margin-top: 5px;"><?php echo $i;?> .<?php echo $question; ?></p>
                                            <p style="margin-top: 5px;">Answer : <?php echo $response; ?></p><br>
												<p style="margin-top: 5px;">your answer : <?php echo $res[$i]; ?></p><br>
											
                                        </div>
                                              <?php
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
										$corr=array(10);
                                        if (mysqli_num_rows($query)>0)
										{
                                            while ($row=mysqli_fetch_object($query))
											{

                                                $subject_title = $row->subject_title;
                                                $question = $row->question;
                                                $q_no = $row->q_no;
                                                $correct_answer = $row->correct_answer;
                                                $j++;
												$corr[j]=$correct_answer;
                                            ?>
                                <form method="post" action="marks_insert.php" id="exam_form" class="form-horizontal row-fluid">

                                        <div class="control-group" style="margin-left: 50px;">
                                            <p style="margin-top: 5px;"><?php echo $j;?> : <?php echo $question; ?></p>
                                            <p style="margin-top: 5px;">Correct Answer : <?php echo $correct_answer; ?></p><br>
										
										<p style="margin-top: 5px;">Correct Answer : <?php echo $corr[$j]; ?></p><br>
											
                                        </div>
                                        <?php
                                            }
                                        }
										
											
                                    }
                                    ?>
                                    </form>
									<form method="post" action="marks_insert.php" id="exam_form" class="form-horizontal row-fluid">

                                        
                                        <?php
										
									    $marks=0;
										$size=sizeof($res);
										$size1=sizeof($corr);
										for($k=1;$k<=$size;$k++)
										{
											if($res[$k]==$corr[$k])
											{
												$marks=$marks+2;
											}
										
										?>
										<div class="control-group" style="margin-left: 50px;">
										<p style="margin-top: 5px;">size : <?php echo $size; ?></p><br>
										<p style="margin-top: 5px;">size : <?php echo $size1; ?></p><br>
										<p style="margin-top: 5px;">your answer : <?php echo $res[1]; ?></p><br>
										<p style="margin-top: 5px;">Correct Answer : <?php echo $corr[1]; ?></p><br>
                                            <p style="margin-top: 5px;"><?php echo $marks;?> </p>
                                            
                                        </div>
										<?php
										}
										?>
										
										</form>
                                           
                                    
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
