<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>


<?php if ( have_comments() ) : ?>

	<h3 class="h3comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
    
	<div class="navigation">
		<div class="alignleft white"><?php previous_comments_link('&laquo; Previous comments') ?></div>
		<div class="alignright white"><?php next_comments_link('Next comments &raquo;') ?></div>
        <div class="clear"></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments('callback=bloxy_comment'); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft white"><?php previous_comments_link('&laquo; Previous comments') ?></div>
		<div class="alignright white"><?php next_comments_link('Next comments &raquo;') ?></div>
        <div class="clear"></div>
	</div>
    
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<h2 class="h3comments">Comments are closed.</h3>
        <div>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="respond">

<h3 class="h3comments"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h3>

<div class="cancel-comment-reply white">
	<?php cancel_comment_reply_link(); ?>
</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p class="white">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p class="white">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

<p class="white"><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p class="white"><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p class="white"><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p class="white"><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input src="<?php bloginfo('stylesheet_directory'); ?>/images/submit.png" name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />

<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>


<?php endif; // if you delete this the sky will fall on your head ?>