#!/bin/bash

PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin
echo "Digite um mac valido no formato: ff:dd:aa:dd:aa:12"
read MAC

if [[ $MAC =~ ^[0-9A-Fa-f]{2}:[0-9A-Fa-f]{2}:[0-9A-Fa-f]{2}:[0-9A-Fa-f]{2}:[0-9A-Fa-f]{2}:[0-9A-Fa-f]{2}$ ]]
then

echo "o mac digitado é um mac valido"

else

echo "o mac digitado é um mac invalido"
fi

exit 0

