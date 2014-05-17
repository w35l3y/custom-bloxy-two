<?php
/**
* The template for displaying posts in the Quote Post Format on index and archive pages
*
* Learn more: http://codex.wordpress.org/Post_Formats
*
 */
?>

	<div id="post-<?php the_ID(); ?>"  <?php post_class('article'); ?>>
		<div class="head">
			<div class="date" title="<?php the_date(); ?>">
				<?php the_time('j'); ?><br /><?php the_time('M'); ?>
				<span class="post-format-icon"></span>
			</div>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bloxy' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		</div>
		
		<div class="content cf">

			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( '<span class="readmore">Continue reading</span>', 'bloxy' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bloxy' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<?php endif; ?>
			
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
				
				<?php if ( comments_open() ) : ?>
				<div class="coms"><?php comments_popup_link( __( 'Leave a reply', 'bloxy' ), __( '<b>1</b> Reply', 'bloxy' ), __( '<b>%</b> Replies', 'bloxy' ) ); ?></div>
				<?php endif; // End if comments_open() ?>
				
				
				
			</div>
		</div>
	</div>