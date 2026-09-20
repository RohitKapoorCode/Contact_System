FROM php:8.2-apache
COPY . /var/www/html/
EXPOSE 80

RUN echo "DirectoryIndex home.php" >> /etc/apache2/apache2.conf

