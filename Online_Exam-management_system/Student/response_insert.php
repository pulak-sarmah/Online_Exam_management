<?php

    session_start();
    if (!isset($_SESSION['student_name'])) {
        header("refresh:0; url= student_sign_in.php");
    }
    else{
        include_once('../config/dbconnect.php');
    } 

      $sql = "INSERT INTO answer_responses(s_name, question, response, dateOfResponse, subject_title,q_no) VALUES";
    
        $i=0;
        foreach($_POST['response'] as $response) { 


            $sql .= "('".$_POST['studentName'][$i]."', '".$_POST['question'][$i]."', '".$response."', 
                    '".$_POST['dateOfresponse'][$i]."', '".$_POST['subject'][$i]."','".$_POST['q_no'][$i]."')";

            $i++; 
        }
        $sql = rtrim($sql,",");

        if (mysqli_query($conn, $sql)) 
        {
            $successmsz = 'Result successfully Inserted.';
            header("refresh:0; url=student_Dashboard.php");
        }
        else
        {
            $errormsz = mysqli_error($conn);
        }



?>
    

