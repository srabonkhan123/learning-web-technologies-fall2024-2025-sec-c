<html>
<head>
    <title>name</title>
</head>
<body>
  
    <form method="POST">
        Name:<br>
        <input type="text" name="name" value=""><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST['name']);
        $errors = [];
 
      
        if (empty($name)) {
            $errors[] = "Name cannot be empty.";
        }
 
        
        if (str_word_count($name) < 2) {
            $errors[] = "Name must contain at least two words.";
        }
 
       
        if (strlen($name) > 0 && !ctype_alpha(substr($name, 0, 1))) {
            $errors[] = "Name must start with a letter.";
        }
 
        $validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.-";
        for ($i = 0; $i < strlen($name); $i++) {
            if (strpos($validChars, $name[$i]) === false) {
                $errors[] = "Name can only contain letters, periods, and dashes.";
                break;
            }
        }
 
      
        if (!empty($errors)) {
            echo "<ul style='color: red;'>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        } else {
            echo "<p style='color: green;'>Name is valid: $name</p>";
        }
    }
    ?>
</body>
</html>
