<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عيادة الأسنان - تسجيل حساب</title>
    <link rel="stylesheet" href="/css/register.css" />
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body>
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
    ?>
    <!-- قسم الهيدر يبدأ -->
    <header class="header fixed-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <img src="/images/download.png" width="100" alt="" />
                <nav class="nav">
                    <a href="/Dntal.html">الرئيسية</a>
                    <a href="#about">من نحن</a>
                    <a href="#services">الخدمات</a>
                    <a href="register.html">Register/Login</a>
                    <a href="register.html">اتصل بنا</a>
                </nav>
                <a href="#contact" class="link-btn">احجز موعدًا</a>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
        </div>
    </header>
    <!-- قسم الهيدر ينتهي -->
    <div class="container">
        <h2>إنشاء حساب</h2>
        <form method="POST">

            <div class="input-group">
                <label for="name">الاسم الكامل</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="input-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="phone">رقم الهاتف</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="confirm-password">تأكيد كلمة المرور</label>
                <input type="password" id="confirm-password" name="confirm_password" required>
            </div>

            <button type="submit">تسجيل</button>

            <p class="login-link">لديك حساب بالفعل؟ <a href="login.html">تسجيل الدخول</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>

</html>