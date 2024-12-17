
<html lang="en">
<head>
    
    <title>Name Validation</title>
</head>
<body>
    <?php
    $name = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'] ?? '';

        if (empty($name)) {
            $error = "Name cannot be empty.";
        } elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\- ]*$/", $name)) {
            $error = "Name must start with a letter and can only contain letters, periods, and dashes.";
        } elseif (str_word_count($name) < 2) {
            $error = "Name must contain at least two words.";
        } else {
            $error = "Name is valid!";
        }
    }
    ?>

    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($name) ?>"><br>
        <input type="submit" value="Submit">
    </form>

    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
</body>
</html>

