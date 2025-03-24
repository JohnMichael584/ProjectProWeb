// auth.js - Handles authentication state across Festava Live site

// Check login state on page load
function checkLoginState() {
    const isLoggedIn = localStorage.getItem('festavaLoggedIn') === 'true';
    const username = localStorage.getItem('festavaUsername');
    
    // Elements to control based on login state
    const logoutBtn = document.querySelector('.btn-outline-danger');
    const welcomeText = document.querySelector('.text-dark');
    
    if (isLoggedIn && username) {
        // User is logged in
        if (welcomeText) {
            welcomeText.textContent = `Welcome ${username} to Music Fest 2025`;
        }
        
        if (logoutBtn) {
            logoutBtn.style.display = 'inline-block';
        }
        
        // If we're on a protected page, allow access
    } else {
        // User is not logged in
        if (logoutBtn) {
            logoutBtn.style.display = 'none';
        }
        
        // If we're on a protected page, redirect to login
        const currentPage = window.location.pathname.split('/').pop();
        const protectedPages = ['ticket.html']; // Add other protected pages here
        
        if (protectedPages.includes(currentPage)) {
            window.location.href = 'login.html';
        }
    }
}

// Handle logout
function handleLogout() {
    localStorage.removeItem('festavaLoggedIn');
    localStorage.removeItem('festavaUsername');
    window.location.href = 'login.html';
}

// Set up logout button
function setupLogoutButton() {
    const logoutBtn = document.querySelector('.btn-outline-danger');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            handleLogout();
        });
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    checkLoginState();
    setupLogoutButton();
});