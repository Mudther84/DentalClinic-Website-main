<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "dental_clinic");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استقبال البيانات من النموذج
$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['number'];
$date     = $_POST['date'];

// إدخال البيانات إلى الجدول
$sql = "INSERT INTO appointments (name, email, phone, appointment_date)
        VALUES ('$name', '$email', '$phone', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "تم حجز الموعد بنجاح!";
} else {
    echo "حدث خطأ: " . $conn->error;
}

$conn->close();
