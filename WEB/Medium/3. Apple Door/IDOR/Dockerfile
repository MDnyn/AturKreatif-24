# 
# COPY ./requirements.txt /app/requirements.txt

# RUN pip install --no-cache-dir --upgrade -r /app/requirements.txt

# COPY ./personal_portfolio /app/

# RUN chown -R $APP_USER:$APP_USER $APP_HOME
# RUN chown -R www-data:www-data /app
# USER $APP_USER

# CMD [ "python", "manage.py", "runserver", "0.0.0.0:8000" ]


FROM php:7.4-apache

# Copy the web application files to the container
# COPY . /var/www/html/


# # Install any required dependencies
# RUN docker-php-ext-install mysqli
# RUN set -ex; \
#     apt-get update; \
#     apt-get install -y --no-install-recommends \
#     mariadb-client

# # Expose port 80 for the web server
# EXPOSE 80

# # Start Apache in the foreground
# CMD ["apache2-foreground"]

WORKDIR /var/www/html
RUN apt-get update -y && apt-get install -y libmariadb-dev
RUN docker-php-ext-install mysqli