<?php
session_start();

// Example user login data, replace with your real auth logic
// Simulating a logged-in user (remove/comment this in production)
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = 'john_doe';
    $_SESSION['user'] = [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'contact' => '123-456-7890',
        'age' => 28,
        'gender' => 'Male',
        'address' => '123 Festival Lane',
        'registration_date' => '2023-04-15',
        'avatar' => 'images/john-avatar.jpg'  // Make sure this image exists or use default
    ];
}

$isLoggedIn = $_SESSION['logged_in'] ?? false;
$username = $_SESSION['username'] ?? 'Guest';
$userInfo = $_SESSION['user'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>User Profile Dropdown</title>
<!-- Bootstrap Icons CDN (for icons like bi bi-person) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
<style>
    /* Your CSS styles copied from your original snippet */
    .user-profile-container {
        position: relative;
        margin-left: 20px;
    }
    
    .user-profile-button {
        display: flex;
        align-items: center;
        cursor: pointer;
        padding: 5px 10px;
        border-radius: 20px;
        transition: all 0.3s;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-family: Arial, sans-serif;
    }
    
    .user-profile-button:hover {
        background: rgba(255, 255, 255, 0.2);
    }
    
    .user-profile-button img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 8px;
    }
    
    .user-profile-button span {
        margin-right: 5px;
        max-width: 100px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .profile-dropdown {
        position: absolute;
        top: 45px;
        right: 0;
        background: rgba(0, 0, 0, 0.85);
        backdrop-filter: blur(10px);
        min-width: 220px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        display: none;
        z-index: 1000;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        font-family: Arial, sans-serif;
    }
    
    .profile-header {
        padding: 15px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .profile-header img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }
    
    .profile-info h4 {
        margin: 0;
        font-size: 14px;
    }
    
    .profile-info p {
        margin: 0;
        font-size: 12px;
        opacity: 0.7;
    }
    
    .profile-menu {
        padding: 10px 0;
    }
    
    .profile-menu a {
        display: block;
        padding: 8px 15px;
        color: white;
        text-decoration: none;
        transition: all 0.2s;
    }
    
    .profile-menu a:hover {
        background: rgba(255, 102, 204, 0.3);
    }
    
    .profile-menu i {
        margin-right: 8px;
        width: 16px;
        text-align: center;
    }
    
    /* Profile Modal */
    .profile-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        z-index: 2000;
        overflow: auto;
    }
    
    .profile-modal-content {
        position: relative;
        background: rgba(15, 15, 15, 0.95);
        backdrop-filter: blur(10px);
        margin: 10% auto;
        padding: 25px;
        width: 80%;
        max-width: 600px;
        border-radius: 15px;
        animation: fadeIn 0.3s;
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        font-family: Arial, sans-serif;
    }
    
    .close-modal {
        position: absolute;
        top: 15px;
        right: 20px;
        font-size: 28px;
        cursor: pointer;
        transition: all 0.2s;
        color: rgba(255, 255, 255, 0.7);
    }
    
    .close-modal:hover {
        color: #ff66cc;
    }
    
    .profile-modal-content h2 {
        text-align: center;
        color: #ff66cc;
        margin-bottom: 25px;
    }
    
    .profile-details {
        display: flex;
        flex-direction: column;
    }
    
    .profile-picture-container {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .profile-picture-container img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(255, 102, 204, 0.5);
    }
    
    .profile-info-container {
        flex: 1;
    }
    
    .profile-info-row {
        display: flex;
        margin-bottom: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .info-label {
        width: 120px;
        font-weight: bold;
        color: rgba(255, 255, 255, 0.8);
    }
    
    .info-value {
        flex: 1;
        color: white;
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @media (min-width: 768px) {
        .profile-details {
            flex-direction: row;
        }
        
        .profile-picture-container {
            margin-right: 30px;
            margin-bottom: 0;
        }
    }
</style>
</head>
<body style="background:#121212; padding: 20px;">

<div class="user-profile-container">
    <div id="userProfileButton" class="user-profile-button" tabindex="0" aria-haspopup="true" aria-expanded="false" role="button" aria-label="User profile menu">
        <img id="profileIcon" src="<?= htmlspecialchars($userInfo['avatar'] ?? 'images/default-avatar.png') ?>" alt="Profile Picture">
        <span id="profileUsername"><?= htmlspecialchars($username) ?></span>
        <i class="bi bi-chevron-down"></i>
    </div>

    <div id="profileDropdown" class="profile-dropdown" role="menu" aria-hidden="true">
        <div class="profile-header">
            <img id="dropdownProfilePic" src="<?= htmlspecialchars($userInfo['avatar'] ?? 'images/default-avatar.png') ?>" alt="Profile Picture">
            <div class="profile-info">
                <h4 id="dropdownFullName"><?= htmlspecialchars($userInfo['full_name'] ?? 'Guest User') ?></h4>
                <p id="dropdownEmail"><?= htmlspecialchars($userInfo['email'] ?? 'guest@example.com') ?></p>
            </div>
        </div>
        <div class="profile-menu">
            <a href="#" id="viewProfileLink" role="menuitem"><i class="bi bi-person"></i> View Profile</a>
            <a href="#" role="menuitem"><i class="bi bi-ticket-perforated"></i> My Tickets</a>
            <a href="#" role="menuitem"><i class="bi bi-gear"></i> Settings</a>
            <a href="logout.php" role="menuitem"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>
</div>

<!-- Profile Modal -->
<div id="profileModal" class="profile-modal" role="dialog" aria-modal="true" aria-labelledby="modalTitle" tabindex="-1">
    <div class="profile-modal-content">
        <span id="closeProfileModal" class="close-modal" role="button" aria-label="Close profile modal">&times;</span>
        <h2 id="modalTitle">My Profile</h2>

        <div class="profile-details">
            <div class="profile-picture-container">
                <img id="modalProfilePic" src="<?= htmlspecialchars($userInfo['avatar'] ?? 'images/default-avatar.png') ?>" alt="Profile Picture">
            </div>

            <div class="profile-info-container">
                <div class="profile-info-row"><div class="info-label">Full Name:</div><div class="info-value"><?= htmlspecialchars($userInfo['full_name'] ?? 'Not Available') ?></div></div>
                <div class="profile-info-row"><div class="info-label">Username:</div><div class="info-value"><?= htmlspecialchars($username) ?></div></div>
                <div class="profile-info-row"><div class="info-label">Email:</div><div class="info-value"><?= htmlspecialchars($userInfo['email'] ?? 'Not Available') ?></div></div>
                <div class="profile-info-row"><div class="info-label">Phone:</div><div class="info-value"><?= htmlspecialchars($userInfo['contact'] ?? 'Not Available') ?></div></div>
                <div class="profile-info-row"><div class="info-label">Age:</div><div class="info-value"><?= htmlspecialchars($userInfo['age'] ?? 'Not Available') ?></div></div>
                <div class="profile-info-row"><div class="info-label">Gender:</div><div class="info-value"><?= htmlspecialchars($userInfo['gender'] ?? 'Not Available') ?></div></div>
                <div class="profile-info-row"><div class="info-label">Address:</div><div class="info-value"><?= htmlspecialchars($userInfo['address'] ?? 'Not Available') ?></div></div>
                <div class="profile-info-row"><div class="info-label">Member Since:</div><div class="info-value">
                    <?= isset($userInfo['registration_date']) ? date('F j, Y', strtotime($userInfo['registration_date'])) : 'Not Available' ?>
                </div></div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const profileButton = document.getElementById('userProfileButton');
    const profileDropdown = document.getElementById('profileDropdown');
    const profileModal = document.getElementById('profileModal');
    const closeProfileModal = document.getElementById('closeProfileModal');
    const viewProfileLink = document.getElementById('viewProfileLink');

    // Toggle dropdown
    profileButton.addEventListener('click', function (e) {
        e.stopPropagation();
        if (profileDropdown.style.display === 'block') {
            profileDropdown.style.display = 'none';
            profileButton.setAttribute('aria-expanded', 'false');
            profileDropdown.setAttribute('aria-hidden', 'true');
        } else {
            profileDropdown.style.display = 'block';
            profileButton.setAttribute('aria-expanded', 'true');
            profileDropdown.setAttribute('aria-hidden', 'false');
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!profileButton.contains(e.target)) {
            profileDropdown.style.display = 'none';
            profileButton.setAttribute('aria-expanded', 'false');
            profileDropdown.setAttribute('aria-hidden', 'true');
        }
    });

    // Open modal
    viewProfileLink.addEventListener('click', function (e) {
        e.preventDefault();
        profileModal.style.display = 'block';
        profileModal.focus();
    });

    // Close modal
    closeProfileModal.addEventListener('click', function () {
        profileModal.style.display = 'none';
    });

    // Close modal when clicking outside content
    window.addEventListener('click', function (e) {
        if (e.target === profileModal) {
            profileModal.style.display = 'none';
        }
    });

    // Accessibility: close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && profileModal.style.display === 'block') {
            profileModal.style.display = 'none';
        }
    });
});
</script>

</body>
</html>
