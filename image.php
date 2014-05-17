<?php
/**
 * The template for displaying image attachments.
 */

get_header(); ?>

			<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
			
			
				<div id="post-<?php the_ID(); ?>"  <?php post_class('article page'); ?>>
					<div class="head">
						<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bloxy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					</div>
					
					<div class="content cf">
						
						<div class="entry-content">
							<div class="entry-attachment">
								<div class="attachment">
									<?php
										/**
										 * Grab the IDs of all the image attachments in a gallery so we can get the URL of the next adjacent image in a gallery,
										 * or the first image (if we're looking at the last image in a gallery), or, in a gallery of one, just the link to that image file
										 */
										$attachments = array_values( get_children( array( 'post_parent' => $post->post_parent, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID' ) ) );
										foreach ( $attachments as $k => $attachment ) {
											if ( $attachment->ID == $post->ID )
												break;
										}
										$k++;
										// If there is more than 1 attachment in a gallery
										if ( count( $attachments ) > 1 ) {
											if ( isset( $attachments[ $k ] ) )
												// get the URL of the next image attachment
												$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
											else
												// or get the URL of the first image attachment
												$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
										} else {
											// or, if there's only 1 image, get the URL of the image
											$next_attachment_url = wp_get_attachment_url();
										}
									?>
									<a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
									$attachment_size = apply_filters( 'bloxy_attachment_size', 570 );
									echo wp_get_attachment_image( $post->ID, array( $attachment_size, 1024 ) ); // filterable image width with 1024px limit for image height.
									?></a>

									<?php if ( ! empty( $post->post_excerpt ) ) : ?>
									<div class="entry-caption">
										<p><?php the_excerpt(); ?></p>
									</div>
									<?php endif; ?>
								</div><!-- .attachment -->

							</div><!-- .entry-attachment -->

							<?php
								$metadata = wp_get_attachment_metadata();
								printf( __( '<span class="meta-prep meta-prep-entry-date">Published </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'bloxy' ),
									esc_attr( get_the_time() ),
									get_the_date(),
									esc_url( wp_get_attachment_url() ),
									$metadata['width'],
									$metadata['height'],
									esc_url( get_permalink( $post->post_parent ) ),
									esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
									get_the_title( $post->post_parent )
								);
							?>
							
							<div class="nav">
								<div class="alignleft"><?php previous_image_link( false , __('&larr; Previous image', 'bloxy') ) ?></div>
								<div class="alignright"><?php next_image_link( false , __('Next image &rarr;', 'bloxy') ) ?></div>
								<div class="clear"></div>
							</div>
						</div><!-- .entry-content -->
						
					</div>
					<div class="meta cf">
						<div class="top"></div>
						<div class="left">
							<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$tags_list = get_the_tag_list( '', __( ', ', 'bloxy' ) );
								if ( $tags_list ): ?>
							<div class="tags">
								<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'bloxy' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
							</div>
							<?php endif; // End if $tags_list ?>
							<?php
								/* translators: used between list items, there is a space after the comma */
								$categories_list = get_the_category_list( __( ', ', 'bloxy' ) );
								if ( $categories_list ):
							?>
							<div class="cats">
								<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'bloxy' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
								$show_sep = true; ?>
							</div>
							<?php endif; // End if categories ?>
							<?php endif; // End if 'post' == get_post_type() ?>		
						</div>
						<div class="right">
							<div class="author"><?php the_author() ?><?php edit_post_link(__(' &middot; Edit This', 'bloxy"')); ?></div>				
							
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div><!-- #content -->
		</div>

<?php get_footer(); ?>