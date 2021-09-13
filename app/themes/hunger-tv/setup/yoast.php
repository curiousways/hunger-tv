<?php

function _mghd_social_image($image) {
	$hero_image = get_field('hero_image', get_the_ID());

	if ($hero_image
		&& !has_post_thumbnail()
		&& !is_archive()
		&& !is_home()) $image = $hero_image['url'];

	return $image;
}
add_filter('wpseo_opengraph_image', '_mghd_social_image');
add_filter('wpseo_twitter_image', '_mghd_social_image');
