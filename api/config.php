<?php
$servername = "localhost";
$username = "root"; // اكتب هنا اسم المستخدم الخاص بك
$password = ""; // اكتب هنا كلمة المرور الخاصة بك
$dbname = "dental_clinic";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
