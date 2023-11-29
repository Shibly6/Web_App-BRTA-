<?php
    // Include your database connection
    require_once 'db_connection.php';

    $conn = connectDB();

    $response = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $stmt = $conn->prepare("INSERT INTO Subscribe (email) VALUES (?)");
            $stmt->bind_param("s", $email);

            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'Thank you for subscribing!';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error: ' . $stmt->error;
            }

            $stmt->close();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid email address!';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid request!';
    }

    $conn->close();

    header('Content-Type: application/json');
    echo json_encode($response);
?>
