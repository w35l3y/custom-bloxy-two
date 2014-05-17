<?php

// Widgets

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar ORANGE',
		'before_widget' => '<li id="%1$s" class="widget %2$s">', 
		'after_widget'  => '</div><div class="sbBoxFoot specialFoot"></div></li>', 
		'before_title'  => '<div class="sbBoxHead specialHead"><h2>', 
		'after_title'   => '</h2></div><div class="sbBox specialBox">', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Sidebar BLUE',
		'before_widget' => '<li id="%1$s" class="widget %2$s">', 
		'after_widget'  => '</div><div class="sbBoxFoot"></div></li>', 
		'before_title'  => '<div class="sbBoxHead"><h2>', 
		'after_title'   => '</h2></div><div class="sbBox">', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Left Footer',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">', 
		'after_widget' => '</li></ul>', 
		'before_title' => '<h2 class="widgettitle">', 
		'after_title' => '</h2>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Middle Footer',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">', 
		'after_widget' => '</li></ul>', 
		'before_title' => '<h2 class="widgettitle">', 
		'after_title' => '</h2>', 
	));

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name' => 'Right Footer',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">', 
		'after_widget' => '</li></ul>', 
		'before_title' => '<h2 class="widgettitle">', 
		'after_title' => '</h2>', 
	));
	
// Comments
	
wp_list_comments(array('callback' => 'bloxy_comment'));
 
function bloxy_comment($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID( ); ?>">
 
    <div class="comment">
        <div class="commentUser">
        	<div class="gravatarFrame"></div> 
        	<div class="gravatar">
            	<?php echo get_avatar( $comment, $size = '50', $default ='' ); ?>
            </div>            
            <span class="small">
            	<span class="nick"><?php comment_author_link( ); ?></span><br />
            	<a href="#comment-<?php comment_ID( ); ?>"><?php comment_time('H:i'); ?>, <?php comment_date('d.m.Y'); ?></a><br />
                <?php edit_comment_link( __( 'Edit' ),'',''); ?><br />
                <?php echo comment_reply_link(array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['depth'])) ?>
            </span>
        </div>
        <div class="commentText">
            <div class="commentArrow"></div>
            <div class="commentTextHead"></div>
            <div class="commentTextContent">
                <?php comment_text( ); ?>
            </div>
            <div class="commentTextFoot"></div>
        </div>
    </div>
    <div class="clear"></div>
 
<?php
} ?>