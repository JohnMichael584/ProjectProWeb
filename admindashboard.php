<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Festava Live 2025 - Admin Panel</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Bootstrap Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
        
        <style>
            :root {
                --primary-color: #ff6b35;
                --secondary-color: #f7931e;
                --accent-color: #c73e1d;
                --dark-color: #0a0a0a;
                --light-color: #ffffff;
                --purple-color: #6c5ce7;
                --pink-color: #fd79a8;
                --cyan-color: #00cec9;
                --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                --glass-bg: rgba(255, 255, 255, 0.1);
                --glass-border: rgba(255, 255, 255, 0.2);
                --success-color: #00b894;
                --warning-color: #fdcb6e;
                --danger-color: #e17055;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Outfit', sans-serif;
                background: var(--dark-color);
                color: var(--light-color);
                overflow-x: hidden;
            }

            /* Glass morphism utilities */
            .glass {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
            }

            /* Login Screen */
            .login-container {
                min-height: 100vh;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .login-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: 
                    radial-gradient(circle at 20% 50%, rgba(255, 107, 53, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(108, 92, 231, 0.3) 0%, transparent 50%);
            }

            .login-form {
                background: var(--glass-bg);
                backdrop-filter: blur(30px);
                border: 1px solid var(--glass-border);
                border-radius: 25px;
                padding: 3rem;
                width: 100%;
                max-width: 450px;
                z-index: 2;
                position: relative;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            }

            .login-logo {
                text-align: center;
                margin-bottom: 2rem;
            }

            .login-logo h1 {
                font-family: 'Space Grotesk', sans-serif;
                font-size: 2.5rem;
                font-weight: 900;
                background: var(--gradient-2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 0.5rem;
            }

            .form-group {
                margin-bottom: 1.5rem;
            }

            .form-label {
                display: block;
                margin-bottom: 0.5rem;
                font-weight: 500;
                color: var(--light-color);
            }

            .form-control {
                width: 100%;
                padding: 1rem 1.5rem;
                background: rgba(255, 255, 255, 0.1);
                border: 1px solid var(--glass-border);
                border-radius: 15px;
                color: var(--light-color);
                font-size: 1rem;
                transition: all 0.3s ease;
            }

            .form-control:focus {
                outline: none;
                background: rgba(255, 255, 255, 0.15);
                border-color: var(--primary-color);
                box-shadow: 0 0 20px rgba(255, 107, 53, 0.3);
            }

            .form-control::placeholder {
                color: rgba(255, 255, 255, 0.6);
            }

            .btn-login {
                width: 100%;
                padding: 1rem;
                background: var(--gradient-2);
                border: none;
                border-radius: 15px;
                color: var(--light-color);
                font-size: 1.1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                margin-top: 1rem;
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 30px rgba(255, 107, 53, 0.4);
            }

            /* Admin Dashboard */
            .admin-container {
                display: none;
                min-height: 100vh;
            }

            .sidebar {
                width: 280px;
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border-right: 1px solid var(--glass-border);
                position: fixed;
                height: 100vh;
                padding: 2rem 0;
                overflow-y: auto;
            }

            .sidebar-header {
                text-align: center;
                padding: 0 2rem 2rem;
                border-bottom: 1px solid var(--glass-border);
                margin-bottom: 2rem;
            }

            .sidebar-header h2 {
                font-family: 'Space Grotesk', sans-serif;
                font-size: 1.5rem;
                background: var(--gradient-2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .nav-menu {
                list-style: none;
            }

            .nav-item {
                margin-bottom: 0.5rem;
            }

            .nav-link {
                display: flex;
                align-items: center;
                padding: 1rem 2rem;
                color: var(--light-color);
                text-decoration: none;
                transition: all 0.3s ease;
                border-left: 3px solid transparent;
            }

            .nav-link:hover,
            .nav-link.active {
                background: rgba(255, 107, 53, 0.1);
                border-left-color: var(--primary-color);
                color: var(--primary-color);
            }

            .nav-link i {
                margin-right: 0.75rem;
                font-size: 1.2rem;
            }

            .main-content {
                margin-left: 280px;
                padding: 2rem;
                min-height: 100vh;
            }

            .top-bar {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 15px;
                padding: 1rem 2rem;
                margin-bottom: 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .page-title {
                font-size: 1.5rem;
                font-weight: 600;
                margin: 0;
            }

            .user-info {
                display: flex;
                align-items: center;
                gap: 1rem;
            }

            .logout-btn {
                background: var(--danger-color);
                border: none;
                color: var(--light-color);
                padding: 0.5rem 1rem;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .logout-btn:hover {
                background: #d63031;
                transform: translateY(-1px);
            }

            /* Dashboard Cards */
            .dashboard-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
                margin-bottom: 2rem;
            }

            .stat-card {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                padding: 2rem;
                text-align: center;
                transition: all 0.3s ease;
            }

            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            }

            .stat-icon {
                font-size: 3rem;
                margin-bottom: 1rem;
                background: var(--gradient-2);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .stat-number {
                font-size: 2.5rem;
                font-weight: 900;
                margin-bottom: 0.5rem;
                color: var(--primary-color);
            }

            .stat-label {
                opacity: 0.8;
                font-size: 1rem;
            }

            /* Content Sections */
            .content-section {
                display: none;
            }

            .content-section.active {
                display: block;
            }

            .content-card {
                background: var(--glass-bg);
                backdrop-filter: blur(20px);
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .section-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 2rem;
            }

            .section-title {
                font-size: 1.8rem;
                font-weight: 600;
                margin: 0;
            }

            .btn-primary {
                background: var(--gradient-2);
                border: none;
                color: var(--light-color);
                padding: 0.75rem 1.5rem;
                border-radius: 10px;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
                color: var(--light-color);
            }

            /* Tables */
            .admin-table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 1rem;
            }

            .admin-table th,
            .admin-table td {
                padding: 1rem;
                text-align: left;
                border-bottom: 1px solid var(--glass-border);
            }

            .admin-table th {
                background: rgba(255, 107, 53, 0.1);
                color: var(--primary-color);
                font-weight: 600;
            }

            .admin-table tr:hover {
                background: rgba(255, 255, 255, 0.02);
            }

            .action-btns {
                display: flex;
                gap: 0.5rem;
            }

            .btn-edit {
                background: var(--warning-color);
                border: none;
                color: var(--light-color);
                padding: 0.5rem 1rem;
                border-radius: 5px;
                cursor: pointer;
                font-size: 0.9rem;
            }

            .btn-delete {
                background: var(--danger-color);
                border: none;
                color: var(--light-color);
                padding: 0.5rem 1rem;
                border-radius: 5px;
                cursor: pointer;
                font-size: 0.9rem;
            }

            /* Forms */
            .form-row {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1rem;
                margin-bottom: 1rem;
            }

            .textarea-control {
                min-height: 120px;
                resize: vertical;
            }

            /* Modal */
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.8);
                z-index: 1000;
                align-items: center;
                justify-content: center;
            }

            .modal.active {
                display: flex;
            }

            .modal-content {
                background: var(--glass-bg);
                backdrop-filter: blur(30px);
                border: 1px solid var(--glass-border);
                border-radius: 20px;
                padding: 2rem;
                width: 90%;
                max-width: 500px;
                max-height: 80vh;
                overflow-y: auto;
            }

            .modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1.5rem;
            }

            .modal-title {
                font-size: 1.5rem;
                font-weight: 600;
                margin: 0;
            }

            .close-btn {
                background: none;
                border: none;
                color: var(--light-color);
                font-size: 1.5rem;
                cursor: pointer;
                padding: 0;
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 50%;
                transition: all 0.3s ease;
            }

            .close-btn:hover {
                background: rgba(255, 255, 255, 0.1);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .sidebar {
                    transform: translateX(-100%);
                    transition: transform 0.3s ease;
                }

                .sidebar.mobile-open {
                    transform: translateX(0);
                }

                .main-content {
                    margin-left: 0;
                    padding: 1rem;
                }

                .dashboard-grid {
                    grid-template-columns: 1fr;
                }

                .top-bar {
                    flex-direction: column;
                    gap: 1rem;
                    text-align: center;
                }
            }

            /* Animation */
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .fade-in {
                animation: fadeIn 0.5s ease;
            }
        </style>
    </head>

 <!-- Login Screen -->
<div class="login-container" id="loginScreen">
    <div class="login-form">
        <div class="login-logo">
            <h1>Festava Admin</h1>
            <p style="opacity: 0.8;">Access your dashboard</p>
        </div>
        
        <!-- Login Form -->
        <form id="loginForm">
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" required>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="bi-box-arrow-in-right me-2"></i>Login to Dashboard
            </button>
        </form>
        
      <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
    <p style="opacity: 0.7; font-size: 0.9rem;">
        Demo Credentials:<br>
        <a href="#" id="demoLogin" style="text-decoration: none; color: inherit;">
            Username: <strong>admin</strong><br>
            Password: <strong>festava2025</strong>
        </a>
    </p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const demoLogin = document.getElementById('demoLogin');
    
    demoLogin.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Auto-fill the login form
        document.getElementById('username').value = 'admin';
        document.getElementById('password').value = 'festava2025';
        
        // Submit the form programmatically (assuming your login form has proper submit handler)
        document.getElementById('loginForm').submit();
        
        // Alternatively, if you're handling login via JavaScript:
        // simulateLogin('admin', 'festava2025');
    });
    
    // If you have a login function already:
    function simulateLogin(username, password) {
        // Your existing login logic here
        console.log(`Logging in with ${username}/${password}`);
        
        // After successful login, redirect to dashboard
        window.location.href = '/admin/dashboard.html';
    }
});
</script>

        <!-- Signup Option Below Credentials -->
        <div class="auth-switch" style="margin-top: 1.5rem; text-align: center;">
            <p style="opacity: 0.8;">Need an account? <a href="#" id="showSignup">Create one</a></p>
        </div>
        
        <!-- Hidden Signup Form -->
        <form id="signupForm" style="display: none; margin-top: 1.5rem;">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter full name" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="newUsername" placeholder="Choose username" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="newPassword" placeholder="Create password" required>
            </div>
            
            <button type="submit" class="btn-login" style="margin-top: 1.5rem;">
                <i class="bi-person-plus me-2"></i>Register Account
            </button>
            
            <div class="auth-switch" style="text-align: center; margin-top: 1rem;">
                <p style="opacity: 0.8;">Already registered? <a href="#" id="showLogin">Log in</a></p>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const showSignup = document.getElementById('showSignup');
    const showLogin = document.getElementById('showLogin');

    // Show signup form
    showSignup.addEventListener('click', function(e) {
        e.preventDefault();
        loginForm.style.display = 'none';
        document.querySelector('.auth-switch').style.display = 'none';
        signupForm.style.display = 'block';
    });

    // Show login form
    showLogin.addEventListener('click', function(e) {
        e.preventDefault();
        signupForm.style.display = 'none';
        loginForm.style.display = 'block';
        document.querySelector('.auth-switch').style.display = 'block';
    });
});
</script><div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
    <p style="opacity: 0.7; font-size: 0.9rem;">
        Demo Credentials:<br>
        <a href="#" id="demoLogin" style="text-decoration: none; color: inherit;">
            Username: <strong>admin</strong><br>
            Password: <strong>festava2025</strong>
        </a>
    </p>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const demoLogin = document.getElementById('demoLogin');
    
    demoLogin.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Auto-fill the login form
        document.getElementById('username').value = 'admin';
        document.getElementById('password').value = 'festava2025';
        
        // Submit the form programmatically (assuming your login form has proper submit handler)
        document.getElementById('loginForm').submit();
        
        // Alternatively, if you're handling login via JavaScript:
        // simulateLogin('admin', 'festava2025');
    });
    
    // If you have a login function already:
    function simulateLogin(username, password) {
        // Your existing login logic here
        console.log(`Logging in with ${username}/${password}`);
        
        // After successful login, redirect to dashboard
        window.location.href = '/admin/dashboard.html';
    }
});
</script>
        
        <!-- Signup Form (Initially Hidden) -->
        <form id="signupForm" style="display: none;">
            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullname" placeholder="Enter full name" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" id="newUsername" placeholder="Choose username" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="newPassword" placeholder="Create password" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" required>
            </div>
            
            <button type="submit" class="btn-login">
                <i class="bi-person-plus me-2"></i>Create Account
            </button>
        </form>
        
        <div class="auth-switch" id="backToLogin" style="display: none;">
            <p>Already have an account? <a href="#">Log in</a></p>
        </div>
        
        <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
            <p style="opacity: 0.7; font-size: 0.9rem;">
                Demo Credentials:<br>
                Username: <strong>admin</strong><br>
                Password: <strong>festava2025</strong>
            </p>
        </div>
    </div>
