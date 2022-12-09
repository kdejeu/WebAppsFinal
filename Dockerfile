FROM phpstorm/php-71-apache-xdebug
COPY . /var/www/html/.
#RUN apt-get update && apt-get install -y \
