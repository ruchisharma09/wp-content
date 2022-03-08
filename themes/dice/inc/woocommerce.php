<?php
/**
 * Functions which enhance the theme by hooking into woocommerce
 *
 * @package Roll_Your_Dice
 */

 add_filter( 'use_block_editor_for_post_type', 'dice_use_block_editor_for_post_type', 10,2 )
