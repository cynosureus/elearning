<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package elearning
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class = "footer-top row"></div>
		<div class="footer-middle left-padding row">
			<div class = "col-lg-6">
				<div class = "footer-logo">
					<img src = "<?= get_template_directory_uri() . '/images/logo-cynosure2.png'; ?>">
				</div>

				<address class = "footer-address">
					<p>5 Carlisle Road</p>
					<p>Westford, MA 01886</p>
				</address>
			</div>
		</div><!-- .site-info -->
		<div class = "footer-bottom left-padding row">
			<div class = "col-lg-6">
				
				<ul class = "legal">
					<li>© Copyright 2014 Cynosure, Inc. All Rights Reserved </li>
					<li>Terms & Conditions</li>
					<li>Privacy Policy</li>
				</ul>
			</div>
		</div>

		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
