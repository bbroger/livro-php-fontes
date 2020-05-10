#!/bin/bash

HOSTNAME=`hostname`
DATE="`date +%d/%m/%Y``date +%H:%M:%S`"
REPORTFILE=$HOSTNAME.html
AUDITDATE="`date +%Y%m%d``date +%H%M%S`"
SYSTEMNAME=`uname -s`
SYSTEMVERSION=`uname -r`
AUDIT_BY=`whoami`


#Operating System
name=`uname -s`
version=`uname -r`
OS_DISTRIBUTION="Ubuntu"
OS_RELEASE=`cat /etc/issue`


if [ "$OS_RELEASE" = "Ubuntu 5.10 \n \l" ]
then
  OS_RELEASE="5.10 (Breezy Badger)"
fi
if [ "$OS_RELEASE" = "Ubuntu 6.06 LTS \n \l" ]
then
  OS_RELEASE="6.06 (Dapper Drake)"
fi
if [ "$OS_RELEASE" = "Ubuntu 6.10 \n \l" ]
then
  OS_RELEASE="6.10 (Edgy Eft)"
fi
if [ "$OS_RELEASE" = "Ubuntu 7.04 \n \l" ]
then
  OS_RELEASE="7.04 (Fiesty Fawn)"
fi
if [ "$OS_RELEASE" = "Ubuntu 7.10 \n \l" ]
then
  OS_RELEASE="7.10 (Gutsy Gibbon)"
fi
if [ "$OS_RELEASE" = "Ubuntu 10.04 \n \l" ]
then
  OS_RELEASE="10.04 (Lucid Lynx)"
fi

# System Info
PC=`hal-find-by-property --key info.product --string Computer`
PC_MANUFACTURER=`hal-get-property --udi $PC --key system.vendor`
PC_MODEL=`hal-get-property --udi $PC --key system.product`
PC_TYPE=`hal-get-property --udi $PC --key system.formfactor`
PC_UUID=`hal-get-property --udi $PC --key smbios.system.uuid`
PC_SERIAL=`hal-get-property --udi $PC --key smbios.system.serial`
PC_BIOS_DATE=`hal-get-property --udi $PC --key smbios.bios.release_date`
PC_BIOS_VERSION=`hal-get-property --udi $PC --key smbios.bios.version`
PC_KERNEL_TYPE=`hal-get-property --udi $PC --key system.kernel.machine`
PC_KERNEL_VERSION=`hal-get-property --udi $PC --key system.kernel.version`
PC_CHASSIS=`hal-get-property --udi $PC --key smbios.chassis.type`
PC_COUNTRY=`cat /etc/timezone`
PC_TIMEZONE=`date +%:z`
RAM_SIZE_KB=`cat /proc/meminfo | grep MemTotal |cut -d: -f2 | cut -dk -f1`
RAM_SIZE_KB=`expr $RAM_SIZE_KB / 1`
RAM_SIZE_KB=`expr $RAM_SIZE_KB / 1024`
CPU_NUMBER=`cat /proc/cpuinfo | grep "processor" | wc -l`
CPU_NAME=`cat /proc/cpuinfo | grep "model name" | cut -d: -f2 | cut -c2- | tr "\n" "^" | cut -d^ -f1`
CPU_SPEED=`cat /proc/cpuinfo | grep "cpu MHz" | cut -d: -f2 | cut -c2- | cut -d. -f1 | tr "\n" "^" | cut -d^ -f1`
CPU_MANUFACTURER=`cat /proc/cpuinfo | grep "vendor_id" | cut -d: -f2 | cut -c2- | tr "\n" "^" | cut -d^ -f1`
CPU_SPEEDSTEP=`lshal --long --show /org/freedesktop/Hal/devices/acpi_CPU0 | grep processor.can_throttle | cut -d" " -f5 | cut -d"'" -f2`
if [ "$PC_UUID" = "Not" ]
then
  PC_UUID="$HOSTNAME"
