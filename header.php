<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archiv <?php } ?> <?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-462297-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
        	<a href="<?php bloginfo('rss2_url'); ?>"><?php echo __('Articles') ?></a> &middot; <a href="<?php bloginfo('comments_rss2_url'); ?>"><?php echo 'Comments' ?></a>
        </div>
        <div id="logo">
        	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
            <span id="blogDescription"><?php bloginfo('description'); ?></span>
        </div>
		<?php get_search_form(); ?>
    </div>
</div>
<div id="wrapperBody">
    <div id="body" class="aligncenter">