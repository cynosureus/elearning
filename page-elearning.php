<?php
/**
 * Template Name: elearning
 *
 * @package elearning
 */

redirect_logged_out_user();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php $products = bp_get_profile_field_data( array('user_id' => get_current_user_id(), 'field' => 2 ) ); ?>

				<?php $product_fields = retrieve_products($products); ?>
				

				<?php foreach ($product_fields as $key => $product): ?>
					
					<?php if ($key % 3 == 0): ?>
						<div class = "row">
					<?php endif; ?>

							<div class = "col-lg-3">
								<a href = "<?= $product['permalink'] ?>"><img src = "<?= $product['thumbnail'] ?>"></a>
								<h2><a href = "<?= $product['permalink'] ?>"><?= $product['title'] ?></a></h2>
							</div>

					<?php if ($key == end(array_keys($product_fields)) || (($key + 1) % 3 == 0)): ?>
						</div>
					<?php endif; ?>

				<?php endforeach; ?>

				<?= d(get_site_url()); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?> 