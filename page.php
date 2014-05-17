<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
 
        <div class="pageHead">
        	<h2><?php the_title(); ?></h2>
    	</div>
    	<div class="pageContent">
        	<?php the_content(''); ?>
            <?php edit_post_link('Edit entry &raquo;', '<p>', '</p>'); ?>
    	</div>
    	<div class="pageFoot"></div>
        
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	      				
	<?php endwhile; endif; ?>

</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
