FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 80

RUN echo "DirectoryIndex home.php" >> /etc/apache2/apache2.conf

# PHP Apache इमेज का उपयोग करें
FROM php:8.2-apache

# MySQL एक्सटेंशन इंस्टॉल और इनेबल करें (यह एरर ठीक करने के लिए ज़रूरी है)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# अपने प्रोजेक्ट की सभी फाइल्स को सर्वर के अंदर कॉपी करें
COPY . /var/www/html/

# Apache पोर्ट 80 को ओपन करें
EXPOSE 80


