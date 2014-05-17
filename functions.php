<?php
/**
 * Bloxy functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, bloxy_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 578;

/**
 * Tell WordPress to run bloxy_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'bloxy_setup' );

if ( ! function_exists( 'bloxy_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links and post formats.
 * @uses register_nav_menus() To add support for navigation menus.
 *
 */
function bloxy_setup() {

	/* Make the theme available for translation.
	 * Translations can be added to the /languages/ directory.
	 */
	load_theme_textdomain( 'bloxy', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Add default posts and comments RSS feed links to <head>.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'bloxy' ) );

	// Add support for a variety of post formats
	add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'video', 'audio', 'quote', 'image' ) );

}
endif; // bloxy_setup



/**
 * Sets the post excerpt length to 40 words.
 */
function bloxy_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'bloxy_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function bloxy_continue_reading_link() {
	return ' <a href="'. esc_url( get_permalink() ) . '">' . __( '<span class="readmore">Continue reading</span>', 'bloxy' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and bloxy_continue_reading_link().
 *
 */
function bloxy_auto_excerpt_more( $more ) {
	return ' &hellip;' . bloxy_continue_reading_link();
}
add_filter( 'excerpt_more', 'bloxy_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function bloxy_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= bloxy_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'bloxy_custom_excerpt_more' );

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function bloxy_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'bloxy_page_menu_args' );

/**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 */
function bloxy_widgets_init() {

	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'bloxy' ),
		'id' => 'sidebar-1',
		'description' => __( 'An orange widget area for your sidebar', 'bloxy' ),
		'before_widget' => '<li id="%1$s" class="widget sb-orange %2$s">', 
		'before_title'  => '<div class="sb-head"><h2>', 
		'after_title'   => '</h2></div><div class="sb-body">', 
		'after_widget'  => '</div><div class="sb-foot"></div></li>', 
	) );

	register_sidebar( array(
		'name' => __( 'Secondary Sidebar', 'bloxy' ),
		'id' => 'sidebar-2',
		'description' => __( 'A blue widget area for your sidebar', 'bloxy' ),
		'before_widget' => '<li id="%1$s" class="widget sb-blue %2$s">', 
		'before_title'  => '<div class="sb-head"><h2>', 
		'after_title'   => '</h2></div><div class="sb-body">', 
		'after_widget'  => '</div><div class="sb-foot"></div></li>', 
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area One', 'bloxy' ),
		'id' => 'sidebar-3',
		'description' => __( 'An optional widget area for your site footer (left)', 'bloxy' ),
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">', 
		'before_title' => '<h2 class="widgettitle">', 
		'after_title' => '</h2>', 
		'after_widget' => '</li></ul>', 
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Two', 'bloxy' ),
		'id' => 'sidebar-4',
		'description' => __( 'An optional widget area for your site footer (center)', 'bloxy' ),
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">', 
		'before_title' => '<h2 class="widgettitle">', 
		'after_title' => '</h2>', 
		'after_widget' => '</li></ul>', 
	) );

	register_sidebar( array(
		'name' => __( 'Footer Area Three', 'bloxy' ),
		'id' => 'sidebar-5',
		'description' => __( 'An optional widget area for your site footer (right)', 'bloxy' ),
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">', 
		'before_title' => '<h2 class="widgettitle">', 
		'after_title' => '</h2>', 
		'after_widget' => '</li></ul>', 
	) );
}
add_action( 'widgets_init', 'bloxy_widgets_init' );

if ( ! function_exists( 'bloxy_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function bloxy_content_nav( $nav_id ) {
	global $wp_query, $paged;
	
	if($paged == 0 || $paged == "") { $paged = 1; }
	
	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<?php if ($paged != 1) : ?>
				<div class="button right"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'bloxy' ) ); ?></div>
			<?php endif; ?>
			<?php if ($paged != $wp_query->max_num_pages) : ?>
				<div class="button left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'bloxy' ) ); ?></div>
			<?php endif; ?>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // bloxy_content_nav

/**
 * Return the URL for the first link found in the post content.
 *
 * @return string|bool URL or false when no link is present.
 */
function bloxy_url_grabber() {
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		return false;

	return esc_url_raw( $matches[1] );
}

if ( ! function_exists( 'bloxy_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 */
function bloxy_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<div class="cf">
			<div class="comment-author"><?php _e( 'Pingback:', 'bloxy' ); ?></div> 
			<div class="comment-text cf"><?php comment_author_link(); ?></div>
			<?php edit_comment_link( __( 'Edit', 'bloxy' ) ); ?>
		</div>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>" class="cf">
			<div class="comment-author vcard">
				<div class="avatar-frame"></div>
				<?php echo get_avatar( $comment, '50' ); ?>
				<p>		
					<?php printf( ('%s'), get_comment_author_link()) ?><br />
					<span>
					<?php /* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'bloxy' ), get_comment_date(), get_comment_time() )	
					?>
					</span>
					<?php edit_comment_link( __( 'Edit', 'bloxy' ) ); ?>
				</p>
			</div>
			<div class="comment-text cf">
				<div class="head"></div>
				<div class="arrow"></div>
				<div class="body">
				<?php if ($comment->comment_approved == '0') : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bloxy' ); ?></em>
					<br />
				<?php endif; ?>
	
				<?php comment_text() ?>
				</div>
				<div class="foot"></div>
			</div>
		</div>
	<?php
			break;
	endswitch;
}
endif; // ends check for bloxy_comment()

if ( ! function_exists( 'bloxy_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 */
function bloxy_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'bloxy' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bloxy' ), get_the_author() ) ),
		get_the_author()
	);
}
endif;

/**
 * Adds a class to the array of body classes.
 * If a singular post being displayed.
 *
 */
function bloxy_body_classes( $classes ) {

	if ( is_singular() && ! is_home() )
		$classes[] = 'singular';

	return $classes;
}
add_filter( 'body_class', 'bloxy_body_classes' );


/**
 * If a post has no post title, we set it to "Untitled".
 * This way the single-page post view is easily accessible.
 *
 */
function bloxy_title($title) {
    if ($title == '') {
        return 'Untitled';
    } else {
        return $title;
    }
}
add_filter('the_title', 'bloxy_title');

/**
 * Load the CSS file.
 *
 */
function bloxy_styles()  
{ 
  wp_register_style( 'style', 
    get_template_directory_uri() . '/style.css');

  // enqueing:
  wp_enqueue_style( 'style' );
}
add_action('wp_enqueue_scripts', 'bloxy_styles');

