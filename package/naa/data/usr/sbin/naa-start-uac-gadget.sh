#!/bin/sh
#
# starts and configures UAC2 gadget
# Copyright (C) 2017-2023 Jussi Laako / Signalyst. All rights reserved.
#
modprobe libcomposite
modprobe usb_f_uac2
#
echo "" >/sys/kernel/config/usb_gadget/audio/UDC
rm -rf /sys/kernel/config/usb_gadget/audio/configs/c.1/uac2.0
#
mkdir /sys/kernel/config/usb_gadget/audio
echo 0x1d6b >/sys/kernel/config/usb_gadget/audio/idVendor
echo 0x0101 >/sys/kernel/config/usb_gadget/audio/idProduct
mkdir -p /sys/kernel/config/usb_gadget/audio/strings/0x409
echo "0" >/sys/kernel/config/usb_gadget/audio/strings/0x409/serialnumber
echo "Linux Foundation" >/sys/kernel/config/usb_gadget/audio/strings/0x409/manufacturer
echo "USB Audio Gadget" >/sys/kernel/config/usb_gadget/audio/strings/0x409/product
# function 1
mkdir /sys/kernel/config/usb_gadget/audio/configs/c.1
echo 500 >/sys/kernel/config/usb_gadget/audio/configs/c.1/MaxPower
mkdir /sys/kernel/config/usb_gadget/audio/functions/uac2.0
echo "44100,48000,88200,96000,176400,192000,352800,384000" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/c_srate
echo 4 >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/c_ssize
echo "0" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/c_volume_present
echo "0" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/c_mute_present
# uncomment following for 12 channel input
#echo "4095" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/c_chmask
echo "44100,48000,88200,96000,176400,192000,352800,384000" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/p_srate
echo 4 >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/p_ssize
echo "0" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/p_volume_present
echo "0" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/p_mute_present
echo "0" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/p_chmask
echo "HQPlayer" >/sys/kernel/config/usb_gadget/audio/functions/uac2.0/function_name
ln -s /sys/kernel/config/usb_gadget/audio/functions/uac2.0 /sys/kernel/config/usb_gadget/audio/configs/c.1/
# enable by tying to a port from /sys/class/udc
echo $1 >/sys/kernel/config/usb_gadget/audio/UDC
sleep 1
