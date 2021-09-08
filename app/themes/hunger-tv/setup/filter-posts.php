<?php

function _mghd_filtered_posts($ignore_ids) {
    // echo $ignore_ids;
    $context = Timber::context();

    $latest_news = Timber::get_posts([
        'post_type' => ['article', 'editorial'],
        'posts_per_page' => 6,
        'post__not_in' => $ignore_ids
    ]);

    // while ($latest_news->have_posts()) {
    foreach ($latest_news as $post) {
        echo '<div class="col md:6 lg:4">';
        // $latest_news->the_post();
        // include (locate_template('templates/includes/card.php'));

        $timber_post = new Timber\Post();
        $context['post'] = $timber_post;
        Timber::render('includes/card.twig', $context);
        echo '</div>';
    }
}

// Source: https://codex.wordpress.org/Making_Custom_Queries_using_Offset_and_Pagination

add_action('pre_get_posts', 'myprefix_query_offset', 1 );
function myprefix_query_offset($query) {

    //Before anything else, make sure this is the right query...
    if ( ! $query->is_main_query() || ! is_archive() || is_admin() ) {
        return;
    }

    //First, define your desired offset...
    $offset = 1;
    
    //Next, determine how many posts per page you want (we'll use WordPress's settings)
    $ppp = get_option('posts_per_page');

    //Next, detect and handle pagination...
    if ( $query->is_paged ) {

        //Manually determine page query offset (offset + current page (minus one) x posts per page)
        $page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );

        //Apply adjust page offset
        $query->set('offset', $page_offset );

    }
    else {

        //This is the first page. Just use the offset...
        $query->set('offset',$offset);

    }
}

add_filter('found_posts', 'myprefix_adjust_offset_pagination', 1, 2 );
function myprefix_adjust_offset_pagination($found_posts, $query) {

    //Define our offset again...
    $offset = 1;

    //Ensure we're modifying the right query object...
    if ( $query->is_main_query() && is_archive() && ! is_admin() ) {
        //Reduce WordPress's found_posts count by the offset... 
        return $found_posts - $offset;
    }
    return $found_posts;
}
