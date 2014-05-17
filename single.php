<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
<div id="content">
	
	<div class="articleHead">
        <div class="articleDate"><?php the_time("d") ?><br /><?php the_time("M") ?></div>
        <h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    </div>
    <div class="articleContent">
		<?php the_content(''); ?>

		 <!--<?php trackback_rdf(); ?>-->

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	      				
		<div class="articleMeta">
            <span class="small alignleft tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></span> 
            <span class="small alignright author"><?php the_author() ?><?php edit_post_link('Edit',' &middot; ',''); ?></span>
            <div class="clear"></div>
            <span class="small alignleft cat">Category: <?php the_category(', ') ?></span> 					
            <span class="small alignright com"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span>
            <div class="clear"></div>
            <span class="small options">
            	<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// comments and trackbacks allowed ?>
							You are allowed to <a href="#respond">post a comment</a> or to set <a href="<?php trackback_url(true); ?>" rel="trackback">Trackback</a>.
						
				<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// trackbacks allowed ?>
							Comments are not allowed, but you can set a <a href="<?php trackback_url(true); ?> " rel="trackback">Trackback</a>.
						
				<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// comments allowed ?>
							You are allowed to <a href="#respond">post a comment</a>. Setting a Trackback is not allowed.
			
				<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// both not allowed ?>
							You are not allowed to post a comment or set a Trackback.
            	<?php } ?>
        	</span>
        </div>
    </div>
    <div class="articleFoot"></div>

	<?php comments_template(); ?>
</div>
</div>
	<?php endwhile; else: ?>
    	<div id="content">

        	<h2 class="firstHeading">No posts found.</h2>

		</div>
<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
