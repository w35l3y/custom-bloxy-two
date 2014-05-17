<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
		</div>
    <div class="clear"></div>
</div>
<div id="wrapperFoot">
	<div id="foot" class="aligncenter">
    	<span id="copy" class="aligncenter">
			<?php bloginfo('name'); ?> is powered by <a href="http://wordpress.org/">WordPress</a>
             &middot; 
            free <a href="http://www.arcance.net/" title="Arcance.net">Bloxy Two</a> theme by <a href="http://www.arcance.net/" title="Arcance.net">Arcance</a>
        </span>
		<div class="footBox alignleft">
        	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Left Footer') ) : else : ?><?php endif; ?> 
        </div>
    	<div class="footBox alignright">
        	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Footer') ) : else : ?><?php endif; ?> 
        </div>
		<div class="footBox aligncenter">
        	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Middle Footer') ) : else : ?><?php endif; ?> 
        </div>
        <div class="clear"></div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>