<?php
// Function to check if a cookie exists
function checkCookie($cookieName) {
    return isset($_COOKIE[$cookieName]);
}

// Function to set a cookie with a predefined value
function setCookieWithValue($cookieName, $cookieValue, $expiryTime) {
    setcookie($cookieName, $cookieValue, $expiryTime, '/');
}

// Name of the cookie
$cookieName = "custom_cookie";

// Value to set for the cookie
$cookieValue = "example_value";

// Expiry time for the cookie (in seconds)
$expiryTime = time() + (86400 * 30); // 30 days from now

// Check if the cookie exists
if (!checkCookie($cookieName)) {
    // If the cookie doesn't exist, set it with the predefined value
    setCookieWithValue($cookieName, $cookieValue, $expiryTime);
    echo "Cookie set successfully!";
} else {
    echo "Cookie already exists!";
}
?>
