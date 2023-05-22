<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // If the user is already logged in, redirect to the admin dashboard
    header('Location: admin_dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate the user against the admin table
<<<<<<< HEAD
    $host = '192.168.0.83';
    $db_username = 'localconnect';
    $db_password = 'Stark@123';
    $database = 'registration';
=======
    $host = 'dbaddress';
    $db_username = 'dbusername';
    $db_password = 'dbpassword';
    $database = 'dbname';
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2

    $conn = new mysqli($host, $db_username, $db_password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Authentication successful
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: admin_dashboard.php');
            exit;
        }
    }

    // Authentication failed
    $error_message = "Invalid username or password.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<<<<<<< HEAD
    <div class="container">
        <img src="EEE.png" alt="Logo" class="logo">
        <h2>Login</h2>
        <?php if (isset($error_message)) : ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <div class="signup-link">
            Don't have an account? <a href="registration.php">Create an Account</a>
        </div>
    </div>
=======
    <h2>Login</h2>
    <?php if (isset($error_message)) : ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Login">
    </form>
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2
</body>
</html>
