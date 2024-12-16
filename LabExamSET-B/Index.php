<?php
session_start();

function registerUser($username, $password, $type) {
    $file = fopen("users.txt", "a");
    fwrite($file, "$username,$password,$type\n");
    fclose($file);
}

function validateUser($username, $password) {
    $file = fopen("users.txt", "r");
    while (($line = fgets($file)) !== false) {
        list($storedUser, $storedPass, $type) = explode(",", trim($line));
        if ($username == $storedUser && $password == $storedPass) {
            fclose($file);
            return $type; // Return role (admin/user)
        }
    }
    fclose($file);
    return false;
}

// Registration logic
if (isset($_POST['register'])) {
    registerUser($_POST['username'], $_POST['password'], $_POST['type']);
    echo "User Registered!";
}

// Login logic
if (isset($_POST['login'])) {
    $type = validateUser($_POST['username'], $_POST['password']);
    if ($type) {
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['type'] = $type;
        header("Location: home.php");
        exit();
    } else {
        echo "Invalid Credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login & Registration</title>
</head>
<body>
    <h2>Register</h2>
    <form method="POST">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Type: 
        <select name="type">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>
        <button type="submit" name="register">Register</button>
    </form>

    <h2>Login</h2>
    <form method="POST">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>
