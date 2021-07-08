<?php

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$context['latest_news'] = Timber::get_posts([
	'post_type' => 'editorial',
	'posts_per_page' => 6,
	'tax_query' => [
		[
			'taxonomy' => 'section',
			'field' => 'slug',
			'terms' => 'news'
		]
	]
]);

Timber::render('front-page.twig', $context);
