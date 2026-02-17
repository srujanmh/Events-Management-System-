<?php
session_start();

// If already logged in, redirect to index.php
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Handle login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === "student" && $password === "123456") {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } elseif ($username === "admin" && $password === "admin123") {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'admin';
        header("Location: edit.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GM University - Login</title>
    <style>
        /* [same styles you had] */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
        }
        .left-panel {
            flex: 1;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .login-box {
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #e9f1f9;
        }
        .remember-me {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .remember-me input {
            margin-right: 5px;
        }
        .sign-in-button {
            background-color: #d1a12f;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        .right-panel {
            flex: 1;
            background-color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #922206;
            text-align: center;
        }
        .right-panel img {
            width: 300px;
            margin-bottom: 20px;
        }
        .right-panel h1 {
            margin: 0;
        }
        .right-panel p {
            font-style: italic;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="left-panel">
        <div class="login-box">
            <h2>Welcome to<br><strong>G M University</strong></h2>
            <p>Login into your account</p>

            <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

            <!-- ✅ This form connects to PHP login logic -->
            <form method="post">
                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" required>

                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="sign-in-button">SIGN IN</button>
            </form>
        </div>
    </div>

    <div class="right-panel">
        <img src="https://tse3.mm.bing.net/th?id=OIP.gkL3ZmnUdq5cylT86BC8oQHaHa&pid=Api&P=0&h=180" alt="GM University Logo">
    
    </div>

</body>
</html>
