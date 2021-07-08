<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'archive.twig', 'index.twig' );

$context = Timber::context();

$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
} elseif ( is_month() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'M Y' );
} elseif ( is_year() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'Y' );
} elseif ( is_tag() ) {
	// $context['title'] = single_tag_title( '', false );
	$context['title'] = get_the_archive_title();
} elseif ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} elseif ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
} elseif ( is_tax() ) {
	$context['title'] = get_the_archive_title();
}

$context['posts'] = new Timber\PostQuery();

$context['first_post'] = Timber::get_posts([
	'post_type' => ['article', 'editorial'], // Can't use get_post_type() here as nothing is returned on tag archives
	'posts_per_page' => 1,
	'tax_query' => [
		[
			'taxonomy' => get_queried_object()->taxonomy,
			'terms' => get_queried_object()->term_id
		]
	]
]);

$context['first_issue'] = Timber::get_posts([
	'post_type' => 'issue',
	'posts_per_page' => 1
]);

Timber::render( $templates, $context );
