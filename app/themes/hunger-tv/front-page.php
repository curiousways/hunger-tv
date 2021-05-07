<?php

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

$context['spotlight'] = Timber::get_posts([
	'post_type' => ['article', 'editorial'],
	'posts_per_page' => 6
]);

Timber::render('front-page.twig', $context);
