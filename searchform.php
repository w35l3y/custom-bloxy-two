<div id="search">
	<form method="get" id="searchform" action="<?php echo home_url( '/' ) ?>">
		<fieldset>
			<label for="s"><input value="<?php echo $search = __('Search the blog...') ?>" onfocus="if(this.value=='<?php echo $search ?>') this.value=''" id="s" name="s" title="Enter keywords" type="text" /></label>
			<label for="searchsubmit"><input src="<?php bloginfo('stylesheet_directory'); ?>/images/searchsubmit.png" name="searchsubmit" id="searchsubmit" value="" title="Search" type="image" /></label>
		</fieldset>
	</form>
</div>