fi

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"> " > $REPORTFILE
echo "<html>" >> $REPORTFILE
echo "<head>" >> $REPORTFILE
echo "<title>Open-AudIT - Audit Result</title>" >> $REPORTFILE
echo "<style type=\"text/css\">" >> $REPORTFILE
echo "body {" >> $REPORTFILE
echo " font-family: verdana;" >> $REPORTFILE
echo " font-size: 9pt;" >> $REPORTFILE
echo "}" >> $REPORTFILE
echo "h1,h2 {" >> $REPORTFILE
echo " font-family: Trebuchet MS;" >> $REPORTFILE
echo "}" >> $REPORTFILE
echo ".content {" >> $REPORTFILE
echo " position: relative;" >> $REPORTFILE
echo " width: 600px;" >> $REPORTFILE
echo " min-width: 700px;" >> $REPORTFILE
echo " margin: 0 0px 10px 0px;" >> $REPORTFILE
echo " border: 1px solid black;" >> $REPORTFILE
echo " background-color: white;" >> $REPORTFILE
echo " padding: 10px;" >> $REPORTFILE
echo " z-index: 3;" >> $REPORTFILE
echo " font-family: verdana;" >> $REPORTFILE
echo " font-size: 9pt;" >> $REPORTFILE
echo "}" >> $REPORTFILE
echo "</style>" >> $REPORTFILE
echo "</head>" >> $REPORTFILE
echo "<body>" >> $REPORTFILE
echo "<h1>Open Audit</h1><br />" >> $REPORTFILE
echo "<div id=\"content\">" >> $REPORTFILE
echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
echo "<tr><td colspan=\"2\"><b>System Information</b></td></tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td width=\"250\">System Name: </td><td>$HOSTNAME</td></tr>" >> $REPORTFILE
echo "<tr><td>Distribution: </td><td>$OS_DISTRIBUTION - $OS_RELEASE</tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>Linux Kernel: </td><td>$PC_KERNEL_VERSION</td></tr>" >> $REPORTFILE
echo "<tr><td>Linux Kernal Type: </td><td>$PC_KERNEL_TYPE</tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>System Manufacturer: </td><td>$PC_MANUFACTURER</td></tr>" >> $REPORTFILE
echo "<tr><td>System Type: </td><td>$PC_TYPE</td></tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>System Model - Serial: </td><td>$PC_MODEL - $PC_SERIAL</tr>" >> $REPORTFILE
echo "<tr><td>System UUID: </td><td>$PC_UUID</tr>" >> $REPORTFILE
echo "</table>" >> $REPORTFILE



# System Hardware
echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
echo "<tr><td colspan=\"2\"><b>Hardware Information</b></td></tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>Number of Processors: </td><td>$CPU_NUMBER</td></tr>" >> $REPORTFILE
echo "<tr><td width=\"250\">Processor Speed: </td><td>$CPU_SPEED Mhz</td></tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>Processor Name: </td><td>$CPU_NAME</td></tr>" >> $REPORTFILE
echo "<tr><td>Processor Manufacturer: </td><td>$CPU_MANUFACTURER</td></tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>Processor SpeedStep Capable: </td><td>$CPU_SPEEDSTEP</td></tr>" >> $REPORTFILE
echo "<tr><td>Amount of Memory</td><td>$RAM_SIZE_KB Mb<td></tr>" >> $REPORTFILE
echo "<tr bgcolor=\"#F1F1F1\"><td>System Bios Date: </td><td>$PC_BIOS_DATE</tr>" >> $REPORTFILE
echo "<tr><td>System Bios Version: </td><td>$PC_BIOS_VERSION</td></tr>" >> $REPORTFILE
# Graphic Card
PCILIST=`lspci -vm`
PERIF=`lspci -vm | grep "[[:digit:]]:[[:digit:]]" | cut -f2`
for i in $PERIF; do
  PCI_TYPE=`echo "$PCILIST" | grep -w $i -A 4 | grep -w "Class:" | cut -d":" -f2 | cut -f2`
  PCI_NAME=`echo "$PCILIST" | grep -w $i -A 4 | grep -v "[[:digit:]]:[[:digit:]]" | grep -w "Device:" | cut -d":" -f2 | cut -f2`
  PCI_MANUFACTURER=`echo "$PCILIST" | grep -w $i -A 4 | grep -w "Vendor:" | cut -d":" -f2 | cut -f2`
  PCI_DEVICE_ID=`echo $i`
  if [ "$PCI_TYPE" = "VGA compatible controller" ]
  then
    echo "<tr bgcolor=\"#F1F1F1\"><td>Video Card Namufacturer</td><td>$PCI_MANUFACTURER</td></tr>" >> $REPORTFILE
    echo "<tr><td>Video Card Name: </td><td>$PCI_NAME</td></tr>" >> $REPORTFILE
  fi
