NAA_VERSION = 6.1.1-69_armhf
NAA_SITE = $(BR2_EXTERNAL_PURE_PATH)/package/naa
NAA_SITE_METHOD = local
NAA_LICENSE = Proprietary
NAA_LICENSE_FILES = data/usr/share/doc/networkaudiod/copyright

define NAA_INSTALL_TARGET_CMDS
    cp -a $(@D)/data/* $(TARGET_DIR)/
endef

$(eval $(generic-package))
