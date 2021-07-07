<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context         = Timber::context();
$timber_post     = Timber::get_post();
$context['post'] = $timber_post;

$context['related'] = Timber::get_posts([
    'post_type' => get_post_type(),
    'posts_per_page' => 6,
    'post__not_in' => [get_the_ID()],
    'tax_query' => [
        [
            'taxonomy' => 'section',
            'terms' => wp_list_pluck(get_the_terms(get_the_ID(), 'section'), 'term_id')
        ]
    ]
]);

$context['issues'] = Timber::get_posts([
    'post_type' => 'issue',
    'posts_per_page' => 3,
    'post__not_in' => [get_the_ID()]
]);

if ( post_password_required( $timber_post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single-' . $timber_post->slug . '.twig', 'single.twig' ), $context );
}
