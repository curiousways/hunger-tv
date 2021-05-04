<?php

add_post_type_support('page', 'excerpt');

// Post types

register_post_type('editorial', [
	'labels' => [
		'name' => __('Editorials'),
		'singular_name' => __('Editorial')
	],
	'public' => true,
	'publicly_queryable' => true,
	'menu_icon' => 'dashicons-media-document',
	'supports' => ['title', 'editor', 'thumbnail', 'slug', 'revisions'],
	'taxonomies' => ['section']
]);

register_post_type('article', [
	'labels' => [
		'name' => __('Features'),
		'singular_name' => __('Feature')
	],
	'public' => true,
	'publicly_queryable' => true,
	'menu_icon' => 'dashicons-images-alt2',
	'supports' => ['title', 'editor', 'thumbnail', 'slug', 'revisions', 'comments', 'post-formats'],
	'rewrite' => ['slug' => 'feature'],
	'taxonomies' => ['section']
]);

register_post_type('issue', [
	'labels' => [
		'name' => __('Issues'),
		'singular_name' => __('Issue')
	],
	'public' => true,
	'publicly_queryable' => true,
	'menu_icon' => 'dashicons-book',
	'supports' => ['title', 'editor', 'thumbnail', 'revisions']
]);

// Taxonomies

register_taxonomy('section', ['article', 'editorial'], [
	'publicly_queryable' => true,
	'hierarchical' => true,
	'rewrite' => [
		'slug' => '/',
		'hierarchical' => false,
		'with_front' => false
	]
]);
