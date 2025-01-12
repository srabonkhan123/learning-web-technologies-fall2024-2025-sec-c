<?php
$conn = new mysqli("localhost", "root", "", "job_portal");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_POST['id']) ? $conn->real_escape_string($_POST['id']) : '';
$name = isset($_POST['name']) ? $conn->real_escape_string($_POST['name']) : '';
$contact_no = isset($_POST['contact_no']) ? $conn->real_escape_string($_POST['contact_no']) : '';
$username = isset($_POST['username']) ? $conn->real_escape_string($_POST['username']) : '';

if ($id && $name && $contact_no && $username) {
    $sql = "UPDATE employees SET name='$name', contact_no='$contact_no', username='$username' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Employee updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "All fields are required.";
}

$conn->close();
?>
