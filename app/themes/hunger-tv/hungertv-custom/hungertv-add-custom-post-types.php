<?php
add_action('init', 'hungertv_cposttype_init' );
if ( ! function_exists( 'hungertv_cposttype_init' ) ) {
  function hungertv_cposttype_init() {
    $args = array(
      'labels' => array(
          'name' => _x('Features', 'post type general name'),
          'singular_name' => _x('Feature', 'post type singular name'),
          'add_new' => _x('Add New', 'feature'),
          'add_new_item' => __('Add New Feature'),
          'edit_item' => __('Edit Feature'),
          'new_item' => __('New Feature'),
          'view_item' => __('View Feature'),
          'search_items' => __('Search Feature'),
          'not_found' =>  __('No features found'),
          'not_found_in_trash' => __('No features found in trash'),
          'parent_item_colon' => '',
          'menu_name' => 'Features'
        ),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => 'article',
      'has_archive' => true,
      'hierarchical' => false,
      'rewrite' => true,
      'menu_position' => 4,
      'capability_type' => 'article',
      'capabilities' => array(
        'publish_posts' => 'publish_articles',
        'edit_posts' => 'edit_articles',
        'edit_others_posts' => 'edit_others_articles',
        'edit_published_posts' => 'edit_published_articles',
        'delete_posts' => 'delete_articles',
        'delete_others_posts' => 'delete_others_articles',
        'delete_published_posts' => 'delete_published_articles',
        'read_private_posts' => 'read_private_articles',
        'edit_post' => 'edit_article',
        'delete_post' => 'delete_article',
        'read_post' => 'read_article',
      ),
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'slug', 'revisions', 'comments', 'post-formats'),
      'rewrite' => array('slug' => 'feature'),
      'taxonomies' => array('section', 'post_tag')
    );

    register_post_type('article', $args);


    $args = array(
      'labels' => array(
          'name' => _x('Partnerships', 'post type general name'),
          'singular_name' => _x('Partnership', 'post type singular name'),
          'add_new' => _x('Add New', 'partnerships'),
          'add_new_item' => __('Add New Partnership'),
          'edit_item' => __('Edit Partnership'),
          'new_item' => __('New Partnership'),
          'view_item' => __('View Partnership'),
          'search_items' => __('Search Partnership'),
          'not_found' =>  __('No partnerships found'),
          'not_found_in_trash' => __('No partnerships found in trash'),
          'parent_item_colon' => '',
          'menu_name' => 'Partnerships'
        ),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => 'partnership',
      'has_archive' => true,
      'hierarchical' => false,
      'rewrite' => true,
      'menu_position' => 4,
      'capability_type' => 'partnership',
      'capabilities' => array(
        'publish_posts' => 'publish_partnership',
        'edit_posts' => 'edit_partnerships',
        'edit_others_posts' => 'edit_others_partnerships',
        'edit_published_posts' => 'edit_published_partnerships',
        'delete_posts' => 'delete_partnerships',
        'delete_others_posts' => 'delete_others_partnerships',
        'delete_published_posts' => 'delete_published_partnerships',
        'read_private_posts' => 'read_private_partnerships',
        'edit_post' => 'edit_partnership',
        'delete_post' => 'delete_partnership',
        'read_post' => 'read_partnership',
      ),
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'slug', 'revisions'),
      'rewrite' => array('slug' => 'partnership'),
      //'taxonomies' => array('section', 'post_tag')
    );

    // register_post_type('partnership', $args);

    $args = array(
      'labels' => array(
          'name' => _x('Editorial', 'post type general name'),
          'singular_name' => _x('Editorial', 'post type singular name'),
          'add_new' => _x('Add New', 'Editorial'),
          'add_new_item' => __('Add New Editorial'),
          'edit_item' => __('Edit Editorial'),
          'new_item' => __('New Editorial'),
          'view_item' => __('View Editorial'),
          'search_items' => __('Search Editorials'),
          'not_found' =>  __('No editorials found'),
          'not_found_in_trash' => __('No editorials found in trash'),
          'parent_item_colon' => '',
          'menu_name' => 'Editorials'
        ),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => 'editorial',
      'has_archive' => true,
      'hierarchical' => false,
      'rewrite' => true,
      'menu_position' => 5,
      'capability_type' => 'editorial',
      'capabilities' => array(
        'publish_posts' => 'publish_editorial',
        'edit_posts' => 'edit_editorials',
        'edit_others_posts' => 'edit_others_editorials',
        'edit_published_posts' => 'edit_published_editorials',
        'delete_posts' => 'delete_editorials',
        'delete_others_posts' => 'delete_others_editorials',
        'delete_published_posts' => 'delete_published_editorials',
        'read_private_posts' => 'read_private_editorials',
        'edit_post' => 'edit_editorial',
        'delete_post' => 'delete_editorial',
        'read_post' => 'read_editorial',
      ),
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'slug', 'revisions'),
      'rewrite' => array('slug' => 'editorial'), 
    'taxonomies' => array('section', 'post_tag')
    );

    register_post_type('editorial', $args);



    register_taxonomy(
      'section',
      array('article', 'hungerads', 'editorial'),
      array(
        'label' => 'Sections',
        'labels' => array(
          'name' => _x( 'Sections', 'taxonomy general name' ),
          'singular_name' => _x( 'Section', 'taxonomy singular name' ),
          'search_items' =>  __( 'Search section' ),
          'all_items' => __( 'All sections' ),
          'parent_item' => __( 'Main Section' ),
          'parent_item_colon' => __( 'Main Section:' ),
          'edit_item' => __( 'Edit section' ),
          'update_item' => __( 'Update section' ),
          'add_new_item' => __( 'Add section' ),
          'new_item_name' => __( 'New Section Name' ),
        ),
        'sort' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'capabilities' => array('assign_terms' => 'edit_articles'),
        'args' => array( 'orderby' => 'term_order' ),
        'rewrite' => array('slug' => '/', 'hierarchical' => false, 'with_front'=>false ),
      )
    );

    $args = array(
      'labels' => array(
          'name' => _x('Issues', 'post type general name'),
          'singular_name' => _x('Issue', 'post type singular name'),
          'add_new' => _x('Add New', 'issue'),
          'add_new_item' => __('Add New Issue'),
          'edit_item' => __('Edit Issue'),
          'new_item' => __('New Issue'),
          'view_item' => __('View Issue'),
          'search_items' => __('Search Issue'),
          'not_found' =>  __('No issues found'),
          'not_found_in_trash' => __('No issues found in trash'),
          'parent_item_colon' => '',
          'menu_name' => 'Issues'
        ),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => 'issue',
      'rewrite' => true,
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 4,
      'capability_type' => 'issue',
      'capabilities' => array(
        'publish_posts' => 'publish_issues',
        'edit_posts' => 'edit_issues',
        'edit_others_posts' => 'edit_others_issues',
        'edit_published_posts' => 'edit_published_issues',
        'delete_posts' => 'delete_issues',
        'delete_others_posts' => 'delete_others_issues',
        'delete_published_posts' => 'delete_published_issues',
        'read_private_posts' => 'read_private_issues',
        'edit_post' => 'edit_issue',
        'delete_post' => 'delete_issue',
        'read_post' => 'read_issue',
      ),
      'map_meta_cap' => true,
      'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
      'taxonomies' => array()
    );

    register_post_type('issue', $args);

    $args = array(
      'labels' => array(
          'name' => _x('Bloggers', 'post type general name'),
          'singular_name' => _x('Blogger', 'post type singular name'),
          'add_new' => _x('Add New', 'blogger'),
          'add_new_item' => __('Add New Blogger'),
          'edit_item' => __('Edit Blogger'),
          'new_item' => __('New Blogger'),
          'view_item' => __('View Blogger'),
          'search_items' => __('Search Blogger'),
          'not_found' =>  __('No bloggers found'),
          'not_found_in_trash' => __('No bloggers found in trash'),
          'parent_item_colon' => '',
          'menu_name' => 'Bloggers'
        ),
      'public' => true,
      'exclude_from_search' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => false,
      'query_var' => 'blogger',
      'rewrite' => false,
      'capability_type' => 'blogger',
      'capabilities' => array(
        'publish_posts' => 'publish_bloggers',
        'edit_posts' => 'edit_bloggers',
        'edit_others_posts' => 'edit_others_bloggers',
        'edit_published_posts' => 'edit_published_bloggers',
        'delete_posts' => 'delete_bloggers',
        'delete_others_posts' => 'delete_others_bloggers',
        'delete_published_posts' => 'delete_published_bloggers',
        'read_private_posts' => 'read_private_bloggers',
        'edit_post' => 'edit_blogger',
        'delete_post' => 'delete_blogger',
        'read_post' => 'read_blogger',
      ),
      'has_archive' => false,
      'hierarchical' => false,
      'menu_position' => 4,
      'supports' => array('title', 'author'),
      'taxonomies' => array('category')
    );

   register_post_type('blogger', $args);

    global $wp_taxonomies;
    $wp_taxonomies['post_tag']->cap->assign_terms = "edit_tags";

    // change the tag assign_terms capability from manage_posts to a custom one
    // so it can be better controlled
    global $wp_rewrite;

   $wp_rewrite->author_base = 'blogger';
    $wp_rewrite->page_structure = 'pages/%pagename%';
 
   $wp_rewrite->add_permastruct('article-old', '/%section%/feature/%article%/', false);
    $wp_rewrite->add_permastruct('article-new', '/feature/%article%/', false);

  }
}


