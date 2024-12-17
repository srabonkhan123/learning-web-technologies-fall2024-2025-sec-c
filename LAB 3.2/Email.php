<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Validation</title>
</head>
<body>
    <?php
    $email = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'] ?? '';

        if (empty($email)) {
            $error = "Email cannot be empty.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
        } else {
            $error = "Email is valid!";
        }
    }
    ?>

    <form method="POST" action="">
        <label>Email:</label>
        <input type="text" name="email" value="<?= htmlspecialchars($email) ?>"><br>
        <input type="submit" value="Submit">
    </form>

    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
</body>
</html>
