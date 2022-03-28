<?php
/**
 * Roll Your Dice Theme Customizer
 *
 * @package Roll_Your_Dice
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dice_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'dice_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'dice_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_panel( 'dice_social_media', array(
		'title' => esc_html__( 'Social Media', 'dice'),
	) );

	$wp_customize->add_section( 'dice_facebook', array(
		'title' => esc_html__( 'Facebook', 'dice'),
		'panel' => 'dice_social_media',
	) );

	$wp_customize->add_setting( 'dice_facebook_title' );

	$wp_customize-> add_control( 'dice_facebook_title', array(
		'label'       => 'Title',
		'description' => 'Enter your Facebook profile title',
		'type'        => 'url',
		'section'     => 'dice_facebook',
	) );

	$wp_customize->add_setting( 'dice_facebook_url' );

	$wp_customize-> add_control( 'dice_facebook_url', array(
		'label'       => 'URL',
		'description' => 'Enter your Facebook profile link',
		'type'        => 'url',
		'section'     => 'dice_facebook',
	) );

	$wp_customize->add_setting( 'dice_facebook_icon' );

	$wp_customize-> add_control( new WP_Customize_Media_Control( $wp_customize ,'dice_facebook_icon', array(
		'label'       => 'Icon',
		'section'     => 'dice_facebook',
	) ) );
	
}
add_action( 'customize_register', 'dice_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dice_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dice_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dice_customize_preview_js() {
	wp_enqueue_script( 'dice-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), DICE_VERSION, true );
}
add_action( 'customize_preview_init', 'dice_customize_preview_js' );
