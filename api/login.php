<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "dental_clinic");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "فشل الاتصال"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        echo json_encode(["status" => "success", "message" => "تم تسجيل الدخول"]);
    } else {
        echo json_encode(["status" => "error", "message" => "كلمة المرور غير صحيحة"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "البريد الإلكتروني غير مسجل"]);
}

$conn->close();
