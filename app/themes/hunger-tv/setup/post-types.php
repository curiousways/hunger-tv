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
	'supports' => ['editor', 'revisions', 'thumbnail', 'title'],
	'taxonomies' => ['section', 'post_tag']
]);

register_post_type('article', [
	'labels' => [
		'name' => __('Features'),
		'singular_name' => __('Feature')
	],
	'public' => true,
	'publicly_queryable' => true,
	'menu_icon' => 'dashicons-images-alt2',
	'supports' => ['editor', 'revisions', 'thumbnail', 'title'],
	'rewrite' => ['slug' => 'feature'],
	'taxonomies' => ['section', 'post_tag']
]);

register_post_type('issue', [
	'labels' => [
		'name' => __('Issues'),
		'singular_name' => __('Issue')
	],
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => true,
	'menu_icon' => 'dashicons-book',
	'supports' => ['editor', 'excerpt', 'revisions', 'thumbnail', 'title'],
	'rewrite' => ['slug' => 'shop']
]);

register_post_type('team_member', [
	'labels' => [
		'name' => __('Team'),
		'singular_name' => __('Team Member')
	],
	'public' => true,
	'publicly_queryable' => false,
	'menu_icon' => 'dashicons-groups',
	'supports' => ['revisions', 'thumbnail', 'title']
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

register_taxonomy('department', 'team_member', [
	'labels' => [
		'name' => __('Department')
	],
	'publicly_queryable' => true,
	'hierarchical' => true
]);
