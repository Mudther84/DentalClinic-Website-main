# 🦷 نظام حجز مواعيد عيادة الأسنان

# Dental Clinic Appointment System

مشروع متكامل لحجز مواعيد عيادة أسنان، يعتمد على واجهة أمامية مبنية باستخدام **HTML, CSS, JavaScript** وواجهة خلفية باستخدام **PHP النقي (Pure PHP)** مع قاعدة بيانات **MySQL**.

يقدّم الموقع واجهة عربية احترافية وسهلة الاستخدام، ومتوافقة مع جميع الأجهزة من خلال **Bootstrap**.

---

## ✨ مميزات المشروع

* 📝 حجز المواعيد إلكترونيًا بإدخال بيانات المريض:

  * الاسم
  * البريد الإلكتروني
  * رقم الهاتف
  * تاريخ الموعد

* ✔️ التحقق من صحة البيانات (Validation) قبل إدخالها.

* 🗄️ تخزين بيانات المواعيد داخل قاعدة بيانات MySQL.

* 🎨 تصميم عربي احترافي باستخدام Bootstrap.

* ⚡ واجهة خفيفة وسريعة.

* 🔐 صفحات تسجيل الدخول وإنشاء حساب.

* 📱 واجهة متجاوبة بالكامل مع جميع أحجام الشاشات.

* 🧩 استخدام JavaScript وAJAX للتفاعل مع واجهة الـ API.

---

## 🧩 بنية المشروع (Project Structure)

```text
DentalClinic-Website-main/
│
├── api/                    ← ملفات الـ Back-end وواجهات API باستخدام PHP
│
├── css/                    ← ملفات تنسيق الموقع CSS
│
├── images/                 ← صور الموقع والشعار والأيقونات والخلفيات
│
├── js/                     ← ملفات JavaScript والتفاعلات وAJAX
│
├── Dntal.html              ← الصفحة الرئيسية لعيادة الأسنان
│
├── login.html              ← صفحة تسجيل الدخول
│
├── register.html           ← صفحة إنشاء حساب جديد
│
├── Dockerfile              ← إعداد Docker لتشغيل المشروع
│
├── docker-compose.yml      ← إعداد تشغيل المشروع مع الخدمات المطلوبة
│
└── README.md               ← ملف وصف المشروع
```

---

# 🛠️ تشغيل المشروع باستخدام XAMPP

إذا كنت تستخدم **XAMPP**، ضع مجلد المشروع داخل:

```text
C:\xampp\htdocs\
```

بحيث يصبح المسار:

```text
C:\xampp\htdocs\DentalClinic-Website-main
```

ثم شغّل:

* Apache
* MySQL

بعد ذلك افتح المتصفح على:

```text
http://localhost/DentalClinic-Website-main/Dntal.html
```

---

# 🐳 تشغيل المشروع باستخدام Docker

يمكن تشغيل المشروع باستخدام **Docker** بدلًا من تثبيت PHP وApache بشكل مباشر على الجهاز.

## المتطلبات

تأكد من تثبيت:

* Docker Desktop
* Git

يمكنك التحقق من Docker باستخدام:

```powershell
docker --version
```

ويُفضّل أيضًا التأكد من أن Docker يعمل:

```powershell
docker ps
```

إذا ظهر لك جدول الـ containers بدون أخطاء، فهذا يعني أن Docker يعمل بشكل صحيح.

---

## 📥 تحميل المشروع

إذا كان المشروع موجودًا على GitHub، قم بتحميله باستخدام:

```powershell
git clone https://github.com/USERNAME/DentalClinic-Website-main.git
```

ثم انتقل إلى مجلد المشروع:

```powershell
cd DentalClinic-Website-main
```

> استبدل `USERNAME` باسم حساب GitHub الخاص بك إذا كنت تستخدم مستودعًا مختلفًا.

---

# 🚀 تشغيل المشروع باستخدام Docker Run

إذا كان المشروع يحتوي على `Dockerfile`، يمكنك بناء Docker Image أولًا:

```powershell
docker build -t dentalclinic-website .
```

