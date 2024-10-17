<?php
session_start();
if (!isset($_SESSION['student_logged_in'])) {
    header("Location: student_login.php");
    exit();
}

include 'db_connection.php'; 
$query = "SELECT * FROM quiz"; 
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a Quiz</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(30, 30, 30, 0.9));
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .container {
            background: #000;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 255, 255, 0.2);
            width: 600px;
            max-width: 90%;
            text-align: center;
            position: relative;
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        h1 {
            font-size: 36px;
            margin-bottom: 30px;
            color: #00ff99;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        }
        button {
            background-color: #00ff99;
            color: black;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            margin-top: 30px;
        }
        button:hover {
            background-color: #00cc7a;
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 255, 153, 0.5);
        }
        .quiz-option {
            margin-bottom: 20px;
            font-size: 20px;
            padding: 15px;
            background-color: rgba(0, 255, 153, 0.1);
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            color: #00ff99;
        }
        .quiz-option:hover {
            background-color: rgba(0, 255, 153, 0.4);
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 255, 153, 0.4);
        }
        .quiz-option input[type="radio"] {
            margin-right: 10px;
            transform: scale(1.4);
            accent-color: #00ff99;
        }
        nav a {
            display: inline-block;
            margin-top: 20px;
            font-size: 18px;
            color: #00ff99;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        nav a:hover {
            color: #00cc7a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Select a Quiz</h1>
        <form action="display_questions.php" method="POST">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="quiz-option">
                    <input type="radio" name="quizid" value="<?php echo $row['quizid']; ?>" required>
                    <?php echo $row['quizname']; ?>
                </div>
            <?php endwhile; ?>
            <button type="submit">Start Quiz</button>
        </form>
        <nav>
            <a href="logout.php">Logout</a>
        </nav>
    </div>
</body>
</html>
