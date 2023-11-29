<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_POST['submit'])) {
    $newAdminUsername = $_POST['username'];
    $newAdminPassword = $_POST['password'];

    require_once 'db_connection.php';
    $conn = connectDB();

    $stmt = $conn->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $newAdminUsername, $newAdminPassword);

    if ($stmt->execute()) {
        header('Location: admin_panel.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
</head>
<body>

    <h2>Add Admin</h2>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit" name="submit">Add Admin</button>
    </form>
    <br>
    <a href="admin_panel.php">Back to Admin Panel</a>

</body>
</html>
