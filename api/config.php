<?php
// إعدادات الاتصال بقاعدة البيانات في بيئة Docker
$servername = "db";          // تم التغيير من "localhost" إلى "db" (اسم الخدمة في docker-compose)
$username = "root";          // اسم المستخدم الافتراضي
$password = "root";          // تم التغيير من "" إلى "root" ليتطابق مع MYSQL_ROOT_PASSWORD
$dbname = "dental_clinic";   // اسم قاعدة البيانات

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// (إضافة مستحسنة) ضبط ترميز الاتصال لضمان دعم اللغة العربية بشكل صحيح بدون مشاكل
$conn->set_charset("utf8mb4");
?>