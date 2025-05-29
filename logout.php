<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festava Live - Music Fest 2025</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Fonts & CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background-color: #000;
            color: #fff;
        }

        header.site-header {
            background-color: #f8cb2e;
            padding: 20px 0;
        }

        .ticket-btn {
            background: #f8cb2e;
            color: #000;
            font-weight: bold;
            margin: 20px 10px;
            border-radius: 5px;
        }

        .ticket-btn:hover {
            background-color: #e0b800;
            color: #000;
        }
    </style>
</head>
<body>

<!-- Header Section -->
<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 d-flex flex-wrap align-items-center">
                <p class="d-flex me-4 mb-0 align-items-center">
                    <i class="bi bi-person custom-icon me-2"></i>
                    <?php if ($isLoggedIn): ?>
                        <strong class="text-dark">Welcome, <?= htmlspecialchars($username) ?>!</strong>
                    <?php else: ?>
                        <strong class="text-dark">Welcome to Music Fest 2025</strong>
                    <?php endif; ?>
                </p>
                <div class="ms-auto">
                    <?php if ($isLoggedIn): ?>
                        <a href="logout.php" class="btn btn-sm btn-outline-danger">
                            <i class="bi-box-arrow-right me-1"></i> Logout
                        </a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-sm btn-outline-primary">
                            <i class="bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container text-center mt-5">
    <h1>🎶 Welcome to Festava Live 2025 🎶</h1>
    <p class="lead">Join us for an unforgettable music experience!</p>

    <!-- Ticket Buttons -->
    <?php if ($isLoggedIn): ?>
        <a href="ticket.php" class="btn custom-btn d-lg-none ms-auto me-4 ticket-btn">Buy Ticket</a>
        <a href="ticket.php" class="btn custom-btn d-lg-block d-none ticket-btn">Buy Ticket</a>
    <?php else: ?>
        <a href="login.php" class="btn custom-btn d-lg-none ms-auto me-4 ticket-btn">Login to Buy Ticket</a>
        <a href="login.php" class="btn custom-btn d-lg-block d-none ticket-btn">Login to Buy Ticket</a>
    <?php endif; ?>
</div>

</body>
</html>
