<?php
// Include database connection
require_once 'database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (empty($email) || empty($newPassword) || empty($confirmPassword)) {
        $message = "<div class='error'>❌ All fields are required!</div>";
    } elseif ($newPassword !== $confirmPassword) {
        $message = "<div class='error'>❌ Passwords do not match!</div>";
    } else {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update the password in the database
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $hashedPassword, $email);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            $message = "<div class='success'>✅ Password reset successfully.</div>";
        } else {
            $message = "<div class='error'>❌ Error resetting password or email not found.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
            margin: 80px auto;
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
            display: grid;
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
    <div class="container fade-in">
        <div class="app-Header">
            <h1>Reset Password</h1>
            <p>Enter your email and new password to reset your account password</p>
        </div>

        <div class="main-Content">
            <?php echo $message; ?>

            <form method="POST" action="">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required>

                <label for="new_password">New Password:</label>
                <input type="password" id="new_password" name="new_password" placeholder="Your New Password" required>

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Your Password" required>

                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
            </form>
        </div>
    </div>
</body>
</html>