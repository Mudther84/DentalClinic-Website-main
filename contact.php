<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عيادة الأسنان</title>

    <!-- رابط أيقونات Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- رابط Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

    <!-- رابط ملف CSS المخصص -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/favicon.png" />
</head>

<body dir="rtl">

    <!-- قسم الهيدر يبدأ -->
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
    ?>

    <header class="header fixed-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <img src="/images/download.png" width="100" alt="" />
                <nav class="nav">
                    <a href="#home">الرئيسية</a>
                    <a href="#about">من نحن</a>
                    <a href="#services">الخدمات</a>
                    <a href="#reviews">التقييمات</a>
                    <a href="register.html">اتصل بنا</a>
                </nav>
                <a href="#contact" class="link-btn">احجز موعدًا</a>
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>
        </div>
    </header>
    <!-- قسم الهيدر ينتهي -->

    <!-- قسم الرئيسية يبدأ -->
    <section class="home" id="home">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="content text-center text-md-right">
                    <h3>دعنا نجعل ابتسامتك أكثر إشراقًا.</h3>
                    <p>عيادة الأسنان يمكنها مساعدتك في الحصول على الابتسامة التي طالما حلمت بها. نقدم خدمات تجميل الأسنان، علاج العصب، فحص التسوس والمزيد.</p>
                    <a href="#contact" class="link-btn">احجز موعدًا</a>
                </div>
            </div>
        </div>
    </section>
    <!-- قسم الرئيسية ينتهي -->


    <!-- قسم التواصل يبدأ -->
    <section class="contact" id="contact">
        <h1 class="heading">احجز موعدًا</h1>
        <form>
            <span>ادخل اسمك :</span>
            <input type="text" name="name" placeholder="ادخل اسمك" class="box" required>
            <span>ادخل بريدك الإلكتروني :</span>
            <input type="email" name="email" placeholder="ادخل بريدك الإلكتروني" class="box" required>
            <span>ادخل رقم هاتفك :</span>
            <input type="number" name="number" placeholder="ادخل رقمك" class="box" required>
            <span>حدد موعد الزيارة :</span>
            <input type="datetime-local" name="date" class="box" required>
            <input type="submit" value="احجز موعدًا" class="link-btn">
        </form>
    </section>
    <!-- قسم التواصل ينتهي -->
    <!--قسم الاتصال 2 يبدأ-->
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
    ?>

    <div class="contact-section">
        <h2>اتصل بنا</h2>
        <div class="contact-info">
            <p><strong>📍 العنوان:</strong> 123 حي شارع إبراهيم قاقيش</p>
            <p><strong>📞 الهاتف:</strong> (123) 456-7890</p>
            <p><strong>📧 البريد الإلكتروني:</strong> info@yourdentalclinic.com</p>
            <p><strong>🕒 ساعات العمل:</strong> من الإثنين إلى الجمعة: 9 صباحًا - 6 مساءً | السبت: 10 صباحًا - 4 مساءً | الأحد: مغلق</p>
        </div>
        <form class="contact-form">
            <input type="text" placeholder="اسمك" required>
            <input type="email" placeholder="بريدك الإلكتروني" required>
            <input type="tel" placeholder="رقم هاتفك" required>
            <textarea placeholder="رسالتك" rows="4" required></textarea>
            <button type="submit">إرسال الرسالة</button>
        </form>
        <div class="social-links">
            <p>تابعنا:</p>
            <a href="#">فيسبوك</a>
            <a href="#">إنستغرام</a>
            <a href="#">تويتر</a>
        </div>
    </div>
    <!--قسم الاتصال 2 ينتهي-->

    <!-- سكريبتات جافا سكريبت -->
    <script src="js/script.js"></script>
    <script src="/js/axios.js"></script>
</body>

</html>