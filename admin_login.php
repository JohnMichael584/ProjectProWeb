<?php
$host = 'festava_live_2025.mysql.database.azure.com'; // Use your DB host
// For example, 'localhost' or '
$db   = 'festava';
$user = 'root';       // Use your DB username
$pass = '';           // Use your DB password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() == 1) {
        // Login success
        session_start();
        $_SESSION['user'] = $username;
        header("Location: dashboard.php"); // Redirect to your dashboard
        exit();
    } else {
        echo "Invalid credentials.";
    }
}
?>
