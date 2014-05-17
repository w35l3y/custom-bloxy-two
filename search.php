<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="firstHeading">Searchresults:</h2>
		
<div class="navigation">
    <div class="alignleft white"><?php next_posts_link('&laquo; Previous entries') ?></div>
    <div class="alignright white"><?php previous_posts_link('Next entries &raquo;') ?></div>
    <div class="clear"></div>
</div>

		<?php while (have_posts()) : the_post(); ?>

			<div class="articleHead">
        		<div class="articleDate"><?php the_time("d") ?><br /><?php the_time("M") ?></div>
        		<h2><a id="post-<?php the_ID(); ?>" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    		</div>
    		<div class="articleContent">
					<?php the_excerpt() ?>
			 </div>
    	<div class="articleFoot"></div>
		<?php endwhile; ?>

<div class="navigation">
    <div class="alignleft white"><?php next_posts_link('&laquo; Previous entries') ?></div>
    <div class="alignright white"><?php previous_posts_link('Next entries &raquo;') ?></div>
    <div class="clear"></div>
</div>

	<?php else : ?>

		<h2 class="firstHeading">Sorry, nothing found. Please try again.</h2>

	<?php endif; ?>
    
</div>
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>
