
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dropdown Validation</title>
</head>
<body>
    <?php
    $dropdown = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dropdown = $_POST['dropdown'] ?? '';

        if (empty($dropdown)) {
            $error = "You must select an option.";
        } else {
            $error = "Selected option: $dropdown";
        }
    }
    ?>

    <form method="POST" action="">
        <label>Select:</label>
        <select name="dropdown">
            <option value="">Select...</option>
            <option value="Option1" <?= $dropdown == "Option1" ? "selected" : "" ?>>Option 1</option>
            <option value="Option2" <?= $dropdown == "Option2" ? "selected" : "" ?>>Option 2</option>
        </select><br>
        <input type="submit" value="Submit">
    </form>

    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
</body>
</html>
