<?php
// Start a session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect the user to the login page
    header('Location: login.php');
    exit;
}

// Establish a connection to the MySQL database
<<<<<<< HEAD
$host = '192.168.0.83';
$username = 'localconnect';
$password = 'Stark@123';
$database = 'registration';
=======
$host = 'dbadress';
$username = 'dbusername';
$password = 'dbpassword';
$database = 'dbname';
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2

$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin_dashboard.css">
</head>
<body>
<<<<<<< HEAD
    <header>
        <div class="logo">
            <img src="EEE.png" alt="Logo">
        </div>
        <h2>Welcome, Admin!</h2>
        <a href="logout.php">Logout</a>
    </header>
=======
    <h2>Welcome, Admin!</h2>
    <a href="logout.php">Logout</a>
>>>>>>> 698e4ba5648e61ca83488ff1f7760fa1f05031e2

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
        <?php
        // Retrieve the information from the table
        $sql = "SELECT name, email FROM users";
        $result = $conn->query($sql);

        // Display the retrieved information in the table
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
