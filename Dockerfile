# IMAGE
# Dockerfile for www service
FROM php:7.4-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# We need to create inside the container's system our workdir path
RUN mkdir -p /var/www/html

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /var/www/html
COPY src/ /var/www/html

# Expose port 80 for Apache
EXPOSE 80

# Start Apache when the container runs
CMD ["apache2-foreground"]