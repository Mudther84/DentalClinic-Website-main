<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "dental_clinic");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال البيانات من النموذج
$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$message = $_POST['message'];

// إدخال البيانات إلى الجدول
$sql = "INSERT INTO contact_messages (name, email, phone, message)
        VALUES ('$name', '$email', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "تم إرسال رسالتك بنجاح!";
} else {
    echo "حدث خطأ: " . $conn->error;
}

$conn->close();
