<?php do_action( 'bp_before_profile_edit_content' );

if ( bp_has_profile( 'profile_group_id=' . bp_get_current_profile_group_id() ) ) :
	while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

<form action="<?php bp_the_profile_group_edit_form_action(); ?>" method="post" id="profile-edit-form" class="standard-form <?php bp_the_profile_group_slug(); ?>">

	<?php do_action( 'bp_before_profile_field_content' ); ?>

		<h4><?php printf( __( "Editing '%s' Profile Group", "buddypress" ), bp_get_the_profile_group_name() ); ?></h4>

		<?php if ( bp_profile_has_multiple_groups() ) : ?>
			<ul class="button-nav">

				<?php bp_profile_group_tabs(); ?>

			</ul>
		<?php endif ;?>

		<div class="clear"></div>

		<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>
		
			<div<?php bp_field_css_class( 'editfield' ); ?>>



				<?php
				$field_type = bp_xprofile_create_field_type( bp_get_the_profile_field_type() );
				$field_type->edit_field_html();
				

				
				do_action( 'bp_custom_profile_edit_fields_pre_visibility' );
				?>

				

				<?php do_action( 'bp_custom_profile_edit_fields' ); ?>

				<p class="description"><?php bp_the_profile_field_description(); ?></p>
			
			</div>

		<?php endwhile; ?>

	<?php do_action( 'bp_after_profile_field_content' ); ?>

	<div class="submit">
		<input type="submit" name="profile-group-edit-submit" id="profile-group-edit-submit" value="<?php esc_attr_e( 'Save Changes', 'buddypress' ); ?> " />
	</div>

	<input type="hidden" name="field_ids" id="field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

	<?php wp_nonce_field( 'bp_xprofile_edit' ); ?>

</form>

<?php 

	$user = get_userdata(get_current_user_id());
	$roles = $user->roles;

?>

	<?php if (!in_array('administrator', $roles)): ?>

		<script>
			products = jQuery('[name="field_2[]"]');

			jQuery.each(products, function(index, product) {

				jQuery(product).attr("disabled", true);

			});
		</script>

	<?php endif; ?>


<?php endwhile; endif; ?>

<?php do_action( 'bp_after_profile_edit_content' ); ?>
