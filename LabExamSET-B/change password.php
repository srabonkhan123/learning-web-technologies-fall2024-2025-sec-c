<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['change_password'])) {
    $users = file("users.txt");
    $newData = "";
    foreach ($users as $user) {
        list($username, $password, $type) = explode(",", trim($user));
        if ($username == $_SESSION['username']) {
            $password = $_POST['new_password'];
        }
        $newData .= "$username,$password,$type\n";
    }
    file_put_contents("users.txt", $newData);
    echo "Password Updated!";
}
?>

<form method="POST">
    New Password: <input type="password" name="new_password" required><br>
    <button type="submit" name="change_password">Change Password</button>
</form>
<a href='home.php'>Back to Home</a>
