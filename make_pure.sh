#!/bin/bash

# Custom Buildroot linux image Pure (http://puredsd.ru/).

git clone https://github.com/buildroot/buildroot.git
cd buildroot
#git checkout 3f0ee529083e972be9893676fab00ac50c2816c3
git checkout 39928bc9a6a92f0b4336cbef0dff492406fca576 # buildroot 2025.02.03

make BR2_EXTERNAL=../ pure_defconfig
#sed -i '/disable-jack/d' package/alsa-plugins/alsa-plugins.mk
#sed -i 's/1.2.6/1.2.2/'  package/alsa-plugins/alsa-plugins.mk
#sed -i 's/9.4.1/9.1.4/'  package/dhcpcd/dhcpcd.mk
#rm -f package/dhcpcd/dhcpcd.hash
#rm -f package/alsa-plugins/alsa-plugins.hash
make -j$(nproc)
