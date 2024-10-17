<?php
session_start();
if (!isset($_SESSION['student_logged_in'])) {
    header("Location: student_login.php");
    exit();
}

include 'db_connection.php'; 


if (isset($_POST['quizid'])) {
    $quizid = $_POST['quizid'];

    
    $query = "SELECT * FROM question WHERE quizid = '$quizid' ORDER BY RAND() LIMIT 10"; 
    $result = mysqli_query($conn, $query);
} else {
    
    header("Location: quiz.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, rgba(0, 0, 0, 1), rgba(30, 30, 30, 1));
        color: #ffffff;
        margin: 0;
        padding: 20px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    h1 {
        margin-bottom: 20px;
        color: #ffffff;
        text-shadow: 2px 2px 10px rgba(255, 255, 255, 0.7);
    }

    .question-container {
        max-height: 60vh;
        overflow-y: auto;
        padding: 10px;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        position: relative;
        margin-bottom: 20px;
    }

    .question {
        margin: 10px 0;
        padding: 15px;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.1);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s, box-shadow 0.3s;
        text-align: left;
    }

    .question:hover {
        transform: translateY(-5px) rotate(-1deg);
        box-shadow: 0 15px 30px rgba(255, 255, 255, 0.5);
        background: rgba(255, 255, 255, 0.2);
    }

    label {
        display: block;
        margin: 10px 0;
        padding: 8px;
        border: 2px solid transparent;
        border-radius: 8px;
        transition: color 0.3s, background-color 0.3s, border-color 0.3s;
    }

    label:hover {
        color: #ffffff;
        background-color: rgba(255, 255, 255, 0.3);
        border-color: #ffffff;
    }

    input[type="radio"] {
        margin-right: 10px;
        transform: scale(1.2);
        transition: transform 0.3s;
    }

    button {
        background: linear-gradient(90deg, #ffcc00, #ffffff);
        color: #000;
        padding: 12px 25px;
        border: none;
        border-radius: 25px;
        font-size: 18px;
        cursor: pointer;
        transition: background 0.3s, transform 0.3s;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        margin-top: 20px;
    }

    button:hover {
        background: linear-gradient(90deg, #d4af37, #ffffff);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(255, 255, 255, 0.6);
    }

    nav a {
        display: inline-block;
        margin-top: 20px;
        font-size: 18px;
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s, transform 0.3s;
    }

    nav a:hover {
        color: #d4af37;
        transform: translateY(-2px);
    }
</style>

</head>
<body>
    <h1>Quiz Questions</h1>
    <form action="submit_quiz.php" method="POST">
        <input type="hidden" name="quizid" value="<?php echo htmlspecialchars($quizid); ?>">
        
        <div class="question-container"> <!-- Scrollable container -->
            <?php $questionNumber = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="question">
                    <h2><span class="question-number"><?php echo $questionNumber++; ?>.</span><?php echo $row['question_text']; ?></h2>
                    <label>
                        <input type="radio" name="answer[<?php echo $row['Qid']; ?>]" value="<?php echo $row['Opt_1']; ?>" required>
                        A. <?php echo $row['Opt_1']; ?>
                    </label>
                    <label>
                        <input type="radio" name="answer[<?php echo $row['Qid']; ?>]" value="<?php echo $row['Opt_2']; ?>" required>
                        B. <?php echo $row['Opt_2']; ?>
                    </label>
                    <label>
                        <input type="radio" name="answer[<?php echo $row['Qid']; ?>]" value="<?php echo $row['Opt_3']; ?>" required>
                        C. <?php echo $row['Opt_3']; ?>
                    </label>
                    <label>
                        <input type="radio" name="answer[<?php echo $row['Qid']; ?>]" value="<?php echo $row['Opt_4']; ?>" required>
                        D. <?php echo $row['Opt_4']; ?>
                    </label>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Submit button at the bottom -->
        <button type="submit">Submit Answers</button>
    </form>
    <nav>
        <a href="quiz.php">Back to Quiz Selection</a>
    </nav>
</body>
</html>
