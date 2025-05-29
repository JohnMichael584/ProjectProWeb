<?php
session_start();

// Simulate login for demonstration
// In real-world use, login would set these session values
// $_SESSION['username'] = 'JohnDoe';

$isLoggedIn = isset($_SESSION['username']);
$username = $isLoggedIn ? $_SESSION['username'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festava Live - Music Fest 2025</title>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;400;700&display=swap" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> <!-- Your custom styles if any -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Header -->
<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 d-flex flex-wrap">
                <p class="d-flex me-4 mb-0">
                    <i class="bi-person custom-icon me-2"></i>
                    <strong class="text-dark">
                        Welcome to Music Fest 2025
                        <?php if ($isLoggedIn): ?>
                            , <?php echo htmlspecialchars($username); ?>
                        <?php endif; ?>
                    </strong>
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
<main class="container text-center mt-5">
    <h1>Welcome to Festava Live 2025</h1>
    <p class="lead">Join us for an unforgettable music experience!</p>

    <!-- Ticket Button (visible only if logged in) -->
    <?php if ($isLoggedIn): ?>
        <a href="ticket.php" class="btn custom-btn d-lg-none ms-auto me-4 ticket-btn">Buy Ticket</a>
        <a href="ticket.php" class="btn custom-btn d-lg-block d-none ticket-btn">Buy Ticket</a>
    <?php else: ?>
        <p><a href="login.php" class="btn btn-primary mt-3">Login to Buy Tickets</a></p>
    <?php endif; ?>
</main>

<!-- Scripts -->
<script src="js/auth.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
