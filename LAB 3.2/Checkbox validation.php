<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkbox Validation</title>
</head>
<body>
    <?php
    $options = [];
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $options = $_POST['options'] ?? [];

        if (count($options) < 1) {
            $error = "At least one option must be selected.";
        } else {
            $error = "Selected options: " . implode(", ", $options);
        }
    }
    ?>

    <form method="POST" action="">
        <label>Options:</label><br>
        <input type="checkbox" name="options[]" value="Option1" <?= in_array("Option1", $options) ? "checked" : "" ?>> Option 1<br>
        <input type="checkbox" name="options[]" value="Option2" <?= in_array("Option2", $options) ? "checked" : "" ?>> Option 2<br>
        <input type="checkbox" name="options[]" value="Option3" <?= in_array("Option3", $options) ? "checked" : "" ?>> Option 3<br>
        <input type="submit" value="Submit">
    </form>

    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
</body>
</html>
