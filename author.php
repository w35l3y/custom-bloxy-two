<?php
/**
 * The template for displaying Author Archive pages.
 *
 */

get_header(); ?>

			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php
					/* Queue the first post, that way we know
					 * what author we're dealing with (if that is the case).
					 *
					 * We reset this later so we can run the loop
					 * properly with a call to rewind_posts().
					 */
					the_post();
				?>
				
				<h1 class="page-title author"><?php printf( __( 'Author Archives: %s', 'bloxy' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>

				<?php
					/* Since we called the_post() above, we need to
					 * rewind the loop back to the beginning that way
					 * we can run the loop properly, in full.
					 */
					rewind_posts();
				?>

				<?php
				// If a user has filled out their description, show a bio on their entries.
				if ( get_the_author_meta( 'description' ) ) : ?>
				<div class="article bio">
					<div class="head">
						<h2><?php printf( __( 'About %s', 'bloxy' ), get_the_author() ); ?></h2>
					</div>
					<div class="content">
						<div id="author-avatar">
							<div class="avatar-frame"></div>
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'bloxy_author_bio_avatar_size', 92 ) ); ?>
						</div><!-- #author-avatar -->
						<?php the_author_meta( 'description' ); ?>
					</div>
					<div class="foot">		
					</div>
				</div>

				<?php endif; ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
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