</div>

<!-- Add this JavaScript to handle form switching -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const signupForm = document.getElementById('signupForm');
    const showSignup = document.getElementById('showSignup');
    const backToLogin = document.getElementById('backToLogin');
    
    showSignup.addEventListener('click', function(e) {
        e.preventDefault();
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
        showSignup.parentElement.style.display = 'none';
        backToLogin.style.display = 'block';
    });
    
    backToLogin.querySelector('a').addEventListener('click', function(e) {
        e.preventDefault();
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
        showSignup.parentElement.style.display = 'block';
        backToLogin.style.display = 'none';
    });
});
</script>

        <!-- Admin Dashboard -->
        <div class="admin-container" id="adminDashboard">
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-header">
                    <h2>Festava Admin</h2>
                    <p style="opacity: 0.7; font-size: 0.9rem;">Music Festival Manager</p>
                </div>
                
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" data-section="dashboard">
                            <i class="bi-speedometer2"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="artists">
                            <i class="bi-person-badge"></i>Artists
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="schedule">
                            <i class="bi-calendar-event"></i>Schedule
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="tickets">
                            <i class="bi-ticket"></i>Tickets
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="attendees">
                            <i class="bi-people"></i>Attendees
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" data-section="settings">
                            <i class="bi-gear"></i>Settings
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Top Bar -->
                <div class="top-bar">
                    <h1 class="page-title" id="pageTitle">Dashboard Overview</h1>
                    <div class="user-info">
                        <span>Welcome, Admin</span>
                        <button class="logout-btn" onclick="logout()">
                            <i class="bi-box-arrow-right me-1"></i>Logout
                        </button>
                    </div>
                </div>

                <!-- Dashboard Section -->
                <div class="content-section active" id="dashboardSection">
                    <div class="dashboard-grid fade-in">
                        <div class="stat-card">
                            <i class="bi-person-badge stat-icon"></i>
                            <div class="stat-number" id="totalArtists">12</div>
                            <div class="stat-label">Total Artists</div>
                        </div>
                        
                        <div class="stat-card">
                            <i class="bi-ticket stat-icon"></i>
                            <div class="stat-number" id="ticketsSold">2,847</div>
                            <div class="stat-label">Tickets Sold</div>
                        </div>
                        
                        <div class="stat-card">
                            <i class="bi-people stat-icon"></i>
                            <div class="stat-number" id="totalAttendees">3,250</div>
                            <div class="stat-label">Expected Attendees</div>
                        </div>
                        
                        <div class="stat-card">
                            <i class="bi-currency-dollar stat-icon"></i>
                            <div class="stat-number" id="totalRevenue">₱850K</div>
                            <div class="stat-label">Total Revenue</div>
                        </div>
                    </div>
                    
                    <div class="content-card fade-in">
                        <h3>Recent Activity</h3>
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Time</th>
                                    <th>Activity</th>
                                    <th>User</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2 hours ago</td>
                                    <td>New artist registration</td>
                                    <td>DJ Tropicana</td>
                                    <td><span style="color: var(--success-color);">✓ Approved</span></td>
                                </tr>
                                <tr>
                                    <td>4 hours ago</td>
                                    <td>Ticket purchase</td>
                                    <td>VIP Package x5</td>
                                    <td><span style="color: var(--success-color);">✓ Completed</span></td>
                                </tr>
                                <tr>
                                    <td>6 hours ago</td>
                                    <td>Schedule update</td>
                                    <td>Main Stage</td>
                                    <td><span style="color: var(--warning-color);">⚠ Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Artists Section -->
                <div class="content-section" id="artistsSection">
                    <div class="content-card fade-in">
                        <div class="section-header">
                            <h2 class="section-title">Manage Artists</h2>
                            <button class="btn-primary" onclick="openModal('artistModal')">
                                <i class="bi-plus me-1"></i>Add New Artist
                            </button>
                        </div>
                        
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Genre</th>
                                    <th>Performance Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="artistsTable">
                                <tr>
                                    <td>Pahugjaw Artist</td>
                                    <td>Pop, R&B, Ballad</td>
                                    <td>Dec 10, 2025</td>
                                    <td><span style="color: var(--success-color);">✓ Confirmed</span></td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>SBIT</td>
                                    <td>P-POP</td>
                                    <td>Dec 11, 2025</td>
                                    <td><span style="color: var(--success-color);">✓ Confirmed</span></td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Schedule Section -->
                <div class="content-section" id="scheduleSection">
                    <div class="content-card fade-in">
                        <div class="section-header">
                            <h2 class="section-title">Event Schedule</h2>
                            <button class="btn-primary" onclick="openModal('scheduleModal')">
                                <i class="bi-plus me-1"></i>Add Event
                            </button>
                        </div>
                        
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Event</th>
                                    <th>Stage</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Dec 10, 2025</td>
                                    <td>19:00 - 20:30</td>
                                    <td>Pahugjaw Artist Performance</td>
                                    <td>Main Stage</td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Dec 11, 2025</td>
                                    <td>20:00 - 21:30</td>
                                    <td>SBIT Live Performance</td>
                                    <td>Main Stage</td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tickets Section -->
                <div class="content-section" id="ticketsSection">
                    <div class="content-card fade-in">
                        <div class="section-header">
                            <h2 class="section-title">Ticket Management</h2>
                            <button class="btn-primary" onclick="openModal('ticketModal')">
                                <i class="bi-plus me-1"></i>Create Ticket Type
                            </button>
                        </div>
                        
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Ticket Type</th>
                                    <th>Price</th>
                                    <th>Available</th>
                                    <th>Sold</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>General Admission</td>
                                    <td>₱2,500</td>
                                    <td>1,500</td>
                                    <td>1,200</td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>VIP Package</td>
                                    <td>₱5,000</td>
                                    <td>300</td>
                                    <td>247</td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Attendees Section -->
                <div class="content-section" id="attendeesSection">
                    <div class="content-card fade-in">
                        <div class="section-header">
                            <h2 class="section-title">Attendee Management</h2>
                            <div>
                                <button class="btn-primary" style="margin-right: 1rem;" onclick="exportAttendees()">
                                    <i class="bi-download me-1"></i>Export List
                                </button>
                                <button class="btn-primary" onclick="openModal('attendeeModal')">
                                    <i class="bi-plus me-1"></i>Add Attendee
                                </button>
                            </div>
                        </div>
                        
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Ticket Type</th>
                                    <th>Check-in Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Juan dela Cruz</td>
                                    <td>juan@email.com</td>
                                    <td>VIP Package</td>
                                    <td><span style="color: var(--success-color);">✓ Checked In</span></td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Maria Santos</td>
                                    <td>maria@email.com</td>
                                    <td>General Admission</td>
                                    <td><span style="color: var(--warning-color);">⚠ Pending</span></td>
                                    <td class="action-btns">
                                        <button class="btn-edit">Edit</button>
                                        <button class="btn-delete">Delete</button>
                                    </td>                                                           
                                </tr>           
                            </tbody>
                        </table>            
                    </div>      
                </div>
                <!-- Settings Section -->   

                <div class="content-section" id="settingsSection">
                    <div class="content-card fade-in">
                        <div class="section-header">
                            <h2 class="section-title">Settings</h2>
                        </div>
                        
                        <form id="settingsForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label class="form-label">Site Title</label>
                                    <input type="text" class="form-control" id="siteTitle" placeholder="Enter site title" required>                                                                                                         
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Admin Email</label>
                                    <input type="email" class="form-control" id="adminEmail" placeholder="Enter admin email" required>  
                                </div>      
                                <div class="form-group">
                                    <label class="form-label">Support Email</label>
                                    <input type="email" class="form-control" id="supportEmail" placeholder="Enter support email" required>  
                                </div>
                                <div class="form-group      ">
                                    <label class="form-label                    
                                                            ">Contact Number</label>
                                    <input type="tel" class="form-control" id="contactNumber" placeholder="Enter contact number" required>  
                                </div>
                            </div>
                            
                            <button type="submit" class="btn-login">
                                <i class="bi-save me-2"></i>Save Settings
                            </button>       
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <!-- Modals -->

        <div class="modal" id="artistModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add New Artist</h2>
                    <button class="close-btn" onclick="closeModal('artistModal')">&times;</button>
                </div>
                <form id="artistForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label        ">Artist Name</label>
                            <input type="text" class="form-control" id="artistName" placeholder="Enter artist name" required>               
                        </div>  
                        <div class="form-group">
                            <label class="form-label                        ">Genre</label>
                            <input type="text" class="form-control" id="artistGenre" placeholder="Enter artist genre" required>     
                        </div>  
                        <div class="form-group
                            <label class="form-label">Performance Date</label>
                            <input type="date" class="form-control" id="performanceDate" required>              
                        </div>
                        <div class="form-group
                            <label class="form-label">Status</label>
                            <select class="form-control" id="artistStatus" required>
                                <option value="confirmed">Confirmed</option>
                                <option value="pending">Pending</option>
                                <option value="cancelled">Cancelled</option>            
                            </select>
                        </div>  
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="bi-plus me-2"></i>Add Artist
                    </button>   
                </form>
            </div>      
        </div>  
        <div class="modal" id="scheduleModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add New Event</h2>
                    <button class="close-btn" onclick="closeModal('scheduleModal')">&times;</button>
                </div>
                <form id="scheduleForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label    ">Event Date</label>
                            <input type="date" class="form-control" id="eventDate" required>        
                        </div>
                        <div class="form-group      
                            <label class="form-label">Event Time</label>        
                            <input type="time" class="form-control" id="eventTime" required>        
                        </div>
                        <div class="form-group      
                            <label class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" placeholder="Enter event name" required>     
                        </div>  
                        <div class="form-group  
                            <label class="form-label    ">Stage</label>
                            <input type="text" class="form-control" id="eventStage" placeholder="Enter stage name" required>            
                        </div>          
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="bi-plus me-2"></i>Add Event
                    </button>       
                </form> 
            </div>  
        </div>
        <div class="modal" id="ticketModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Create Ticket Type</h2>
                    <button class="close-btn" onclick="closeModal('ticketModal')">&times;</button>
                </div>
                <form id="ticketForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label    ">Ticket Type</label>
                            <input type="text" class="form-control" id="ticketType" placeholder="Enter ticket type" required>       
                        </div>          
                        <div class="form-group      
                            <label class="form-label">Ticket Price</label>                                   
                           <input type="number" class="form-control" id="ticketPrice" placeholder="Enter ticket price" required>       
                        </div>          
                        <div class="form-group          
                            <label class="form-label">Available Tickets</label>
                            <input type="number" class="form-control" id="availableTickets" placeholder="Enter available tickets" required>                 
                        </div>      
                        <div class="form-group      
                            <label class="form-label">Sold Tickets</label>
                            <input type="number" class="form-control" id="soldTickets" placeholder="Enter sold tickets" required>   
                        </div>
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="bi-plus me-2"></i>Create Ticket
                    </button>           
                </form>
            </div>              
        </div>
        <div class="modal" id="attendeeModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Add New Attendee</h2>
                    <button class="close-btn" onclick="closeModal('attendeeModal')">&times;</button>
                </div>
                <form id="attendeeForm">
                    <div class="form-row">
                        <div class="form-group  
                            <label class="form-label    ">Attendee Name</label>
                            <input type="text" class="form-control" id="attendeeName" placeholder="Enter attendee name" required>       
                        </div>  
                        <div class="form-group
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" id="attendeeEmail" placeholder="Enter attendee email" required>        
                        </div>
                        <div class="form-group
                            <label class="form-label">Ticket Type</label>   
                            <select class="form-control" id="attendeeTicketType" required>
                                <option value="general">General Admission</option>
                                <option value="vip">VIP Package</option>
                                <option value="early_bird">Early Bird</option>
                            </select>
                        </div>      
                        <div class="form-group  
                            <label class="form-label">Check-in Status</label>
                            <select class="form-control" id="attendeeStatus" required>
                                <option value="checked_in">Checked In</option>
                                <option value="pending">Pending</option>
                                <option value="cancelled">Cancelled</option>    
                            </select>   
                        </div>  
                    </div>
                    <button type="submit" class="btn-primary">
                        <i class="bi-plus me-2"></i>Add Attendee
                    </button>   
                </form>
            </div>
        </div>

        <script src="js/bootstrap.bundle.min.js"></script>      
        <script>
            // Show login screen initially
            document.getElementById('loginScreen').style.display = 'block';
            document.getElementById('adminDashboard').style.display = 'none';

            // Handle login form submission
            document.getElementById('loginForm').addEventListener('submit', function(event) {
                event.preventDefault();
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                // Simple validation (in a real app, you would check against a database)
                if (username === 'admin' && password === 'festava2025') {
                    document.getElementById('loginScreen').style.display = 'none';
                    document.getElementById('adminDashboard').style.display = 'block';
                } else {
                    alert('Invalid credentials. Please try again.');
                }
            });

            // Logout function
            function logout() {
                document.getElementById('adminDashboard').style.display = 'none';
                document.getElementById('loginScreen').style.display = 'block';
            }

            // Open modal function
            function openModal(modalId) {
                document.getElementById(modalId).classList.add('active');
            }

            // Close modal function
            function closeModal(modalId) {
                document.getElementById(modalId).classList.remove('active');
            }       
            // Handle section navigation    
            document.querySelectorAll('.nav-link').forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const section = this.getAttribute('data-section');

                    // Hide all sections
                    document.querySelectorAll('.content-section').forEach(sec => {
                        sec.classList.remove('active');
                    });

                    // Show the selected section
                    document.getElementById(section + 'Section').classList.add('active');

                    // Update page title
                    document.getElementById('pageTitle').textContent = this.textContent;
                });
            });
            // Handle form submissions for modals
            document.getElementById('artistForm').addEventListener('submit', function(event) {
                event.preventDefault();
                // Handle artist form submission logic here
                closeModal('artistModal');
            });
            document.getElementById('scheduleForm').addEventListener('submit', function(event) {
                event.preventDefault();
                // Handle schedule form submission logic here
                closeModal('scheduleModal');
            });
            document.getElementById('ticketForm').addEventListener('submit', function(event) {
                event.preventDefault();
                // Handle ticket form submission logic here
                closeModal('ticketModal');
            });                 
            document.getElementById('attendeeForm').addEventListener('submit', function(event) {
                event.preventDefault();
                // Handle attendee form submission logic here
                closeModal('attendeeModal');
            });     
            // Export attendees function
            function exportAttendees() {
                // Logic to export attendees list (e.g., download as CSV)
                alert('Exporting attendees list...');
            }       
        </script>           
    </body> 
</html> 
<?php   
// End of PHP code
