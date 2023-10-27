# Use the official PHP 8.2 image as the base image
FROM php:8.2

# Set environment variables for Composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# Install required dependencies such as git and unzip which might be necessary for Composer
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory in the container
WORKDIR /app

# Copy the application code to the container
COPY . /app

# Install application dependencies through Composer
RUN composer install

# This command keeps the container running and allows us to execute bash commands inside the container
CMD ["tail", "-f", "/dev/null"]
