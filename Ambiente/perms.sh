#!/bin/sh
# Criado por Ribamar FS - https://ribafs.org
# Sintaxe: 
# sudo perms.sh nomedosubdir (varrerá somente o subdir do /var/www/html)
# sudo perms (varrerá todo o /var/www/html)
clear;
echo "Aguarde enquanto configuro as permissões do /var/www/html/$1";
echo "";
chown -R ribafs:www-data /var/www/html/$1;
find /var/www/html/$1 -type d -exec chmod 775 {} \;
find /var/www/html/$1 -type f -exec chmod 664 {} \;
echo "";
# Para quem usa CakePHP
# Manter bin/cake executável
file=/var/www/html/$1/bin/cake
if [ -f $file ];
then
    chmod +x $file
else
    echo Arquivo $file não existe
fi
echo "Concluído!";

