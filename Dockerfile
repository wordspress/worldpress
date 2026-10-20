FROM php:8.2-apache

# Copy all application files into the Apache web root directory
COPY . /var/www/html/

# Ensure the web server user owns the files and has permissions to read/write (needed for submissions.txt)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Expose port 80 for web traffic
EXPOSE 80
