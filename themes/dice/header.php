<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Roll_Your_Dice
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<header id="masthead" class="site-header">

		<div class="site-branding">
			<!-- Customized Logo -->
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$dice_description = get_bloginfo( 'description', 'display' );
			if ( $dice_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $dice_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'dice' ); ?></button>
			<!-- Made if statement primary-menu to display content-->
			<!-- Only print menu-primary -->
			<?php 
			if ( has_nav_menu ( 'menu-primary' ) ) {
			wp_nav_menu(
				array(
					'theme_location' => 'menu-primary',
					'menu_id'        => 'primary-menu',
				)
			);
		}
           // Made if statement menu-social to display content
			if ( has_nav_menu ( 'menu-social' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'menu-social',
					)
				);
	     	}
			?>
            
			<!-- Social Media Linked -->
			<ul class="social-media-menu">
				<?php if ( ! empty( get_theme_mod( 'dice_facebook_url') ) && ! empty( get_theme_mod( 'dice_facebook_title') ) ) { ?>
				<li>
                 <a href="<?php echo esc_url( get_theme_mod( 'dice_facebook_url') ); ?>">
				 <?php
				  if ( ! empty(get_theme_mod( 'dice_facebook_icon') ) ) {
					  echo wp_get_attachment_image( get_theme_mod( 'cwd_facebook_icon' ), array( '30', '30' ) );
				  } else {
                      echo get_theme_mod( 'cwd_facebook_title' );
				  }
				  ?>
				 </a>
				</li>
				<?php }?>
		    </ul>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
