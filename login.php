<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عيادة الأسنان - تسجيل الدخول</title>
    <link rel="stylesheet" href="/css/login.css" />
</head>

<body>
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
    ?>
    <div class="container">
        <h2>تسجيل الدخول</h2>
        <form action="login.php" method="POST">

            <div class="input-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit">تسجيل الدخول</button>

            <p class="register-link">ليس لديك حساب؟ <a href="register.html">إنشاء حساب جديد</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.querySelector("form[action='login.php']").addEventListener("submit", function(e) {
            e.preventDefault();

            const data = {
                email: document.getElementById("email").value,
                password: document.getElementById("password").value
            };

            axios.post("login.php", data)
                .then(response => {
                    alert(response.data.message);
                    if (response.data.status === "success") {
                        window.location.href = "dashboard.html"; // أو أي صفحة بعد تسجيل الدخول
                    }
                })
                .catch(error => {
                    alert("حدث خطأ أثناء تسجيل الدخول");
                    console.error(error);
                });
        });
    </script>

</body>

</html>