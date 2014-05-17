<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="content">

		<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>				
		 <h2 class="firstHeading">Archive of category "<?php single_cat_title(); ?>"</h2>
		
 	  	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="firstHeading">Dayly archive: <?php the_time('j. F Y'); ?></h2>
		
	 	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="firstHeading">Monthly archive: <?php the_time('F Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="firstHeading">Yearly archive: <?php the_time('Y'); ?></h2>
				
	  	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="firstHeading">Author archive</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="firstHeading">Blog archive</h2>

		<?php } ?>

<div class="navigation">
    <div class="alignleft white"><?php next_posts_link('&laquo; Previous entries') ?></div>
    <div class="alignright white"><?php previous_posts_link('Next entries &raquo;') ?></div>
    <div class="clear"></div>
</div>
		
		<?php while (have_posts()) : the_post(); ?>

		<div class="articleHead">
        	<div class="articleDate"><?php the_time("d") ?><br /><?php the_time("M") ?></div>
        	<h2><a href="<?php the_permalink() ?>" rel="bookmark" id="post-<?php the_ID(); ?>" title="Permalink zu <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</div>
        <div class="articleContent">
				
					<?php the_excerpt() ?>
				
            <div class="articleMeta">
                <span class="small alignleft tags"><?php the_tags('Tags: ', ', ', '<br />'); ?></span> 
                <span class="small alignright author"><?php the_author() ?><?php edit_post_link('Edit',' &middot; ',''); ?></span>
                <div class="clear"></div>
                <span class="small alignleft cat">Category: <?php the_category(', ') ?></span> 					
                <span class="small alignright com"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?></span>
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

	<?php else :

		if (is_category()) // If this is a category archive
			printf("<h2 class=\"firstHeading\">Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		else if (is_date()) // If this is a daily archive
			echo("<h2 class=\"firstHeading\">Sorry, but there aren't any posts with this date.</h2>");
		else if (is_author()) { // If this is an author archive
			get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class=\"firstHeading\">Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		}
		else
			echo("<h2 class=\"firstHeading\">No posts found.</h2>");
		
	endif;
?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>