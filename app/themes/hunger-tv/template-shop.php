<?php

/**
 * Template Name: Shop
 */

$context = Timber::context();
$timber_post = new Timber\Post();
$context['post'] = $timber_post;

Timber::render('page-shop.twig', $context);
