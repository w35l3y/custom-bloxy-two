<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content">

    <?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
    
    <div class="articleHead">
        <div class="articleDate"><?php the_time("d") ?><br /><?php the_time("M") ?></div>
        <div class="articleTitle">
        	<h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        </div>
    </div>
    <div class="articleContent">
        <?php the_content('&nbsp;'); ?>
        <!--<?php trackback_rdf(); ?>-->
        <div class="articleMeta">
            <span class="small alignleft tags"><?php the_tags(__('Tags') . ': ', ', ', '<br />'); ?></span> 
            <span class="small alignright author"><?php the_author() ?><?php edit_post_link(__('Edit'),' &middot; ',''); ?></span>
            <div class="clear"></div>
            <span class="small alignleft cat"><?php echo __('Category') ?>: <?php the_category(', ') ?></span>
            <span class="small alignright com"><?php comments_popup_link('0 comentários', '1 comentário', '% comentários');
			?></span>
            <div class="clear"></div>
        </div>
    </div>
    <div class="articleFoot"></div>
        
		<?php endwhile; ?>

<div class="navigation">
    <div class="alignleft white"><?php next_posts_link('&laquo; Previous entries') ?></div>
    <div class="alignright white"><?php previous_posts_link('Next entries &raquo;') ?></div>
    <div class="clear"></div>
</div>
		
	<?php else : ?>

	<h2 class="firstHeading">No posts found.</h2></div>

	<?php endif; ?>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
