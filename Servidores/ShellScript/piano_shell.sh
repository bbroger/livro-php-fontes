#!/bin/bash
# Piano shell v1.0
# Criado por: Raimundo Portela - rai3mb@gmail.com
#--------------------------------------------------
eval yad --form --columns=7 --title=\"Piano Shell\" --width=600 --button='Sair':1 \
	$( for letra in {A..G}
	do
		for i in {1..7}
		do
			echo "--field=\"$letra$i\":BTN \"play -n synth pl \"$letra$i\" delay 0 .9 1.1 .1 remix - fade 0 4 .1 norm -1\""
		done
	done)

