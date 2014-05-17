<?php
/**
 * The Sidebar containing the main widget area.
 *
 */

?>
<div id="sidebar" class="widget-area" role="complementary">
	<ul>	
		<?php if ( ! ( dynamic_sidebar( 'sidebar-1' ) + dynamic_sidebar( 'sidebar-2' ) ) == true) : ?>

			<li class="sb-orange">
				<div class="sb-head">
			    	<h2><?php _e( 'Hey there!', 'bloxy'); ?></h2>
			    </div>
			    <div class="sb-body">
			    	<p><?php _e( 'Welcome on', 'bloxy');?> <?php bloginfo('name'); ?>!</p>
			        <p><?php _e( 'Your visit is highly esteemed. Please feel free to comment and join the discussion. You can also grab the', 'bloxy'); ?> <a href="<?php bloginfo('rss2_url'); ?>"><?php _e( 'RSS feed', 'bloxy'); ?></a>.
			    </div>
			    <div class="sb-foot">
			    </div> 
			</li>
			<li class="sb-blue">
				<div class="sb-head">
			    	<h2><?php _e( 'Categories', 'bloxy'); ?></h2>
				</div>
			    <div class="sb-body">
			    <ul>
					<?php wp_list_categories('show_count=1&title_li'); ?>
			    </ul>
				</div>
				<div class="sb-foot">
			    </div>
			</li>
			
			<li class="sb-blue">
				<div class="sb-head">
			    	<h2><?php _e( 'Monthly Archive', 'bloxy'); ?></h2>
				</div>
			    <div class="sb-body">
			    <ul>
					<?php wp_get_archives('type=monthly'); ?>
			    </ul>
				</div>
				<div class="sb-foot">
			    </div>
			</li>
			
			<li class="sb-blue">
				<div class="sb-head">
			    	<h2><?php _e( 'Meta', 'bloxy'); ?></h2>
				</div>
			    <div class="sb-body">
			    <ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="<?php bloginfo('rss2_url'); ?>"><?php _e( 'Entries RSS', 'bloxy'); ?></a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e( 'Comments RSS', 'bloxy'); ?></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
			    </ul>
				</div>
				<div class="sb-foot">
			    </div>
			</li>
			
		<?php endif; // end sidebar widget area ?>

	</ul>
</div><!-- #sidebar .widget-area -->
