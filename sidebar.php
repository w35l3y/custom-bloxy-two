<div id="sidebar">

	<ul>
    
    	<?php 
			if (!function_exists('dynamic_sidebar') || ((int)dynamic_sidebar('Right Sidebar ORANGE') + (int)dynamic_sidebar('Right Sidebar BLUE')) == 0) {
    	?>
        
		<li>
        	<div class="sbBoxHead specialHead">
            	<h2>Hey there!</h2>
            </div>
            <div class="sbBox specialBox">
            	<p>Welcome on <?php bloginfo('name'); ?>!</p>
                <p>Reading is nice, discussing is even better - feel free to comment if you want to say something. If you like this blog, you can also grab the RSS feed for <a href="<?php bloginfo('rss2_url'); ?>">articles</a> and <a href="<?php bloginfo('comments_rss2_url'); ?>">comments</a>.
            </div>
            <div class="sbBoxFoot specialFoot">
            </div> 
        </li>
        
        <li>
        	<div class="sbBoxHead">
            	<h2>Categories</h2>
			</div>
            <div class="sbBox">
            <ul>
				<?php wp_list_categories('show_count=1&title_li'); ?>
            </ul>
			</div>
			<div class="sbBoxFoot">
            </div>
        </li>
        
        <li>
        	<div class="sbBoxHead">
            	<h2>Archive</h2>
			</div>
            <div class="sbBox">
            <ul>
				<?php wp_get_archives('type=monthly'); ?>
            </ul>
			</div>
			<div class="sbBoxFoot">
            </div>
        </li>
        
        <li>
        	<div class="sbBoxHead">
            	<h2>Meta</h2>
			</div>
            <div class="sbBox">
            <ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
				<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
				<li><a href="http://wordpress.org/" title="WordPress">WordPress</a></li>
				<?php wp_meta(); ?>
            </ul>
			</div>
			<div class="sbBoxFoot">
            </div>
        </li>
        
		<?php } ?> 
	</ul>
	
</div>