add_filter('post_updated_messages', 'custom_updated_messages');
function custom_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['article'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Feature updated. <a href="%s">View feature</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Feature updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Feature restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Feature published. <a href="%s">View feature</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Feature saved.'),
    8 => sprintf( __('Feature submitted. <a target="_blank" href="%s">Preview feature</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Feature scheduled for: %1$s. <a target="_blank" href="%2$s">Preview feature</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Feature draft updated. <a target="_blank" href="%s">Preview feature</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  $messages['issue'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Issue updated.'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Issue updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Issue restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Issue published. '), esc_url( get_permalink($post_ID) ) ),
    7 => __('Issue saved.'),
    8 => sprintf( __('Issue submitted.'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Issue scheduled for: %1$s.'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Issue draft updated.'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  $messages['blogger'] = array(
    0 => '', // Unused. Messages start at index 1.
    1 => sprintf( __('Blogger updated.'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Blogger updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Blogger restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Blogger published.'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Blogger saved.'),
    8 => sprintf( __('Blogger submitted.'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Blogger scheduled for: %1$s.'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Blogger draft updated.'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}

// Add filter to plugin init function
add_filter('post_type_link', 'article_permalink', 10, 3);
// Adapted from get_permalink function in wp-includes/link-template.php
function article_permalink($permalink, $post_id, $leavename, $sample=null) {
  /*
  In beginning 2013 we introduced the possibility to select more than one section
  for a feature. This implicates that sections can't be using in the Permalink anymore
  thus features will from now on identified by /features/%title%/
  however old style features permalinks have been used to FB Like, Tweet, etc.
  we kind of have to maintain these permalinks for all previously created features.
  the id below signifies the threshold splitting old style from new style.
   */
  //update_option( 'last_old_style_permalink_feature_id', 28701);
  $last_old_style_permalink_feature_id  = get_option('last_old_style_permalink_feature_id');

  $post = get_post($post_id);
  

  if ($post->post_type != 'article')
    return $permalink;

  if ( '' != $permalink && !in_array($post->post_status, array('draft', 'pending', 'auto-draft')) ) {
    if ($post->ID <= $last_old_style_permalink_feature_id) {
      $section = '';
      $cats = get_the_terms($post->ID, 'section');
      if ( $cats ) {
        if( function_exists( 'wp_list_sort' ) ) {
          $cats = wp_list_sort( $cats, 'term_id', 'ASC' );  // order by term_id ASC
      } else {
          usort( $cats, '_usort_terms_by_ID' ); // order by term_id ASC
      }
        
        $section = $cats[0]->slug;
        if ( $parent = $cats[0]->parent )
          $section = get_category_parents($parent, false, '/', true) . $category;
      }
      // show default category in permalinks, without
      // having to assign it explicitly
      if ( empty($section) ) {
        $section = '';
      }
      $permalink = '/' . $section . '/feature/' .  $post->post_name . '/';
    } else {
      if ($leavename) {
        $permalink = '/feature/%postname%/';
      } else {
        $permalink = '/feature/' . $post->post_name . '/';
      }
    }
    $permalink = home_url($permalink);
  } else { // if they're not using the fancy permalink option
  }
  return $permalink;
}



function hungertv_custom_rewrite_rules_array( $rules ) {
  //print_r($rules);
  //[] => index.php?category_name=$matches[1]&paged=$matches[2]
  //[] => index.php?category_name=$matches[1]
  unset($rules['(.+?)/page/?([0-9]{1,})/?$']);
  unset($rules['(.+?)/?$']);
  return $rules;
}
//add_filter('rewrite_rules_array','hungertv_custom_rewrite_rules_array');



