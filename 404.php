<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

get_header(); ?>

		<div id="content" role="main">
		
		
			<div class="article page no-results not-found" id="post-0">
				<div class="head">
					<h2 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'bloxy' ); ?></h2>
				</div>
				<div class="content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps one of the links below can help. You might also try searching in the right upper corner.', 'bloxy' ); ?></p>
					
					<div class="recent"><?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?></div>
					
					<div class="categories">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'bloxy' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>
					<div class="cf"></div>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					
				</div>
				<div class="foot">		
				</div>
			</div>
			
		</div><!-- #content -->
	</div>

<?php get_footer(); ?>