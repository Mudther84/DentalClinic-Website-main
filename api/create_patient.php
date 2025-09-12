<?php
include 'config.php';

// التحقق من البيانات القادمة
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $date  = $conn->real_escape_string($_POST['date']);

    $sql = "INSERT INTO patients (name, email, phone, date) 
            VALUES ('$name', '$email', '$phone', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('تم حجز الموعد بنجاح ✅'); window.location.href='../Dntal.html';</script>";
    } else {
        echo "خطأ: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "يرجى إرسال البيانات عبر النموذج.";
}
