#!/bin/sh
clear
echo
echo "===================     Curso Prático de Linux Ubuntu - DNOCS     ===================="
echo
echo "===============     Entre com o nome da imagem ISO do CD ou DVD     ==============\n\n"
read imagem
sudo dd if=/dev/cdrom of=$imagem.iso
exit 0