done
for i in `hal-find-by-property --key linux.subsystem --string sound`
do
  SOUND_PARENT=`hal-get-property --udi $i --key info.parent`
done
SOUND_CARD=`hal-get-property --udi $SOUND_PARENT --key info.product`
SOUND_VENDOR=`hal-get-property --udi $SOUND_PARENT --key info.vendor`
echo "<tr bgcolor=\"#F1F1F1\"><td>Sound Card Namufacturer</td><td>$SOUND_VENDOR</td></tr>" >> $REPORTFILE
echo "<tr><td>Sound Card Name: </td><td>$SOUND_CARD</td></tr>" >> $REPORTFILE


#Network
echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
echo "<tr><td colspan=\"2\"><b>Network Information</b></td></tr>" >> $REPORTFILE
NET_DNS=`cat /etc/resolv.conf | grep "nameserver" | cut -d" " -f2`
echo "<tr bgcolor=\"#F1F1F1\"><td width=\"250\">Network Name: </td><td>$HOSTNAME</td></tr>" >> $REPORTFILE
echo "<tr><td>DNS Server: </td><td>$NET_DNS</td></tr>" >> $REPORTFILE
#Network detection
echo "<tr><td colspan=\"2\"><br /><b>Network Adapters</b></td></tr>" >> $REPORTFILE
for i in `hal-find-by-property --key linux.subsystem --string net`
do
  NET_PARENT=`hal-get-property --udi $i --key info.parent`
  NET_NAME=`hal-get-property --udi $i --key net.interface`
  NET_MAC=`hal-get-property --udi $i --key net.address`
  NET_DESCRIPTION=`hal-get-property --udi $i --key info.product`
  NET_DEVICE=`hal-get-property --udi $NET_PARENT --key info.product`
  NET_MANUFACTURER=`hal-get-property --udi $NET_PARENT --key info.vendor`
  NET_IP=`ifconfig $NET_NAME | grep -w inet | cut -d":" -f2 | cut -d" " -f1`
  NET_IPV6=`ifconfig $NET_NAME | grep -w inet6 | cut -d" " -f13`
  NET_SUBNET=`ifconfig $NET_NAME | grep -w inet | cut -d":" -f4 | cut -d" " -f1`
  echo "<tr bgcolor=\"#F1F1F1\"><td>Adapter: </td><td><b>$NET_NAME</b> - $NET_DESCRIPTION</td></tr>" >> $REPORTFILE
  echo "<tr><td>Description: </td><td>$NET_DEVICE</td></tr>" >> $REPORTFILE
  echo "<tr bgcolor=\"#F1F1F1\"><td>Network Adapter Manufacturer</td><td>$NET_MANUFACTURER</td></tr>" >> $REPORTFILE
  echo "<tr><td>MAC Address: </td><td>$NET_MAC</td></tr>" >> $REPORTFILE
  if [ "$NET_IP" != "" ]
  then
    echo "<tr bgcolor=\"#F1F1F1\"><td>IP Address: </td><td>$NET_IP</td></tr>" >> $REPORTFILE
    echo "<tr><td>Subnet: </td><td>$NET_SUBNET</td></tr>" >> $REPORTFILE
    echo "<tr bgcolor=\"#F1F1F1\"><td>IPv6: </td><td>$NET_IPV6</td></tr>" >> $REPORTFILE 
  fi
  echo "<tr><td><br /> </td><td></td></tr>" >> $REPORTFILE
