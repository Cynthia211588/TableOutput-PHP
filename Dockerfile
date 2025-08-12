# simple PHP + Apache image
FROM php:8.1-apache

# copy site files into Apache web root
COPY . /var/www/html/

# make sure files are readable by web server
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

# default command for php:apache images
CMD ["apache2-foreground"]
