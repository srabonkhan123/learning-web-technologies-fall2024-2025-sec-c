<html>
<head>
	<title>Email</title>
</head>
<body>
	<form action="" method="" enctype="">
		Email:<br>
		<input type="Email" name="Email" value="" placeholder="sample@example.com"><br>
		<input type="submit" name="submit" value="submit">
		<hr>
	</form>

    
    $email = $emailErr = "";

  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["Email"])) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST["Email"];
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        Email: <br>
        <input type="email" name="Email" value="<?php echo $email; ?>" placeholder="sample@example.com"><br>
        <span style="color: red;"><?php echo $emailErr; ?></span><br><br>
        <input type="submit" name="submit" value="Submit">
        <hr>
    </form>
</body>
</html>
