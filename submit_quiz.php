<?php
session_start();
if (!isset($_SESSION['student_logged_in'])) {
    header("Location: student_login.php");
    exit();
}

include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quizid = $_POST['quizid'];
    $userAnswers = $_POST['answer']; 
    $score = 0;

    
    $resultsQuery = "
        SELECT q.Qid, a.Opt_id 
        FROM question q 
        JOIN answer a ON q.Qid = a.Qid 
        WHERE a.quizid = '$quizid'";
    
    $resultsResult = mysqli_query($conn, $resultsQuery);

    
    $correctAnswers = [];
    
    while ($row = mysqli_fetch_assoc($resultsResult)) {
        $correctAnswers[$row['Qid']] = $row['Opt_id']; 
    }

    
    foreach ($correctAnswers as $qid => $correctAnswer) {
        if (isset($userAnswers[$qid]) && $userAnswers[$qid] === $correctAnswer) {
            $score++;
        }
    }

    
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Quiz Results</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #000;
                color: #f4f4f4;
                padding: 20px;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
                overflow: hidden;
            }
            h1 {
                color: #ffcc00;
                text-align: center;
                animation: fadeIn 1s ease-in-out;
            }
            h2 {
                text-align: center;
                color: #007BFF;
                animation: slideIn 1s ease;
                transform: translateY(20px);
                opacity: 0;
            }
            h2.show {
                transform: translateY(0);
                opacity: 1;
            }
            a, button {
                display: block;
                text-align: center;
                margin-top: 20px;
                text-decoration: none;
                background-color: #007BFF;
                color: white;
                padding: 10px 20px;
                border-radius: 50px;
                border: none;
                font-size: 16px;
                transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
                animation: fadeIn 1s ease-in-out;
            }
            a:hover, button:hover {
                background-color: #0056b3;
                transform: scale(1.1) rotate(3deg);
                box-shadow: 0 4px 20px rgba(0, 91, 255, 0.5);
            }
            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
            @keyframes slideIn {
                from {
                    transform: translateY(20px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
        </style>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                
                setTimeout(function () {
                    document.querySelector('h2').classList.add('show');
                }, 500);
            });
        </script>
    </head>
    <body>
        <h1>Your Score:</h1>
        <h2>$score</h2>
        <a href='quiz.php'>Back to Quiz Selection</a>
        <form action='logout.php' method='POST'>
            <button type='submit'>Logout</button>
        </form>
    </body>
    </html>";

} else {
    
    header("Location: quiz.php");
    exit();
}
?>
