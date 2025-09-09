<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra.Login_Page</title>
    <!-- <link rel="stylesheet" href="Style.css"> -->
     <style>
     :root {
    --primary-color: #4361ee;
    --secondary-color: #3f37c9;
    --accent-color: #4895ef;
    --light-color: #f8f9fa;
    --dark-color: #212529;
    --success-color: #2ecc71;
    --warning-color: #f39c12;
    --danger-color: #e74c3c;
    --info-color: #3498db;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    color: #333;
    line-height: 1.6;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.app-header {
    background-color: white;
    padding: 20px;
    border-radius: 16px 16px 0 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    margin-top: 30px;
    text-align: center;
    border-bottom: 3px solid var(--accent-color);
}

.app-header h1 {
    color: var(--primary-color);
    margin-bottom: 10px;
    font-size: 32px;
}

.app-header p {
    color: #666;
    max-width: 800px;
    margin: 0 auto;
}

.main-content {
    background-color: white;
    padding: 30px;
    border-radius: 0 0 16px 16px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea {
    width: 100%;
    padding: 15px;
    font-size: 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    margin-bottom: 15px;
    transition: border-color 0.3s;
}

input:focus,
textarea:focus {
    border-color: var(--accent-color);
    outline: none;
    box-shadow: 0 0 0 3px rgba(72, 149, 239, 0.2);
}

.btn {
    padding: 12px 24px;
    font-size: 16px;
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.btn-primary {
    background-color: var(--primary-color);
}

.btn-primary:hover {
    background-color: var(--secondary-color);
}

.btn-block {
    display: block;
    width: 100%;
}

.error {
    background-color: #ffebee;
    color: #c62828;
    padding: 15px;
    border-radius: 8px;
    margin: 20px 0;
    border-left: 5px solid #c62828;
}

.fade-in {
    animation: fadeIn 0.5s ease-in;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

body.loading::before {
    content: "";
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(255, 255, 255, 0.8) url('spinner.gif') no-repeat center center;
    z-index: 9999;
}
    
    </style>

</head>
<body>

<?php
require_once 'database.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $message = "<div class='error'>❌ Email and Password are required!</div>";
    } else {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: Dashboard.php");
            exit();
        } else {
            $message = "<div class='error'>❌ Invalid Email or Password!</div>";
        }
    }
}
?>

<div class="container fade-in" style="max-width: 500px; margin-top: 80px;">
    <div class="app-header">
        <h1>Welcome Back</h1>
        <p>Login to access your Mitra dashboard</p>
    </div>

    <div class="main-content">
        <?php echo $message; ?>

        <form action="loginPage.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="you@example.com" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Your Password" required>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
            <p style="text-align: center; margin-top: 20px;">Don't have an account? <a href="registerPage.php">Register here</a></p>
            <p style="text-align: center; margin-top: 10px;">Forgot your password? <a href="resetPassword.php">Reset it</a></p>
        </form>
    </div>
</div>

</body>
</html>