بعد انتهاء عملية الـ Build شغّل Container باستخدام:

```powershell
docker run -d --name dentalclinic-web -p 8080:80 dentalclinic-website
```

### شرح الأمر

```text
docker run
```

تشغيل Container جديد.

```text
-d
```

تشغيل الـ Container في الخلفية.

```text
--name dentalclinic-web
```

تسمية الـ Container باسم:

```text
dentalclinic-web
```

```text
-p 8080:80
```

ربط Port `8080` على جهاز Windows مع Port `80` داخل الـ Container.

```text
dentalclinic-website
```

اسم الـ Docker Image التي تم إنشاؤها.

---

## 🌐 فتح الموقع بعد تشغيل Docker

بعد تشغيل الـ Container بنجاح، افتح:

```text
http://localhost:8080/Dntal.html
```

أو:

```text
http://localhost:8080/
```

حسب إعدادات Apache والملف الافتراضي داخل المشروع.

---

# 🔍 التأكد من أن Container يعمل

استخدم:

```powershell
docker ps
```

يجب أن يظهر Container مشابه لـ:

```text
CONTAINER ID   IMAGE                  STATUS          PORTS
xxxxxxxxxxxx   dentalclinic-website   Up ...          0.0.0.0:8080->80/tcp
```

---

# 🛑 إيقاف المشروع

لإيقاف Container:

```powershell
docker stop dentalclinic-web
```

---

# ▶️ تشغيله مرة أخرى

بعد إيقافه، يمكنك تشغيله مرة أخرى باستخدام:

```powershell
docker start dentalclinic-web
```

---

# 🗑️ حذف Container

إذا أردت حذف الـ Container:

```powershell
docker rm -f dentalclinic-web
```

> هذا يحذف الـ Container فقط، وليس ملفات المشروع الموجودة على جهازك.

---

# 🏗️ إعادة بناء Docker Image

إذا قمت بتعديل `Dockerfile` أو ملفات إعداد Docker، يمكنك إعادة بناء Image:

```powershell
docker build --no-cache -t dentalclinic-website .
```

ثم شغّل Container جديد:

```powershell
docker run -d --name dentalclinic-web -p 8080:80 dentalclinic-website
```

---

# 🗄️ إعداد قاعدة البيانات (Database Setup)

## باستخدام XAMPP

افتح:

```text
http://localhost/phpmyadmin
```

ثم أنشئ قاعدة بيانات باسم:

```text
dental_clinic
```

مثال على جدول المواعيد:

```sql
CREATE DATABASE dental_clinic;

USE dental_clinic;

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    appointment_date DATETIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

# 🐳 قاعدة البيانات مع Docker

إذا كنت تستخدم Docker، يمكنك تشغيل MySQL في Container منفصل.

أنشئ MySQL Container باستخدام:

```powershell
docker run -d `
  --name dentalclinic-mysql `
  -e MYSQL_ROOT_PASSWORD=root `
  -e MYSQL_DATABASE=dental_clinic `
  -p 3307:3306 `
  mysql:8.0
```

بعد ذلك يمكنك التأكد من تشغيله:

```powershell
docker ps
```

سيكون MySQL متاحًا على:

```text
127.0.0.1:3307
```

وليس:

```text
127.0.0.1:3306
```

لأن Port `3307` على Windows مرتبط بـ Port `3306` داخل Container.

---

# 🔗 إعداد اتصال PHP بقاعدة البيانات

عند تشغيل PHP داخل Docker، **لا تستخدم `localhost` للاتصال بـ MySQL الموجود في Container آخر**.

يجب استخدام اسم MySQL Container أو اسم الخدمة في Docker Network.

مثال:

```php
$host = "dentalclinic-mysql";
$database = "dental_clinic";
$username = "root";
$password = "root";
```

أما إذا كان PHP وMySQL يعملان على نفس الجهاز باستخدام XAMPP، فيمكن استخدام:

```php
$host = "127.0.0.1";
$database = "dental_clinic";
$username = "root";
$password = "";
```

---

# 🔌 ربط ملفات PHP بقاعدة البيانات

