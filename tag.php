<?php
/**
 * The template used to display Tag Archive pages
 *
 */

get_header(); ?>

			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s', 'bloxy' ), '<span>' . single_tag_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$tag_description = tag_description();
						if ( ! empty( $tag_description ) )
							echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
					?>
				</header>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 */
						get_template_part( 'content', get_post_format() );
					?>

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
