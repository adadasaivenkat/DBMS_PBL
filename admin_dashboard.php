<?php
session_start(); 


if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php"); 
    exit();
}


$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Admin';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.8), rgba(40, 40, 40, 0.8)),
                        url('admin_dashboard.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
            background: rgba(0, 0, 0, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 255, 0, 0.6);
            animation: fadeIn 1s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h1 {
            font-size: 36px;
            color: #00ff00;
            text-shadow: 2px 2px 10px rgba(0, 255, 0, 0.8);
            margin-bottom: 20px;
            animation: slideIn 0.5s ease forwards;
        }
        @keyframes slideIn {
            from { transform: translateY(-30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        a {
            display: inline-block;
            background-color: #009900;
            color: white;
            padding: 12px 20px;
            margin: 10px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5);
        }
        a:hover {
            background-color: #007700;
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.8);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo $username; ?></h1>
        <a href="create_quiz.php">Create Quiz</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