يجب ربط ملفات PHP الموجودة داخل:

```text
api/
```

بقاعدة البيانات `dental_clinic`.

مثال:

```php
<?php

$host = "127.0.0.1";
$dbname = "dental_clinic";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
```

> إذا كان PHP يعمل داخل Docker وMySQL يعمل في Container منفصل، غيّر `127.0.0.1` إلى اسم الـ MySQL Container أو اسم خدمة MySQL في Docker Compose.

---

# 📡 API

يحتوي مجلد:

```text
api/
```

على ملفات الـ Back-end الخاصة بالمشروع.

يمكن استخدام هذه الملفات لاستقبال بيانات الحجز من JavaScript ومعالجتها باستخدام PHP ثم تخزينها في MySQL.

مثال على تدفق البيانات:

```text
User
 │
 ▼
HTML Form
 │
 ▼
JavaScript / AJAX
 │
 ▼
PHP API
 │
 ▼
MySQL Database
```

---

# 🔐 Authentication

يحتوي المشروع على صفحات:

```text
login.html
```

لتسجيل الدخول.

و:

```text
register.html
```

لإنشاء حساب جديد.

يمكن تطوير نظام Authentication باستخدام PHP Sessions وتخزين بيانات المستخدمين في قاعدة بيانات MySQL.

---

# 📱 Responsive Design

تم تصميم الواجهة لتعمل على:

* 💻 أجهزة الكمبيوتر
* 💻 أجهزة Laptop
* 📱 الهواتف المحمولة
* 📲 الأجهزة اللوحية

وذلك باستخدام **Bootstrap** بالإضافة إلى CSS الخاص بالمشروع.

---

# 📸 صور المشروع (Screenshots)

يمكن إضافة لقطات شاشة للمشروع هنا، مثل:

### الصفحة الرئيسية

```text
screenshots/home.png
```

### صفحة الحجز

```text
screenshots/appointment.png
```

### صفحة تسجيل الدخول

```text
screenshots/login.png
```

### صفحة إنشاء الحساب

```text
screenshots/register.png
```

---

# 🚀 تحسينات مستقبلية مقترحة

* 📊 إضافة لوحة تحكم Dashboard للإدارة.
* 📧 إرسال بريد إلكتروني لتأكيد الموعد.
* 🔔 إضافة نظام تنبيهات للموظفين.
* ❌ إضافة إمكانية إلغاء الموعد.
* 🔄 إضافة إمكانية تأجيل أو تعديل الموعد.
* 👨‍⚕️ إضافة إدارة الأطباء.
* 🦷 إضافة إدارة العيادات والتخصصات.
* 📅 إضافة Calendar لعرض المواعيد.
* 👤 إضافة صفحة Profile للمريض.
* 🔐 تحسين نظام Authentication والصلاحيات.
* 📈 إضافة إحصائيات وتقارير للمواعيد.
* 🛡️ تحسين أمان الـ API واستخدام Prepared Statements.

---

# 🧰 التقنيات المستخدمة

| التقنية          | الاستخدام                  |
| ---------------- | -------------------------- |
| HTML5            | بناء صفحات الموقع          |
| CSS3             | تنسيق وتصميم الموقع        |
| JavaScript       | التفاعلات ومعالجة البيانات |
| Bootstrap        | Responsive Design          |
| AJAX / Fetch API | إرسال البيانات إلى الـ API |
| PHP              | Back-end                   |
| MySQL            | Database                   |
| Apache           | Web Server                 |
| XAMPP            | بيئة التشغيل المحلية       |
| Docker           | Containerization           |

---

# 📌 روابط التشغيل

## XAMPP

```text
http://localhost/DentalClinic-Website-main/Dntal.html
```

## Docker

```text
http://localhost:8080/Dntal.html
```

---

# 📄 License

هذا المشروع مخصص للأغراض التعليمية والتطويرية.

---

# 👨‍💻 Developer

**Dental Clinic Appointment System**

Built with:

```text
HTML + CSS + JavaScript + Bootstrap + PHP + MySQL + Docker
```
