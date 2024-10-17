<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExambitX</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(30, 30, 30, 0.9)), 
                        url('background_image.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1 {
            font-size: 50px;
            text-shadow: 4px 4px 10px rgba(255, 0, 150, 0.8);
            color: #00ffcc;
        }
        .login-links {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .login-links a {
            text-decoration: none;
            color: #fff;
            background-color: #ff0066;
            padding: 15px 60px;
            margin: 15px;
            border-radius: 50px;
            font-size: 24px;
            box-shadow: 0 10px 20px rgba(255, 0, 102, 0.5);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .login-links a::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 300%;
            height: 300%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.3), transparent);
            transform: translateX(-50%) translateY(-50%) scale(0.1);
            transition: transform 0.3s ease;
        }
        .login-links a:hover::before {
            transform: translateX(-50%) translateY(-50%) scale(1.2);
        }
        .login-links a:hover {
            background-color: #e6005c;
            box-shadow: 0 15px 25px rgba(255, 0, 102, 0.7);
            transform: translateY(-5px);
        }
        .login-links img {
            width: 60px;
            height: 60px;
            vertical-align: middle;
            margin-right: 20px;
        }
        footer {
            font-size: 18px;
            color: #e0e0e0;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <h1>Welcome to ExambitX</h1>

    <div class="login-links">
        <a href="student_login.php">
            <img src="student_icon.png" alt="Student Login Icon">Student Login
        </a>
        <a href="admin_login.php">
            <img src="admin_icon.png" alt="Admin Login Icon">Admin Login
        </a>
    </div>

    <footer>
        © 2024 ExambitX. All Rights Reserved.
    </footer>
</body>
</html>
