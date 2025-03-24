<!-- Add this code to your index.html, preferably near the start of your <body> tag -->
    <div id="welcomeBanner" class="welcome-banner" style="display: none;">
        <div class="welcome-content">
            <span id="closeWelcome" class="close-welcome">&times;</span>
            <h3>Welcome back, <span id="welcomeUsername">User</span>!</h3>
            <p>Ready for more amazing live music experiences?</p>
        </div>
    </div>
    
    <style>
        .welcome-banner {
            position: fixed;
            top: 80px;
            right: 20px;
            background: linear-gradient(45deg, #ff66cc, #9933ff);
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            animation: slideIn 0.5s ease-out;
            max-width: 300px;
        }
        
        .welcome-content {
            position: relative;
        }
        
        .close-welcome {
            position: absolute;
            top: -10px;
            right: -15px;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .close-welcome:hover {
            transform: scale(1.2);
        }
        
        .welcome-banner h3 {
            margin: 0 0 10px 0;
            font-weight: 700;
        }
        
        .welcome-banner p {
            margin: 0;
            font-weight: 300;
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
    
    <script>
        // Check if user is logged in when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const isLoggedIn = localStorage.getItem('festavaLoggedIn') === 'true';
            const username = localStorage.getItem('festavaUsername');
            
            if (isLoggedIn && username) {
                // Get user data to personalize welcome message
                const userData = JSON.parse(localStorage.getItem('festavaUserData')) || {};
                const userInfo = userData[username];
                
                // Display welcome banner with user's name if available
                const welcomeBanner = document.getElementById('welcomeBanner');
                const welcomeUsername = document.getElementById('welcomeUsername');
                
                if (userInfo && userInfo.fullName) {
                    // Use first name for personalized greeting
                    const firstName = userInfo.fullName.split(' ')[0];
                    welcomeUsername.textContent = firstName;
                } else {
                    welcomeUsername.textContent = username;
                }
                
                // Show the welcome banner
                welcomeBanner.style.display = 'block';
                
                // Hide banner after 5 seconds
                setTimeout(function() {
                    welcomeBanner.style.animation = 'slideIn 0.5s reverse';
                    setTimeout(function() {
                        welcomeBanner.style.display = 'none';
                    }, 500);
                }, 5000);
                
                // Allow user to close banner manually
                document.getElementById('closeWelcome').addEventListener('click', function() {
                    welcomeBanner.style.animation = 'slideIn 0.5s reverse';
                    setTimeout(function() {
                        welcomeBanner.style.display = 'none';
                    }, 500);
                });
            }
        });
    </script>