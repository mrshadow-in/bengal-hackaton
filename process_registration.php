<?php
// Establish a connection to the MySQL database
<<<<<<< HEAD
$host = '192.168.0.83';
$username = 'localconnect';
$password = 'Stark@123';
$database = 'registration';
=======
$host = 'address';
$username = 'dbusername';
$password = 'dbpassword';
$database = 'dbname';
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize the form data
$name = sanitizeInput($conn, $_POST['name']);
$email = sanitizeInput($conn, $_POST['email']);
$password = sanitizeInput($conn, $_POST['password']);

// Prepare and execute the SQL query
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

// Function to sanitize user inputs
function sanitizeInput($conn, $input) {
    // Remove leading/trailing white spaces
    $input = trim($input);
    // Escape special characters
    $input = mysqli_real_escape_string($conn, $input);
    // Additional sanitization or validation can be performed here if needed
    return $input;
}
?>
