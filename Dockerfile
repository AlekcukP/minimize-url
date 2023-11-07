FROM php:8.0-apache

RUN apt-get update && \
    apt-get install -y \
        mariadb-client \
        libzip-dev \
        libpng-dev \
        libpq-dev \
        zip \
        unzip \
        wget \
        curl \
        git

RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    gd

RUN wget https://getcomposer.org/download/latest-2.x/composer.phar && \
    mv composer.phar /usr/bin/composer && \
    chmod +x /usr/bin/composer

RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* && \
    rm /var/log/lastlog /var/log/faillog

ARG EXEC_USER=www-data
ARG PUID=1000
ARG PGID=1000
ENV EXEC_USER=${EXEC_USER}
ENV PUID=${PUID}
ENV PGID=${PGID}

RUN if [ $(grep -c "^${EXEC_USER}:" /etc/passwd) ]; then \
        deluser ${EXEC_USER} \
    ;fi

RUN groupadd -g ${PGID} ${EXEC_USER} && \
    useradd -u ${PUID} -g ${EXEC_USER} -m ${EXEC_USER} -G ${EXEC_USER} && \
    usermod -p "*" ${EXEC_USER} -s /bin/bash && \
    usermod -aG sudo ${EXEC_USER}

RUN chown -R ${EXEC_USER}:${EXEC_USER} /var/www/html && \
    chmod -R 755 /var/www/html

USER root

WORKDIR /var/www/html

COPY ./web /var/www/html
COPY ./apache/apache.conf /etc/apache2/sites-available/000-default.conf

RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/
RUN echo "memory_limit=-1" >> /usr/local/etc/php/php.ini

EXPOSE 80

CMD ["apache2-foreground"]
