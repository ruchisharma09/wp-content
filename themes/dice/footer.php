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
		<?php
		$recipe_args = array(
			'post_type'     => array( 'dice_recipe'),
			'post_status'   => 'publish',
			'post_per_page' => 2
		);

		$recipe_query->have_posts() ) {
			while ( $recipe_query->have_posts() ) {
				$recipe_query->the_post();
				the_post_thumbnail();
				the_title( '<h3>', '</h3>' );
				the_excerpt();
			}
			wp_reset_postdata();
		}
		?>
		
	   <div class="footer">
		   <section id="mainlink">
			<h5>Quick Links</h5>
				<a>Home</a>
				<a>Shop</a>
				<a>Blog</a>
				<a>About Us</a>
				<a>Contact Us</a>
		   </section>
		   <section id="mainlinkone">
			<h5>About Us</h5>
				<a>Privacy Policy</a>
				<a>Refund and Return</a>
		   </section>
		   <section id="mainlinktwo">
			<h5>Contact Us</h5>
				<a>2000 Simcoe St. North Oshawa, Ontario S1Q 3E1</a>
				<a>123-456-7890</a>
		   </section>
	   </div>
	</footer>

	<div class="copyright-text">Copyright © 2022 | DICE</div>

<?php wp_footer(); ?>

</body>
</html>
