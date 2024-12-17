
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Date Validation</title>
</head>
<body>
    <?php
    $day = $month = $year = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $day = $_POST['day'] ?? '';
        $month = $_POST['month'] ?? '';
        $year = $_POST['year'] ?? '';

        if (empty($day) || empty($month) || empty($year)) {
            $error = "Date cannot be empty.";
        } elseif (!checkdate($month, $day, $year)) {
            $error = "Invalid date.";
        } elseif ($year < 1953 || $year > 1998) {
            $error = "Year must be between 1953 and 1998.";
        } else {
            $error = "Date is valid!";
        }
    }
    ?>

    <form method="POST" action="">
        <label>Day:</label>
        <input type="text" name="day" value="<?= htmlspecialchars($day) ?>" placeholder="dd"><br>
        <label>Month:</label>
        <input type="text" name="month" value="<?= htmlspecialchars($month) ?>" placeholder="mm"><br>
        <label>Year:</label>
        <input type="text" name="year" value="<?= htmlspecialchars($year) ?>" placeholder="yyyy"><br>
        <input type="submit" value="Submit">
    </form>

    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
</body>
</html>
