<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>


			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>
					
					<nav id="nav-single" class="cf">
						<span class="nav-previous alignleft"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> Previous', 'bloxy' ) ); ?></span>
						<span class="nav-next alignright"><?php next_post_link( '%link', __( 'Next <span class="meta-nav">&rarr;</span>', 'bloxy' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>