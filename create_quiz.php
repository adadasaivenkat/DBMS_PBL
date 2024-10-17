<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Quiz</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(40, 40, 40, 0.8)),
                        url('add_quiz.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
        }
        h1 {
            font-size: 24px;
            color: #8A2BE2;
            margin-bottom: 15px;
            text-shadow: 2px 2px 10px rgba(138, 43, 226, 0.8);
            animation: slideIn 0.5s ease forwards;
        }
        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        form {
            background: rgba(0, 0, 0, 0.85);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(138, 43, 226, 0.6);
            animation: fadeIn 1s ease-out;
            width: 90%;
            max-width: 800px;
            text-align: center;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-size: 14px;
            color: #9370DB;
            width: 25%;
            text-align: left;
        }
        input[type="text"], select {
            width: calc(75% - 10px);
            padding: 8px;
            border-radius: 5px;
            border: 2px solid #8A2BE2;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            transition: border 0.3s ease, transform 0.3s ease;
        }
        input[type="text"]:focus, select:focus {
            border: 2px solid #9370DB;
            outline: none;
            transform: scale(1.02);
        }
        select {
            color: black;
        }
        button {
            background-color: #8A2BE2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 10px;
        }
        button:hover {
            background-color: #6A5ACD;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 0 10px rgba(138, 43, 226, 0.5);
        }
        nav {
            margin-top: 15px;
        }
        nav a {
            color: #8A2BE2;
            text-decoration: none;
            margin: 0 8px;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #9370DB;
        }
    </style>
</head>
<body>
    <h1>Create a New Quiz</h1>
    <form action="save_quiz.php" method="POST">
        <div class="form-row">
            <label for="quizid">Quiz ID:</label>
            <input type="text" id="quizid" name="quizid" required>
        </div>
        
        <div class="form-row">
            <label for="quizname">Quiz Name:</label>
            <input type="text" id="quizname" name="quizname" required>
        </div>
        
        <div class="form-row">
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
        </div>
        
        <div class="form-row">
            <label for="option1">Option 1:</label>
            <input type="text" id="option1" name="options[]" required>
        </div>
        
        <div class="form-row">
            <label for="option2">Option 2:</label>
            <input type="text" id="option2" name="options[]" required>
        </div>
        
        <div class="form-row">
            <label for="option3">Option 3:</label>
            <input type="text" id="option3" name="options[]" required>
        </div>
        
        <div class="form-row">
            <label for="option4">Option 4:</label>
            <input type="text" id="option4" name="options[]" required>
        </div>
        
        <div class="form-row">
            <label for="correct_option">Correct Option (1-4):</label>
            <select id="correct_option" name="correct_option" required>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
        </div>
        
        <button type="submit">Save Quiz</button>
    </form>
    <nav>
        <a href="admin_dashboard.php">Back to Dashboard</a>
        <a href="logout.php">Logout</a>
    </nav>
</body>
</html>
