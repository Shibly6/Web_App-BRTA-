<?php

    // Include your database connection
    require_once 'db_connection.php';

    $conn = connectDB();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $id = $_POST["id"];
    $vehicle_no = $_POST["vehicle_no"];
    $chess_no = $_POST["chess_no"];
    $present_address = $_POST["present_address"];
    $permanent_address = $_POST["permanent_address"];

    $photo = uploadFile("photo");
    $nid_soft_copy = uploadFile("nid_soft_copy");

    $stmt = $conn->prepare("INSERT INTO users (name, email, id, vehicle_no, chess_no, photo, nid_soft_copy, present_address, permanent_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $email, $id, $vehicle_no, $chess_no, $photo, $nid_soft_copy, $present_address, $permanent_address);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        session_start();
        $_SESSION['success_message'] = "User data saved successfully!";
        
        header('Location: user.php');
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "Invalid request!";
}

$conn->close();

function uploadFile($inputName) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
    move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile);
    return $targetFile;
}

?>
