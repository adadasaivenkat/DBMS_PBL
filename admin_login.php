<?php
session_start();
include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $query = "SELECT * FROM admin WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['password'] === $password) { 
                $_SESSION['admin_logged_in'] = true;
                header("Location: admin_dashboard.php"); 
                exit();
            } else {
                $error_message = "Invalid login credentials.";
            }
        } else {
            $error_message = "Invalid login credentials.";
        }
    } else {
        $error_message = "Database query failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(40, 40, 40, 0.9)), 
                        url('admin_background.png') no-repeat center center fixed;
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
            box-shadow: 0 0 30px rgba(255, 165, 0, 0.6);
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
            color: #ff9900;
            text-shadow: 4px 4px 8px rgba(255, 165, 0, 0.8);
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
            background-color: #ff9900;
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
            box-shadow: 0 0 10px #ff9900;
            outline: none;
        }
        button {
            background-color: #ff6600;
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
            background-color: #e65c00;
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(255, 165, 0, 0.7);
        }
        .error {
            color: #ff9900;
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
        <h2>Admin Login</h2>
        <?php if (isset($error_message)) { ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php } ?>
        <form action="admin_login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
