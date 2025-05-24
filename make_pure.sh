#!/bin/bash

# Custom Buildroot linux image Pure (http://puredsd.ru/).

git clone https://github.com/buildroot/buildroot.git
cd buildroot
git checkout 39928bc9a6a92f0b4336cbef0dff492406fca576 # buildroot 2025.02.03

make BR2_EXTERNAL=../ pure_defconfig
make -j$(nproc)
