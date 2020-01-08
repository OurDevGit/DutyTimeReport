<div class="cf_lightbox_cotainer">
    <label class="lightbox_trigger">
        <input type="checkbox" name="<?php echo $captainform_display_as_lightbox_name; ?>"
               class="cf_display_as_lightbox"
               value="1" <?php if (isset($display_as_lightbox) && ($display_as_lightbox == 1)): ?> checked="checked"<?php endif; ?>/>
        <span class="lightbox_trigger_text">
			<?php echo __('Display as a popup', 'captainform'); ?>
		</span>
    </label>
    <label class="customvars_trigger">
        <input type="checkbox" name="<?php echo $captainform_use_custom_vars_name; ?>"
               class="cf_use_custom_vars"
               value="1" <?php if (isset($use_custom_vars) && ($use_custom_vars == 1)): ?> checked="checked"<?php endif; ?>/>
        <span class="customvars_trigger_text">
			<?php echo __('Prefill form fields', 'captainform'); ?>

		</span>
        <div id="captainform-info-prefil" >
            <img class="captainform-info-prefil123" src="<?=plugin_dir_url(plugin_dir_path(__FILE__))?>/images/info_alert.png">

            <div class="powerTip_prefil">
                <p>Prefilled form fields do not work yet with forms published in popups.</p>
            </div>
        </div>
    </label>

    <div class="cf_triggers_container">
        <div class="cf_lightbox_title">
            <b><?php echo __('Popup trigger', 'captainform'); ?></b>
        </div>
        <div class="row">
            <div class="cf_trigger_option">
                <label>
                    <input type="radio"
                           name="<?php echo $captainform_trigger_option_name; ?>" <?php if ($captainform_selected_trigger == 0): ?> checked="checked" <?php endif; ?>
                           class="cf_trigger" value="0"/>
                    <?php echo __('Text', 'captainform'); ?>
                </label>
            </div>
            <div class="cf_trigger_option">
                <label>
                    <input type="radio" name="<?php echo $captainform_trigger_option_name; ?>"
                           class="cf_trigger" <?php if ($captainform_selected_trigger == 1): ?> checked="checked" <?php endif; ?>
                           value="1"/>
                    <?php echo __('Click on image', 'captainform'); ?>
                </label>
            </div>
            <div class="cf_trigger_option">
                <label>
                    <input type="radio" name="<?php echo $captainform_trigger_option_name; ?>"
                           class="cf_trigger" <?php if ($captainform_selected_trigger == 2): ?> checked="checked" <?php endif; ?>
                           value="2"/>
                    <?php echo __('Floating button', 'captainform'); ?>
                </label>
            </div>
            <div class="cf_trigger_option">
                <label>
                    <input type="radio" name="<?php echo $captainform_trigger_option_name; ?>"
                           class="cf_trigger" <?php if ($captainform_selected_trigger == 3): ?> checked="checked" <?php endif; ?>
                           value="3"/>
                    <?php echo __('Auto popup', 'captainform'); ?>
                </label>
            </div>
        </div>
        <div class="cf_trigger_selected_option_container_big">
            <div class="cf_trigger_selected_option_title">
                <?php echo __('Popup settings', 'captainform'); ?>
            </div>
            <div class="cf_trigger_selected_option_container cf_trigger_selected_option_cotainter_0">
                <!-- text -->
                <div class="left">
					<span class="label">
						<?php echo __('Text:', 'captainform'); ?>
					</span>
                </div>
                <div class="right">
                    <input type="text" name="<?php echo $captainform_trigger_0_name; ?>"
                           class="cf_trigger_selected_option cf_trigger_0_text"
                           value="<?php echo $captainform_trigger_0_text; ?>"/>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

            <div class="cf_trigger_selected_option_container cf_trigger_selected_option_cotainter_1">
                <!-- image -->
                <div class="left">
					<span class="label">
						<?php echo __('Image:', 'captainform'); ?>
					</span>
                </div>
                <div class="right">
                    <input type="text" name="<?php echo $captainform_trigger_1_name; ?>" class="cf_trigger_1_url"
                           value="<?php echo $captainform_trigger_1_url; ?>"/>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

            <div class="cf_trigger_selected_option_container cf_trigger_selected_option_cotainter_2">
                <!-- floating button -->
                <div class="left">
					<span class="label">
						<?php echo __('Text:', 'captainform'); ?>
					</span>
                </div>
                <div class="right">
                    <input type="text" name="<?php echo $captainform_trigger_2_text_name; ?>" class="cf_trigger_2_text"
                           value="<?php echo $captainform_trigger_2_text; ?>"/>
                </div>
                <div class="clear"></div>

                <div class="left">
					<span class="label">
						<?php echo __('Position:', 'captainform'); ?>
					</span>
                </div>
                <div class="cf_trigger_2_container right">
                    <label class="cf_trigger_2_label">
                        <input type="radio" name="<?php echo $captainform_trigger_2_position_name; ?>"
                               class="cf_trigger_2_position" <?php if ($captainform_trigger_2_position == 1): ?> checked="checked" <?php endif; ?>
                               value="1"/>
                        <?php echo __('Left', 'captainform'); ?>
                    </label>
                    <label class="cf_trigger_2_label">
                        <input type="radio" name="<?php echo $captainform_trigger_2_position_name; ?>"
                               class="cf_trigger_2_position" <?php if ($captainform_trigger_2_position == 2): ?> checked="checked" <?php endif; ?>
                               value="2"/>
                        <?php echo __('Right', 'captainform'); ?>
                    </label>
                    <label class="cf_trigger_2_label">
                        <input type="radio" name="<?php echo $captainform_trigger_2_position_name; ?>"
                               class="cf_trigger_2_position" <?php if ($captainform_trigger_2_position == 3): ?> checked="checked" <?php endif; ?>
                               value="3"/>
                        <?php echo __('Bottom', 'captainform'); ?>
                    </label>
                </div>
                <div class="clear"></div>

                <div class="left">
					<span class="label">
						<?php echo __('Background color:', 'captainform'); ?>
					</span>
                </div>
                <div class="right">
                    <input type="text" name="<?php echo $captainform_trigger_2_background_name; ?>"
                           class="color color-captainform cf_trigger_2_background_color"
                           value="<?php echo $captainform_trigger_2_background; ?>"/>
                </div>
                <div class="clear"></div>

                <div class="left">
					<span class="label">
						<?php echo __('Text color:', 'captainform'); ?>
					</span>
                </div>
                <div class="right">
                    <input type="text" name="<?php echo $captainform_trigger_2_color_name; ?>"
                           class="color color-captainform cf_trigger_2_color" value="<?php echo $captainform_trigger_2_color; ?>"/>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>

            <div class="cf_trigger_selected_option_container cf_trigger_selected_option_cotainter_3">
                <!-- auto popup -->
                <div class="cf_auto_popup_trigger_option">
                    <div>
                        <label>
                            <input
                                type="radio"
                                name="<?php echo $captainform_auto_popup_trigger_option_name; ?>"
                                class="captainform_auto_popup_trigger"
                                <?php if ($captainform_auto_popup_selected_trigger == 1): ?> checked="checked" <?php endif; ?>
                                value="1"
                            />
                            <?php echo __('After', 'captainform'); ?>
                            <input
                                type="text"
                                name="<?php echo $captainform_trigger_3_after_name; ?>"
                                class="cf_trigger_selected_option cf_trigger_2_time"
                                value="<?php echo $captainform_trigger_3_after; ?>"
                            />
                            <?php echo __('seconds', 'captainform'); ?>
                        </label>
                    </div>
                    <div>
                        <label>
                            <input
                                type="radio"
                                name="<?php echo $captainform_auto_popup_trigger_option_name; ?>"
                                class="captainform_auto_popup_trigger"
                                <?php if ($captainform_auto_popup_selected_trigger == 2): ?> checked="checked" <?php endif; ?>
                                value="2"/>
                            <?php echo __('When user leaves page', 'captainform'); ?>
                        </label>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </div>

    <div class="use_custom_vars_container">
       <div class="cf_lightbox_title">
           <?php echo __('Prefill form fields');?>
       </div>
        <div class="custom_vars_draw">

        </div>

    </div>
</div>