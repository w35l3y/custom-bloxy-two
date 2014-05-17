<?php
/**
 * The template used for displaying page content in page.php
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('article page'); ?>>
	<div class="head">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</div>
	<div class="content cf">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bloxy' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div>
	<div class="foot">		
	</div>
</div>

