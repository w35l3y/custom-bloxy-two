<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php bloxy_content_nav( 'nav' ); ?>

			<?php else : ?>
				
				<div class="article page no-results not-found" id="post-0">
					<div class="head">
						<h2 class="entry-title"><?php _e( 'Nothing found.', 'bloxy' ); ?></h2>
					</div>
					<div class="content">
						<p><?php _e( 'Apologies, but the page you are looking for might have been removed, had its name changed or is temporarily unavailable. Perhaps searching will help find a related post.', 'bloxy' ); ?></p>
					</div>
					<div class="foot">		
					</div>
				</div>
				
			<?php endif; ?>

			</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>