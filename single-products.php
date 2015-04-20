<?php
/*
** Product Template
*/
?>


<?php redirect_logged_out_user(); ?>

<?php get_header(); ?>

<script>

jQuery(document).ready(function() {

	jQuery(".files-dropdown-item").click(function(link) {

		link.preventDefault();

		button = jQuery(jQuery(this).parent().parent().siblings()[0]);
		//ul = jQuery(jQuery(this).parent().parent());
		li = jQuery(this).parent();
		button.text(li.text());	

		button.append('<span class = "caret"></span>');

		media_id = getIdFromSelect(button.attr('id'));


		jQuery('#material-preview-link-' + media_id).attr('href', jQuery(this).attr('href'));
		jQuery('#material-download-link-' + media_id).attr('href', jQuery(this).attr('href'));
		jQuery('#material-download-link-' + media_id).attr('download', getFileName(jQuery(this).attr('href')));

	
	});


	function getIdFromSelect(select_id){

		parts = select_id.split('-');
		id = parts.pop();

		return id;

	}

	function getFileName(file_url)
	{
		
		parts = file_url.split('/');
		file = parts.pop();
		parts = file.split('.');
		file_name = parts.shift();

		return file_name;

	}
});


</script>

	





<?php global $post; ?>
<?php $items_per_row = 3; ?>

<div class = "product-logo">
	<img src = "<?= get_post_meta($post->ID, 'wpcf-product-logo', true) ?>"  style = "max-width: 280px; height: auto;">
</div>

<div class = "instructions">
	<span class = "instructions-link">Click <a href="http://localhost/amps_marketing_materials/instructions/" onclick="javascript:void window.open('http://localhost/amps_marketing_materials/instructions/','1418672820344','width=700,height=500,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">here</a> for instructions.</span>
</div>



<div class = "row main-area-content">
	<div class = "col-lg-3 sidebar">
		<?php get_sidebar(); ?>	

	</div>
	<div class = "col-lg-9 materials-wrapper">

		<div class = "row materials-container">
			<?php $materials = new Cynosure_Material_Data_Set($post->ID); ?>

			<?php if($_GET): ?>

				<?php $materials->get_materials($_GET); ?>

			<?php else: ?>

				<?php $materials->get_all(); ?>
				

			<?php endif; ?>

			<?php

				$args = array(

						'items' => $materials->materials,
						'items_per_page' => 9,
						'page' => $page

					);

				$test = new Cynosure_Paginator($args);

				

			?>

			<?php foreach($test->items_on_page() as $material): ?>

				<?php $material = get_post($material); ?>

				<?php $display = new Amps_Content_Display($material); ?>

				<?php if($count % $items_per_row == 0): ?>

					<div class = "row product-row">
						
						<?= $display->contentBoxHTML($items_per_row, $post->ID); ?>

					<?php else: ?>

						<?= $display->contentBoxHTML($items_per_row, $post->ID); ?>

				<?php endif; ?>

				<?php if(($count+1) % $items_per_row == 0 || $count == count($materials->materials) - 1): ?>

					</div> <!-- end of product-row -->

				<?php endif; ?>

				<?php $count = $count + 1; ?>

			<?php endforeach; ?>

	

		</div><!-- end of materials-container -->
	</div><!-- end of materials-wrapper -->

	<?= $test->display_pagination(); ?>

</div><!-- end of main-area-content -->



<?php get_footer(); ?>