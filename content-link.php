<?php
/**
 * The template for displaying posts in the Link Post Format on index and archive pages
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
			<h2 class="entry-title"><?php the_content(''); ?></h2>
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
