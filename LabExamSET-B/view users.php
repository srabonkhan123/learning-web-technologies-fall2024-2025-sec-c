<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['type'] != 'admin') {
    header("Location: index.php");
    exit();
}

echo "<h2>All Registered Users</h2>";
$file = fopen("users.txt", "r");
while (($line = fgets($file)) !== false) {
    list($username, $password, $type) = explode(",", trim($line));
    echo "<p>Username: $username | Type: $type</p>";
}
fclose($file);
echo "<a href='home.php'>Back to Home</a>";
?>
