<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $name = sanitizeInput($_POST['name']);
    $username = sanitizeInput($_POST['username']);
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Save the registration information to the admin table
<<<<<<< HEAD
    $host = '192.168.0.83';
    $db_username = 'localconnect';
    $db_password = 'Stark@123';
    $database = 'registration';
=======
    $host = 'dbaddresss';
    $db_username = 'dbusername';
    $db_password = 'dbpassword';
    $database = 'dbname';
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2

    $conn = new mysqli($host, $db_username, $db_password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO admin (name, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $username, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header('Location: login.php');
        exit;
    } else {
        // Registration failed
        $error_message = "Registration failed. Please try again.";
    }
}

function sanitizeInput($input)
{
    // Sanitize the input using htmlspecialchars
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
</head>
<body>
<<<<<<< HEAD
    <div class="container">
        <div class="logo">
            <img src="EEE.png" alt="Logo">
        </div>
        <h2>Registration</h2>
        <?php if (isset($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" maxlength="30" required>
            <input type="submit" value="Register">
        </form>
    </div>
=======
    <h2>Registration</h2>
    <?php if (isset($error_message)) : ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" maxlength="30" required>
        <br>
        <input type="submit" value="Register">
    </form>
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2
</body>
</html>
