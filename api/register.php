<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "dental_clinic");

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "فشل الاتصال بقاعدة البيانات"]);
    exit();
}

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$password = $data['password'];
$confirm_password = $data['confirm_password'];

if ($password !== $confirm_password) {
    echo json_encode(["status" => "error", "message" => "كلمتا المرور غير متطابقتين"]);
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, phone, password)
        VALUES ('$name', '$email', '$phone', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "تم تسجيل الحساب بنجاح"]);
} else {
    echo json_encode(["status" => "error", "message" => "خطأ أثناء التسجيل: " . $conn->error]);
}

$conn->close();