done
echo "</table>" >> $REPORTFILE
echo "</div>" >> $REPORTFILE



# Hard Disks
echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
echo "<tr><td colspan=\"2\"><b>Hard Drives</b></td></tr>" >> $REPORTFILE
for i in `hal-find-by-property --key storage.drive_type --string disk`
do
  DISK_VENDOR=`hal-get-property --udi $i --key storage.vendor`
  DISK_PATH=`hal-get-property --udi $i --key block.device`
  DISK_MODEL=`hal-get-property --udi $i --key storage.model`
  DISK_SIZE=`hal-get-property --udi $i --key storage.size`
  let "DISK_SIZE = $DISK_SIZE / 1024 / 1024 / 1024"
  DISK_SERIAL=`hal-get-property --udi $i --key storage.serial`
  echo "<tr bgcolor=\"#F1F1F1\"><td width=\"250\">Manufacturer: </td><td>$DISK_VENDOR</td></tr>" >> $REPORTFILE
  echo "<tr><td>Model: </td><td>$DISK_MODEL</td></tr>" >> $REPORTFILE
  echo "<tr bgcolor=\"#F1F1F1\"><td>Serial: </td><td>$DISK_SERIAL</td></tr>" >> $REPORTFILE
  echo "<tr><td>Size: </td><td>$DISK_SIZE Gb</td></tr>" >> $REPORTFILE
  echo "<tr bgcolor=\"#F1F1F1\"><td>Path: </td><td>$DISK_PATH</td></tr>" >> $REPORTFILE
  echo "<tr><td><br /> </td><td></td></tr>" >> $REPORTFILE
done
echo "</table>" >> $REPORTFILE


# Optical Drives
echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
echo "<tr><td colspan=\"2\"><b>Optical Drives</b></td></tr>" >> $REPORTFILE
for i in `hal-find-by-property --key storage.drive_type --string cdrom`
do
  CD_VENDOR=`hal-get-property --udi $i --key storage.vendor`
  CD_PATH=`hal-get-property --udi $i --key block.device`
  CD_PRODUCT=`hal-get-property --udi $i --key storage.model`
  CD_BUS=`hal-get-property --udi $i --key storage.bus`
  CD_MOUNT=`hal-get-property --udi $i --key linux.fstab.mountpoint`
  echo "<tr bgcolor=\"#F1F1F1\"><td width=\"250\">Manufacturer: </td><td>$CD_VENDOR</td></tr>" >> $REPORTFILE
  echo "<tr><td>Model: </td><td>$CD_PRODUCT</td></tr>" >> $REPORTFILE
  echo "<tr bgcolor=\"#F1F1F1\"><td>Bus: </td><td>$CD_BUS</td></tr>" >> $REPORTFILE
  echo "<tr><td>Path: </td><td>$CD_PATH</td></tr>" >> $REPORTFILE
  echo "<tr bgcolor=\"#F1F1F1\"><td>Mount Point: </td><td>$CD_MOUNT</td></tr>" >> $REPORTFILE
  echo "<tr><td><br /> </td><td></td></tr>" >> $REPORTFILE
done
echo "</table>" >> $REPORTFILE


