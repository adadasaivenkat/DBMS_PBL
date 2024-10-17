<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $quiz_id_inserted = $_POST['quizid']; 
    $question = $_POST['question'];
    $options = $_POST['options']; 
    $correct_option = $_POST['correct_option']; 

    
    $opt_a = isset($options[0]) ? $options[0] : '';
    $opt_b = isset($options[1]) ? $options[1] : '';
    $opt_c = isset($options[2]) ? $options[2] : '';
    $opt_d = isset($options[3]) ? $options[3] : '';

    
    $question_query = "INSERT INTO question (quizid, question_text, Opt_1, Opt_2, Opt_3, Opt_4) 
                       VALUES ('$quiz_id_inserted', '$question', '$opt_a', '$opt_b', '$opt_c', '$opt_d')";

    if (mysqli_query($conn, $question_query)) {
        
        $question_id_inserted = mysqli_insert_id($conn);

        
        $answer_query = "INSERT INTO answer (Qid, Opt_id, Quizid) 
                         VALUES ('$question_id_inserted', '$correct_option', '$quiz_id_inserted')";

        if (mysqli_query($conn, $answer_query)) {
            
            header("Location: admin_dashboard.php");
            exit();
        } else {
            
            echo "Error inserting answer: " . mysqli_error($conn);
        }
    } else {
        
        echo "Error inserting question: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
?>
