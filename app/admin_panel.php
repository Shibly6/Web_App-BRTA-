<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

    require_once 'db_connection.php';
    $conn = connectDB();

$query = "SELECT * FROM users";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$users = []; 
while ($row = $result->fetch_assoc()) {
    $users[] = $row;
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <!-- navbar -->
  <?php include 'nav.php'; ?>

  <div class="container col-md-5 mt-4">
        <h2 class="text-center">Admin Panel</h2><br>

        <h3>Applicant List</h3>
        <ul class="list-group">
            <?php foreach ($users as $user) : ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?php echo $user['name']; ?>
                    <a href="user_details.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Details</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_admin.php" class="btn btn-success mt-3">Add Admin</a>
        <br>
        <a href="logout.php" class="btn btn-danger mt-2">Logout</a>
    </div>

    <?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

</body>
</html>
