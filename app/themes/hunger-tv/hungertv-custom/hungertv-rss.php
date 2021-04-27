<?php
function hungertv_add_image_to_feed($content, $feed_type="") {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ){
    $content = '<p>' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '</p>' . $content;
  }
  return $content;
}

add_filter('the_excerpt_rss', 'hungertv_add_image_to_feed', 10, 2);
add_filter('the_content_feed', 'hungertv_add_image_to_feed', 10, 2);

function hungertv_feed_features() {
  load_template( TEMPLATEPATH . '/feed-features.php');
}
add_action('do_feed_features', 'hungertv_feed_features', 10, 1);

function hungertv_feed_all_blogs() {
  load_template( TEMPLATEPATH . '/feed-all_blogs.php');
}
add_action('do_feed_all_blogs', 'hungertv_feed_all_blogs', 10, 1);

function hungertv_feed_rewrite($wp_rewrite) {
  $feed_rules = array(
    'feed/(.+)' => 'index.php?feed=' . $wp_rewrite->preg_index(1),
  );
  $wp_rewrite->rules = $feed_rules + $wp_rewrite->rules;
}
add_filter('generate_rewrite_rules', 'hungertv_feed_rewrite');

function hungertv_feed_atom_thumbnail() {
  global $post;
  if ( has_post_thumbnail( $post->ID ) ){
    $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'slideshow');
    $image = get_post(get_post_thumbnail_id($post->ID));
    if ( $attachment ) {
      echo '<link rel="enclosure" type="' . $image->post_mime_type . '" href="' . $attachment[0] . '" />';
    }
  }

}

/*
// set the default feed to atom
add_filter('default_feed','atom_default_feed');
function atom_default_feed() { return 'atom'; }

// remove the rdf and rss 0.92 feeds (nobody ever needs these)
remove_action( 'do_feed_rdf', 'do_feed_rdf', 10, 1 );
remove_action( 'do_feed_rss', 'do_feed_rss', 10, 1 );

// point those feeds at rss 2 (it is backwards compatible with both of them)
add_action( 'do_feed_rdf', 'do_feed_rss2', 10, 1 );
add_action( 'do_feed_rss', 'do_feed_rss2', 10, 1 );
*/
remove_all_actions( 'do_feed_rss2' );

add_action( 'do_feed_rss', 'hungertv_feed_default_template', 10, 1 );
add_action( 'do_feed_atom', 'hungertv_feed_default_template', 10, 1 );
add_action( 'do_feed_rss2', 'hungertv_feed_default_template', 10, 1 );
function hungertv_feed_default_template( $for_comments ) {
  if (get_queried_object() && get_class(get_queried_object()) == "WP_User") {
    $rss_template = get_template_directory() . '/feed-author.php';
  } else {
    $rss_template = get_template_directory() . '/feed-atom.php';
  }

  if(file_exists( $rss_template ) )
      load_template( $rss_template );
  else
      do_feed_atom( $for_comments ); // Call default function
}
