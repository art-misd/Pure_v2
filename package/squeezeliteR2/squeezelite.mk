################################################################################
#
# squeezelite-2.0.0.1524-armhf
#
################################################################################

define SQUEEZELITER2_INSTALL_TARGET_CMDS
        cp $(BR2_EXTERNAL_PURE_PATH)/package/squeezeliteR2/squeezelite $(TARGET_DIR)/usr/bin/
endef

$(eval $(generic-package))
