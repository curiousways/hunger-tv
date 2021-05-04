<?php

add_post_type_support('page', 'excerpt');

register_post_type('editorial', [
	'labels' => [
		'name' => __('Editorials'),
		'singular_name' => __('Editorial')
	],
	'public' => true,
	'publicly_queryable' => true,
	'menu_icon' => 'dashicons-media-document',
	'supports' => ['title', 'editor', 'thumbnail', 'slug', 'revisions']
]);
