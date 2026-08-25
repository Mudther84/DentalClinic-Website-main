# استخدام نسخة PHP مع خادم Apache
FROM php:8.2-apache

# تثبيت امتدادات PHP اللازمة للتعامل مع MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# تفعيل ميزة إعادة كتابة الروابط (مفيدة إذا كنت ستستخدمها لاحقاً)
RUN a2enmod rewrite

# تعيين مجلد العمل الافتراضي
WORKDIR /var/www/html