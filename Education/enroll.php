<?php
header("Content-Type: application/json");
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $class   = $_POST['class'];
    $subject = $_POST['subject'];

    if (empty($name) || empty($email) || empty($phone) || empty($class)) {
        echo json_encode(["status" => "error", "message" => "All fields required"]);
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO enrollments (full_name, email, phone, class, subject)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->bind_param("sssss", $name, $email, $phone, $class, $subject);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}
?>
