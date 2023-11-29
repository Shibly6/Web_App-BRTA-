<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    require_once 'db_connection.php';

    $conn = connectDB();

    $query = "SELECT * FROM users WHERE id = $userId";
    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    $userDetails = $result->fetch_assoc();

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!-- navbar -->
    <?php include 'nav.php'; ?>

    <h2 class="mb-4 text-center">Applicant Details</h2>

    <div class="container mt-4 mx-auto text-center d-flex justify-content-center"> 

        <div class="card" style="width: 38rem;">
            <img class="card-img-top" src="<?php echo $userDetails['photo']; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $userDetails['name']; ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email:</strong> <?php echo $userDetails['email']; ?></li>
                <li class="list-group-item"><strong>ID No:</strong> <?php echo $userDetails['id']; ?></li>

                <li class="list-group-item"><strong>Vehicle No:</strong> <?php echo $userDetails['vehicle_no']; ?></li>
                <li class="list-group-item"><strong>Chess No:</strong> <?php echo $userDetails['chess_no']; ?></li>
                <li class="list-group-item"><strong>Present Address:</strong> <?php echo $userDetails['present_address']; ?></li>
                <li class="list-group-item"><strong>Permanent Address:</strong> <?php echo $userDetails['permanent_address']; ?></li>
            </ul>
            <div class="card-body">
                <h4>NID Soft Copy</h4>
                <img src="<?php echo $userDetails['nid_soft_copy']; ?>" alt="NID Soft Copy" class="img-fluid" style="max-height: 500px;">
            </div>
        </div>
    </div>

    <br>
    <center><a href="admin_panel.php" class="btn btn-primary text-center">Back to Admin Panel</a></center>

    <?php include 'footer.php'; ?>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

    

</body>

</html>
