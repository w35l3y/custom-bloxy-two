<?php
/**
 * The template for displaying search forms
 *
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<fieldset>
			<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'bloxy' ); ?>" />
			<label for="searchsubmit"><input src="<?php echo get_stylesheet_directory_uri(); ?>/img/search-head-submit.png" name="searchsubmit" id="searchsubmit" value="" title="<?php _e( 'Search', 'bloxy');?>" type="image" /></label>
		</fieldset>
	</form>
	
