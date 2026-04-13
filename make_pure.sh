#!/bin/bash

# Custom Buildroot linux image Pure (http://puredsd.ru/).

git clone https://github.com/buildroot/buildroot.git
cd buildroot

make BR2_EXTERNAL=../ pure_defconfig

export M4=/usr/bin/m4 # for build libtool and etc

make -j$(nproc)
