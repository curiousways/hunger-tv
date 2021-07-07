<?php

// Source: https://codex.wordpress.org/Making_Custom_Queries_using_Offset_and_Pagination

add_action('pre_get_posts', 'myprefix_query_offset', 1 );
function myprefix_query_offset($query) {

    //Before anything else, make sure this is the right query...
    if ( ! is_archive() ) {
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
    if ( is_archive() ) {
        //Reduce WordPress's found_posts count by the offset... 
        return $found_posts - $offset;
    }
    return $found_posts;
}
