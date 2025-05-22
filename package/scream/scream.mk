################################################################################
#
# apscream ver 3.4
#
################################################################################


define SCREAM_INSTALL_TARGET_CMDS
	cp $(BR2_EXTERNAL_PURE_PATH)/package/scream/scream $(TARGET_DIR)/usr/sbin/
	cp $(BR2_EXTERNAL_PURE_PATH)/package/scream/config.txt $(TARGET_DIR)/usr/sbin/
endef

$(eval $(generic-package))
