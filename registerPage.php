<?php
require_once 'database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    //store the name in session and use it in the next page
    session_start();
    $_SESSION['name'] = $name;
    $surname = $_POST['surname'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (empty($name) || empty($surname) || empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        $message = "<div class='error'>❌ All fields are required!</div>";
    } elseif ($password !== $confirmPassword) {
        $message = "<div class='error'>❌ Passwords do not match!</div>";
    } else {
        // Check for duplicate email
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $message = "<div class='error'>❌ Email is already registered!</div>";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the user into the database
            $stmt = $conn->prepare("INSERT INTO users (name, surname, username, email, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $surname, $username, $email, $hashedPassword);

            if ($stmt->execute()) {
                $message = "<div class='success'>✅ Registration successful! You can now <a href='loginPage.php'>login</a>.</div>";
            } else {
                $message = "<div class='error'>❌ Error occurred during registration. Please try again.</div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
        }

        .app-header {
            background-color: white;
            padding: 20px;
            border-radius: 16px 16px 0 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            text-align: center;
            border-bottom: 3px solid var(--accent-color);
        }

        .app-header h1 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 32px;
        }

        .main-content {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 16px 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }

        input:focus {
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

        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 5px solid #2e7d32;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container fade-in">
        <div class="app-header">
            <h1>Create an Account</h1>
            <p>Register to access your Mitra dashboard</p>
        </div>

        <div class="main-content">
            <?php echo $message; ?>

            <form action="" method="POST">
                <label for="name">First Name:</label>
                <input type="text" id="name" name="name" placeholder="Your First Name" required>

                <label for="surname">Last Name:</label>
                <input type="text" id="surname" name="surname" placeholder="Your Last Name" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Your Username" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Your Password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password" required>

                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <p style="text-align: center; margin-top: 20px;">Already have an account? <a href="loginPage.php">Login here</a></p>
            </form>
        </div>
    </div>
</body>
</html>