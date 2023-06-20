FROM php:8.1-fpm-buster

#  * a PHP accelerator should be installed
#    > Install and/or enable a PHP accelerator (highly recommended).

#  * short_open_tag should be disabled in php.ini
#    > Set short_open_tag to off in php.ini*.

RUN apt-get -y update \
    && apt-get -y upgrade


#####################################
# INSTALL AND ENABLE PHP EXTENSIONS #
#####################################

RUN apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev libpng-dev libgmp-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl opcache mysqli pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && docker-php-ext-enable pdo_mysql \
    && docker-php-ext-install pcntl \
    && docker-php-ext-install gd \
    && docker-php-ext-install gmp \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install sockets

###############################
# INSTALL PHP REDIS EXTENSION #
###############################

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

################
# ADD COMPOSER #
################

COPY --from=composer /usr/bin/composer /usr/bin/composer

###################
# ADD SYMFONY BIN #
###################

# Install pre-reqs
RUN apt-get update
RUN apt-get -y install nano curl build-essential

##############################
# INSTALL NVM, NODE AND YARN #
##############################

# Declare constants
ENV NVM_VERSION v0.37.2
ENV NODE_VERSION v14.15.5

# Replace shell with bash so we can source files
SHELL ["/bin/bash", "-c"]

# Install NVM
RUN curl -o- https://raw.githubusercontent.com/creationix/nvm/${NVM_VERSION}/install.sh | bash

# Install NODE
RUN source ~/.nvm/nvm.sh; \
    nvm install $NODE_VERSION; \
    nvm use --delete-prefix $NODE_VERSION;

ENV PATH=$PATH:/root/.nvm/versions/node/$NODE_VERSION/bin

RUN npm install --global yarn

#############################################################################
# SETUP GIT CREDENTIALS TO ALLOW COMPOSER AND SYMFONY TO PERFORM SOME TASKS #
#############################################################################

WORKDIR /var/www

CMD php-fpm
