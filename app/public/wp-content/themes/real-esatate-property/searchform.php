<form method="get" id="searchform" class="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<input placeholder="<?php esc_attr_e('Type here...', 'real-esatate-property'); ?>" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
	<input type="submit" class="search-submit" value="<?php esc_attr_e('Search', 'real-esatate-property');?>" />
</form>
<a class="close-search-form" href="#close-search-form"><i class="fa fa-times searchform-close-button"></i></a>