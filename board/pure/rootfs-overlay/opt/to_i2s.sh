#!/bin/sh

chattr -i /etc/asound.conf
cp -f /etc/asound.botic /etc/asound.conf
sed -i 's/serconfig=..--/serconfig=MM--/' /boot/uEnv.txt
sed -i 's/snd_soc_davinci_mcasp.amanero_mute_pins=8/snd_soc_davinci_mcasp.amanero_mute_delay=500 snd_soc_davinci_mcasp.amanero_mute_pins=8/' /boot/uEnv.txt
sed -i 's/USB/BOTIC/' /boot/uEnv.txt
sed -i 's/am335x-boneblack.dtb/am335x-boneblack-botic.dtb/' /boot/uEnv.txt
echo MM-- > /sys/module/snd_soc_botic/parameters/serconfig
echo I2S > /etc/output
chattr +i /etc/asound.conf
sync
sleep 1
reboot -f









