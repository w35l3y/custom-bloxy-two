<?php
/**
 * The template for displaying the footer.
 */
?>

</div>
<div id="footer-wrapper">
	<p id="colophon" role="contentinfo">
		<!-- 
		Bloxy Two WordPress Theme, Copyright 2012 Stefan Kroeber (Arcance.net).
		Bloxy Two is distributed under the terms of the GNU GPL v3.
		-->
		<?php /*
		It is completely optional, but if you like the Theme I would appreciate it if you keep the credit link at the bottom. 
		*/?>
	
		<?php bloginfo('name'); ?>
		<?php echo ' '.__('is powered by','bloxy') . ' <a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a> ' . __('and the free <a href="www.arcance.net/freebies/bloxy-two" title="Get this and more free WordPress themes, too">Bloxy Two</a> theme.', 'bloxy')
		?>
	</p>
	<div id="footer" class="cf">
		<div class="third">
			<?php 
				if ( ! dynamic_sidebar('sidebar-3') )
			?>
		</div>
		<div class="third">
			<?php 
				if ( ! dynamic_sidebar('sidebar-4') )
			?>
		</div>
		<div class="third">
			<?php 
				if ( ! dynamic_sidebar('sidebar-5') )
			?>
		</div>
	</div>
</div>


	<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
	?>
</body>
</html>