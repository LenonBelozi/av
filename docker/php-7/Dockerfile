FROM php:7.4.29-fpm-buster

WORKDIR /application

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        libcurl4-openssl-dev \
        libxml2 \
        libxml2-dev \
        icu-devtools \
        libzip-dev \
        libpng-dev \
        libonig-dev \
        vim \
        git \
        npm \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd 

RUN docker-php-ext-install \
    bcmath \
    ctype \
    mbstring \
    pdo \
    tokenizer \
    fileinfo \
    json \
    xml \
    zip \
    mysqli \
    pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY docker/setup.sh /tmp/setup.sh 

RUN chmod +x /tmp/setup.sh

CMD ["sh", "setup.sh"]