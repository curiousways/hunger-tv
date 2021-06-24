<?php

function filtered_posts($ignore_ids) {
	// echo $ignore_ids;

	$posts = new WP_Query([
		'post_type' => ['article', 'editorial'],
		'posts_per_page' => 6,
		'post__not_in' => $ignore_ids
	]);

	while ($posts->have_posts()) {
		echo '<div class="col md:6 lg:4">';
		$posts->the_post();
		include (locate_template('templates/includes/card.php'));
		echo '</div>';
	}
}

include_once 'setup/timber.php';
include_once 'setup/post-types.php';
include_once 'setup/legacy.php';
