<?php

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
		'name' => __('Shop'),
		'singular_name' => __('Issue')
	],
	'public' => true,
	'publicly_queryable' => true,
	'has_archive' => true,
	'menu_icon' => 'dashicons-book',
	'supports' => ['editor', 'excerpt', 'revisions', 'thumbnail', 'title'],
	'rewrite' => ['slug' => 'shop/issues']
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

// Add the excerpt to pages
add_post_type_support('page', 'excerpt');

// Add default tags to custom post types
// Source: https://wordpress.stackexchange.com/a/163785
function _mghd_add_tags_to_cpts() {
	register_taxonomy_for_object_type('post_tag', 'article');
	register_taxonomy_for_object_type('post_tag', 'editorial');
};
add_action('init', '_mghd_add_tags_to_cpts');
