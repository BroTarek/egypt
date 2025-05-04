<?php
session_start();

// 1. Check if user is logged in (session exists and is valid)
if (!isset($_SESSION['user_id']) || !isset($_SESSION['expiry']) || time() >= $_SESSION['expiry']) {
    // If not logged in, redirect to login
    header("Location: index.php");
    exit();
}

// 2. Prevent caching of this page
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Past date
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- Prevent browser caching (meta tags for extra security) -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
</head>
<script>
// Force reload if page is restored from bfcache
window.addEventListener('pageshow', (event) => {
    if (event.persisted) {
        window.location.reload(); // Ensures fresh session check
    }
});
</script>
<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION['user_id']) ?>!</h1>
    <a href="logout.php">Logout</a>
</body>
</html>