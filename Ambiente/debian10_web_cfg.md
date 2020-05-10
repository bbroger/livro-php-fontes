sudo nano /etc/php/7.3/apache2/php.ini

display_error = On
error_reporting = E_ALL # comentar o existente
output_buffering = On

sudo nano /etc/apache2/apache2.conf

ServerName localhost

Mudar as ocorrenciasn de 
AllowOverride none
Para
AllowOverride All

<Directory />
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Order deny,allow
    Allow from all
</Directory>

sudo service apache2 restart

== Adicionar ribafs ao sudoers, para que possa executar comandos com sudo
nano /etc/sudoers

Adicione a linha a seguir abaixo da linha do root
ribafs ALL=(ALL) NOPASSWD:ALL

== Executar comandos com sudo sem que seja exigida a senha
Executar no terminal

sudo bash -c 'echo "$(logname) ALL=(ALL:ALL) NOPASSWD: ALL" | (EDITOR="tee -a" visudo)'


== Configurar mysql resetaando senha root. Mas antes testar se já funciona normalmente

sudo mysql -uroot
USE mysql;
UPDATE user SET plugin='mysql_native_password' WHERE User='root';
UPDATE user SET authentication_string=PASSWORD("root") WHERE User='root';
FLUSH PRIVILEGES;
exit;

sudo service mysql restart
mysql -uroot -proot

== Criar senha do postgres e liberar acesso no pg_hba
sudo su
su - postgres
psql
alter role postgres password 'postgres';
\q
exit
nano /etc/postgresql/11/main/pg_hba.conf

Mudar 
local   all             postgres                                peer

Para
local   all             postgres                                md5

sudo service postgresql restart

== Instalar nodejs 12
curl -sL https://deb.nodesource.com/setup_12.x | sudo -E bash -
sudo apt install -y nodejs


