#!/bin/bash
# Criado/adaptado por Ribamar FS - http://ribafs.org
apt update;
# "Instalar pacotes básicos.";
apt install -y apache2 libapache2-mod-php7.2 git mcrypt curl phpunit composer;

# "Instalar Apache e módulos.";

a2enmod rewrite;
systemctl restart apache2;

# Instalar SGBDs
apt install -y mariadb-server;

# "Instalar PHP 7.2 e extensões.";
apt install -y php7.2 php7.2-bcmath php7.2-mysql;
apt install -y php7.2-xml php7.2-xsl php7.2-curl php7.2-xdebug php7.2-intl;
apt install -y php7.2-zip php7.2-mbstring php7.2-gettext php7.2-gd php-curl php-pear;

# "Instalar pacotes básicos";
apt install -y aptitude mc p7zip-full ssh;

# "Instalar suporte a cache no PHP.";
apt install -y php-apcu;

wget http://ftp.ussg.iu.edu/linux/ubuntu/pool/main/m/memcached/memcached_1.5.10-0ubuntu1_amd64.deb;
dpkg -i memcached_1.5.10-0ubuntu1_amd64.deb;
apt install -y php-memcache php-memcached;

apt install -y php7.2-opcache libmemcached-tools;
systemctl restart memcached;

/etc/init.d/apache2 restart;

apt -y update;
apt -y upgrade;
# Referência - https://www.howtoforge.com/tutorial/perfect-server-ubuntu-18.04-with-apache-php-myqsl-pureftpd-bind-postfix-doveot-and-ispconfig/
