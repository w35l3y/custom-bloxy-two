<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archiv <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
<?php wp_head(); ?>
</head>

<body>

<!--[if lte IE 6]>
<div id="wrapperIE">
	<div id="IE" class="aligncenter">
        <p class="small">
        You are browsing with an old version of Internet Explorer (6 or lower).<br />
        To display this website properly (<strong>and</strong> increase browsing comfort and security) please update or grab one of these browsers:<br /> 
        <a href="http://getfirefox.com">Firefox</a>, <a href="http://google.com/chrome">Chrome</a>, <a href="http://opera.com">Opera</a>, <a href="http://apple.com/safari">Safari</a>.</p>
	</div>
</div> 
<![endif]-->

<div id="wrapperHead">
    <div id="head" class="aligncenter">
        <div id="nav">
        	<ul>
				<li<?php if ( is_home() || is_404() || is_category() || is_day() || is_month() || is_year() || is_search() ) { ?> class="current_page_item"<?php } ?>><a href="<?php echo get_settings('siteurl') ?>">Blog</a></li>
        		<?php wp_list_pages('title_li='); ?>
        	</ul>
        </div>
        <div id="rss">
        	<a href="<?php bloginfo('rss2_url'); ?>">Articles</a> &middot; <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a>
        </div>
        <div id="logo">
        	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
            <span id="blogDescription"><?php bloginfo('description'); ?></span>
        </div>
        <div id="search">
        	<form method="get" id="searchform" action="">
				<fieldset>
                	<label for="s"><input value="Search the blog..." onfocus="if(this.value=='Search the blog...') this.value=''" id="s" name="s" title="Enter keywords" type="text" /></label>
                	<label for="searchsubmit"><input src="<?php bloginfo('stylesheet_directory'); ?>/images/searchsubmit.png" name="searchsubmit" id="searchsubmit" value="" title="Suchen" type="image" /></label>
				</fieldset>
			</form>
        </div>
    </div>
</div>
<div id="wrapperBody">
    <div id="body" class="aligncenter">