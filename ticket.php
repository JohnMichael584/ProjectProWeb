<?php
session_start();

// Redirect unauthenticated users
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Festival Tickets</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert CDN -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-container h2 {
            text-align: center;
            color: #F8CB2E;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group select {
            background-color: #f7f7f7;
        }

        .ticket-option {
            margin-bottom: 10px;
        }

        .ticket-option input {
            margin-right: 10px;
        }

        .total-price {
            font-weight: bold;
            color: #F8CB2E;
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
        }

        .btn-submit {
            background-color: #F8CB2E;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #ff3385;
        }

        .error {
            color: red;
            font-size: 14px;
            display: none;
        }

        .btn-back {
            background-color: #ccc;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #999;
        }
    </style>
</head>

<body>

<div class="form-container">
    <h2>Buy Your Festival Tickets</h2>

    <form id="ticketForm" method="post">
        <div class="form-group">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required>
            <div class="error" id="nameError">Please enter your full name.</div>
        </div>

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>
            <div class="error" id="emailError">Please enter a valid email address.</div>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>
            <div class="error" id="phoneError">Please enter your phone number.</div>
        </div>

        <div class="form-group">
            <h3>Select Ticket Type:</h3>
            <div class="ticket-option">
                <input type="radio" id="early_bird" name="ticket_type" value="early_bird" required>
                <label for="early_bird">Early Bird Ticket - $120</label>
            </div>
            <div class="ticket-option">
                <input type="radio" id="standard" name="ticket_type" value="standard">
                <label for="standard">Standard Ticket - $240</label>
            </div>
            <div class="ticket-option">
                <input type="radio" id="vip" name="ticket_type" value="vip">
                <label for="vip">VIP Ticket - $450</label>
            </div>
            <div class="error" id="ticketError">Please select a ticket type.</div>
        </div>

        <div class="form-group">
            <label for="ticket_quantity">Number of Tickets:</label>
            <input type="number" id="ticket_quantity" name="ticket_quantity" min="1" value="1" required>
        </div>

        <div class="form-group">
            <label for="event_day">Preferred Day:</label>
            <select id="event_day" name="event_day" required>
                <option value="">Select day</option>
                <option value="day1">Day 1 - Friday, Dec 10</option>
                <option value="day2">Day 2 - Saturday, Dec 11</option>
                <option value="day3">Day 3 - Sunday, Dec 12</option>
                <option value="all_days">All 3 Days</option>
            </select>
        </div>

        <div class="total-price" id="totalPrice">Total: $0</div>

        <button type="submit" class="btn-submit">Proceed to Payment</button>
    </form>

    <button class="btn-back" onclick="window.location.href='index.php';">Back to Website</button>
</div>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['full_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $ticketType = $_POST['ticket_type'];
    $quantity = intval($_POST['ticket_quantity']);
    $eventDay = $_POST['event_day'];

    $prices = ['early_bird' => 120, 'standard' => 240, 'vip' => 450];
    $total = $prices[$ticketType] * $quantity;

    echo "<script>
        Swal.fire({
            title: 'Payment Successful!',
            text: 'You have successfully paid $$total. Enjoy the festival!',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>";
} ?>

<script>
    document.getElementById("ticket_quantity").addEventListener("input", updateTotal);
    document.querySelectorAll('input[name="ticket_type"]').forEach(radio => {
        radio.addEventListener("change", updateTotal);
    });

    function updateTotal() {
        const ticketType = document.querySelector('input[name="ticket_type"]:checked');
        const quantity = document.getElementById("ticket_quantity").value;
        if (ticketType) {
            const prices = {
                early_bird: 120,
                standard: 240,
                vip: 450
            };
            const price = prices[ticketType.value];
            const total = price * quantity;
            document.getElementById("totalPrice").innerText = `Total: $${total}`;
        }
    }
</script>
</body>

</html>
<?php
// End of PHP code