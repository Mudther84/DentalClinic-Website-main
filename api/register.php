// register.php - تسجيل المستخدمين
<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!empty($data['name']) && !empty($data['email']) && !empty($data['password']) && !empty($data['phone']) && !empty($data['dob']) && !empty($data['gender'])) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, phone, dob, gender, notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);
        
        if ($stmt->execute([$data['name'], $data['email'], $hashed_password, $data['phone'], $data['dob'], $data['gender'], $data['notes']])) {
            echo json_encode(["message" => "تم التسجيل بنجاح"]);
        } else {
            echo json_encode(["error" => "فشل في التسجيل"]);
        }
    } else {
        echo json_encode(["error" => "جميع الحقول مطلوبة"]);
    }
}
?>

// login.php - تسجيل الدخول
<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    if (!empty($data['email']) && !empty($data['password'])) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($data['password'], $user['password'])) {
            echo json_encode(["message" => "تم تسجيل الدخول بنجاح"]);
        } else {
            echo json_encode(["error" => "بيانات تسجيل الدخول غير صحيحة"]);
        }
    } else {
        echo json_encode(["error" => "جميع الحقول مطلوبة"]);
    }
}
?>
