<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Roll_Your_Dice
 */

?>

	<footer id="colophon" class="site-footer">
    <h2 class="custom-posts">Archives</h2>

	<!-- WP_Query custom posts -->
	<!-- WP_Query  this is mainly used display blog posts in Footer -->
	<?php
			$test_args = array( 
						'post_type' => 'post',         
						'post_status'=> 'publish',         
						'posts_per_page' => 3 );
						
				$test_query = new WP_Query($test_args); 
				
				if($test_query->have_posts()){         
						while ($test_query->have_posts()){             
								$test_query->the_post();  
					?>
					<div class="cell large-4 wpquery-post">
					<h2><a class="wp-post-title" href="<?php the_permalink() ?>"><?php the_title()?></a></h2>
						<?php
							the_post_thumbnail( $size = ["300px","400px"], $attr = '' ); 
						?>
						<?php           
							the_excerpt();
						?>
					</div>
						<?php
						}               
				} 
				?>

        	
		<!-- Custom Post Type with active archive template -->
		<!-- WP_Query  this is mainly used display offer posts in Footer -->
		<h2 class="custom-posts">Special Offers</h2>
    	<?php
		$recipe_args = array(
			'post_type'     => array( 'dice_offer'), 
			'post_status'   => 'publish',
			'post_per_page' => 3,
			'orderby'       => 'rand'
		);

		$recipe_query = new WP_Query( $recipe_args );
		if ($recipe_query->have_posts() ) {
         ?>
		  <div class="grid-container custom-posts">
		   <div class=" grid-x grid-margin-x grid-margin-y custom-posts">
			  <?php
				while ( $recipe_query->have_posts()) {
					$recipe_query->the_post();
					the_title( '<h2>','</h2>' );
					the_excerpt();
					the_post_thumbnail();
					?>
				</div>
				<?php
				}
				wp_reset_postdata();/** wp_reset_postdata() to reset things */
				?>
		 </div>
		<?php } ?>

		<!-- Footer CopyText -->
	    <div class="copyright-text">Copyright © 2022 | DICE</div>

<?php wp_footer(); ?>

</body>
</html>
