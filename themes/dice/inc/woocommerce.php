<?php
/**
 * Functions which enhance the theme by hooking into woocommerce
 *
 * @package Roll_Your_Dice
 */

 /**
  * Allow block editor for single products
  */

function dice_use_block_editor_for_post_type( $use_block_editor, $post_type ) {
    if ( 'product' === $post_type ) {
        $use_block_editor = true;
    }
    return $use_block_editor;
}
 add_filter( 'use_block_editor_for_post_type', 'dice_use_block_editor_for_post_type', 10,2 );