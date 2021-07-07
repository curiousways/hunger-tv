<?php

function filtered_posts($ignore_ids) {
	// echo $ignore_ids;
	$context = Timber::context();

	$latest_news = Timber::get_posts([
		'post_type' => ['article', 'editorial'],
		'posts_per_page' => 6,
		'post__not_in' => $ignore_ids
	]);

	// while ($latest_news->have_posts()) {
	foreach ($latest_news as $post) {
		echo '<div class="col md:6 lg:4">';
		// $latest_news->the_post();
		// include (locate_template('templates/includes/card.php'));

		$timber_post = new Timber\Post();
		$context['post'] = $timber_post;
		Timber::render('includes/card.twig', $context);
		echo '</div>';
	}
}

include_once 'setup/timber.php';
include_once 'setup/images.php';
include_once 'setup/post-types.php';
include_once 'setup/legacy.php';
include_once 'setup/filter-posts.php';
