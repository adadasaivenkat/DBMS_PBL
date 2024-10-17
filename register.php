<?php
session_start();
include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "SELECT * FROM student WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $error_message = "Username already exists. Please choose another.";
    } else {
        
        $insert_query = "INSERT INTO student (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $insert_query)) {
            $_SESSION['student_logged_in'] = true;
            header("Location: quiz.php"); 
            exit();
        } else {
            $error_message = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(40, 40, 40, 0.9)), 
                        url('student_background_image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.85);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(255, 0, 150, 0.6);
            width: 400px;
            text-align: center;
            position: relative;
            animation: fadeIn 1.5s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            margin-bottom: 20px;
            font-size: 34px;
            color: #ffcc00;
            text-shadow: 4px 4px 8px rgba(255, 204, 0, 0.8);
            position: relative;
        }
        h2::before {
            content: '';
            position: absolute;
            left: 50%;
            bottom: -10px;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: #ffcc00;
            border-radius: 2px;
            animation: slideIn 0.7s ease-in-out;
        }
        @keyframes slideIn {
            from { width: 0; }
            to { width: 80px; }
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #fff;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            transition: box-shadow 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            box-shadow: 0 0 10px #ffcc00;
            outline: none;
        }
        button {
            background-color: #ff007f;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 50px;
            font-size: 18px;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
            width: 100%;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #e60073;
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 0, 127, 0.7);
        }
        .error {
            color: #ffcc00;
            margin-top: 10px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        .login-container::after {
            content: '';
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(0.9) translateX(-50%); opacity: 0.7; }
            100% { transform: scale(1.1) translateX(-50%); opacity: 0.3; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Student Registration</h2>
        <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="register.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Register</button>
        </form>
        <a href="student_login.php" style="display: inline-block; margin-top: 10px; text-decoration: none; color: #ffcc00; font-weight: bold;">Login</a>
    </div>
</body>
</html>