#Volumes
echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
echo "<tr><td colspan=\"2\"><b>Volumes</b></td></tr>" >> $REPORTFILE
for i in `hal-find-by-property --key info.category --string volume`
do
  VOLUME_TYPE=`hal-get-property --udi $i --key volume.fstype`
  VOLUME_SIZE=`hal-get-property --udi $i --key volume.size`
  let "VOLUME_SIZE = $VOLUME_SIZE / 1024 / 1024"
  VOLUME_MOUNTED=`hal-get-property --udi $i --key volume.is_mounted`
  VOLUME_PATH=`hal-get-property --udi $i --key block.device`
  if [ "$VOLUME_MOUNTED" = "true" ]
  then
    VOLUME_MOUNT_POINT=`hal-get-property --udi $i --key volume.mount_point`
  else
    VOLUME_PATH=""
  fi
  VOLUME_LABEL=`hal-get-property --udi $i --key volume.label`
  if [ "$VOLUME_TYPE" != "" ]
  then
    echo "<tr bgcolor=\"#F1F1F1\"><td width=\"250\">Volume Label: </td><td>$VOLUME_LABEL</td></tr>" >> $REPORTFILE
    echo "<tr><td>Volume Mounted: </td><td>$VOLUME_MOUNTED</td></tr>" >> $REPORTFILE
    echo "<tr bgcolor=\"#F1F1F1\"><td>Volume Filesystem Type: </td><td>$VOLUME_TYPE</td></tr>" >> $REPORTFILE
    echo "<tr><td>Volume Size: </td><td>$VOLUME_SIZE Mb</td></tr>" >> $REPORTFILE
    echo "<tr bgcolor=\"#F1F1F1\"><td>Volume Filesystem Path: </td><td>$VOLUME_PATH</td></tr>" >> $REPORTFILE
    if [ "$VOLUME_MOUNTED" = "true" ]
    then
      echo "<tr><td>Volume Mount Point: </td><td>$VOLUME_MOUNT_POINT</td></tr>" >> $REPORTFILE
    fi
    echo "<tr><td><br /> </td><td></td></tr>" >> $REPORTFILE
  fi
done
echo "</table>" >> $REPORTFILE



# Software
if [ "$OS_DISTRIBUTION" = "Ubuntu" ]
then
  echo "<table border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"content\">" >> $REPORTFILE
  echo "<tr><td colspan=\"2\"><b>Software</b></td></tr>" >> $REPORTFILE
  echo "<tr><td width=\"250\"><i>Name of Package</i></td><td><i>Version</i></td></tr>" >> $REPORTFILE
  TR_BACK="#FFFFFF"
  packages="apt azureus bash build-essential cdparanoia cdrdao cdrecord cpp cron cupsys cvs dbus dhcp3-client diff dpkg epiphany-browser esound evolution firefox flashplugin-nonfree foomatic-db g++ gaim gcc gdm gedit gimp gnome-about gnucash gnumeric gtk+ httpd inkscape iptables k3b kdebase koffice libgnome2-0 linux-image-386 metacity mozilla-browser mysql-admin mysql-query-browser mysql-server-4.1 nautilus openoffice.org openssh-client openssh-server perl php4 php5 postfix postgresql python python2.4 rdesktop rhythmbox samba-common sendmail smbclient subversion sun-j2re1.5 swf-player synaptic thunderbird tsclient udev vim vlc vnc-common webmin xfce xmms xserver-xorg"
  for name in $packages; do
    version=`dpkg --list | grep "  $name " |tail -n1|awk '{print $3}' 2> /dev/null`
    if [ "$version" ]
    then
      if [ "$TR_BACK" = "#F1F1F1" ]
      then
        TR_BACK="#FFFFFF"
      else
        TR_BACK="#F1F1F1"
      fi
      echo "<tr bgcolor=\"$TR_BACK\"><td>$name</td><td>$version</td></tr>" >> $REPORTFILE
    fi
  done
  echo "</table>" >> $REPORTFILE
fi



exit 0 
