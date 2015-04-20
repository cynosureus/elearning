<?php
/**
 * Front Page of elearning site.
 *
 * This is the front page of the e learning website.
 *
 * @package elearning
 */

if(is_user_logged_in()) { 
	wp_redirect( get_option('siteurl') . '/home' );
}

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?= wp_login_form(array('redirect' => site_url('/home'))); ?>
				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>