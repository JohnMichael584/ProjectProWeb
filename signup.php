<?php
session_start();

$usersFile = 'users.json';
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Validate
    if ($password !== $confirmPassword) {
        $error = 'Passwords do not match!';
    } elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long!';
    } else {
        // Load existing users
        $userData = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];

        if (isset($userData[$username])) {
            $error = 'Username already exists. Please choose another.';
        } else {
            // Store new user
            $userData[$username] = [
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'registeredAt' => date('c')
            ];
            file_put_contents($usersFile, json_encode($userData, JSON_PRETTY_PRINT));
            $success = "Welcome, $username! Redirecting to login...";
            header("refresh:2;url=login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - Festava Live</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            position: relative;
            overflow: hidden;
            font-family: 'Outfit', sans-serif;
            background-color: #000;
        }

        .video-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            opacity: 0.8;
        }

        .signup-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
            width: 350px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
        }

        .signup-title {
            color: #F8CB2E;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: none;
            margin-bottom: 15px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 10px rgba(255, 208, 0, 0.7);
            color: white;
        }

        .btn-signup {
            background: linear-gradient(45deg, #F8CB2E, #493f06);
            border: none;
            width: 100%;
            margin-top: 10px;
        }

        .btn-signup:hover {
            background: linear-gradient(45deg, #e9c603, #312007);
            box-shadow: 0 0 20px rgba(255, 166, 1, 0.8);
        }

        .signup-links {
            margin-top: 15px;
            text-align: center;
        }

        .signup-links a {
            color: #F8CB2E;
            display: block;
            margin-bottom: 10px;
        }

        .error-message {
            color: #ff4d4d;
            text-align: center;
            margin-bottom: 15px;
        }

        .success-message {
            color: #4dff4d;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<video autoplay muted loop class="video-bg">
    <source src="video/pexels-2022395.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<div class="signup-container">
    <h2 class="signup-title">Create Your Festava Account</h2>

    <?php if (!empty($error)): ?>
        <div class="error-message"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <?php if (!empty($success)): ?>
        <div class="success-message"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form method="POST" action="signup.php">
        <div class="mb-3">
            <input type="text" class="form-control" name="username" placeholder="Choose a Username" required>
        </div>

        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
        </div>

        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Create Password" required>
        </div>

        <div class="mb-3">
            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-signup">Sign Up</button>

        <div class="signup-links">
            <a href="login.php">Already have an account? Login</a>
        </div>
    </form>
</div>
</body>
</html>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auth.js"></script>  