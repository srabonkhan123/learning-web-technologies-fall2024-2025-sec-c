<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

echo "<h1>Welcome, " . $_SESSION['username'] . "</h1>";

if ($_SESSION['type'] == 'admin') {
    echo "<a href='view_users.php'>View Users</a><br>";
} else {
    echo "<a href='profile.php'>View Profile</a><br>";
}
echo "<a href='change_password.php'>Change Password</a><br>";
echo "<a href='logout.php'>Logout</a>";
?>
