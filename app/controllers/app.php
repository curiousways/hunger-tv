<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
               // return get_the_title($home);
            }
           // return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
           // return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }

        return get_the_title();
    }

public function articleLoop()
{
    global $post;

        $related = get_crp_posts_id( array(
            'postid' => $post->ID,
           'limit' => 0,
           'post_type' => 'editorial'
       ) );
       $posts = wp_list_pluck( (array) $related, 'ID'  );

       $article_items = get_posts([
           'post__in' => $posts,
           'posts_per_page' => 0,
           'meta_query' => array(
               array(
                   'key' => 'evergreen', // name of custom field
                   'value' => '"yes"', // matches exaclty "red", not just red. This prevents a match for "acquired"
                   'compare' => 'LIKE'
               )
               ),
   'post_type' => 'editorial'
       ]);



    return array_map(function ($post) {
        if ( get_field( 'sponsored', $post->ID ) ):
          $sponsored =  (get_field('sponsored', $post->ID))[0];
        else: $sponsored = '';
    endif;
        return [
            'thumbnail' => get_the_post_thumbnail($post->ID, 'large'),
            'old_thumbnail' => get_field('hero_image', $post->ID),
            'title' => get_the_title($post->ID),
            'excerpt' => get_field('article_excerpt', $post->ID),
            'old_excerpt' => get_field('excerpt', $post->ID),
            'link' => get_permalink($post->ID),
            'post_is' => ($post->ID),
            'sponsored' => $sponsored,
            'article_info' => get_field('article_info', $post->ID),
        ];
    }, $article_items);
}

public function social_items() {
    $social_items = get_field('social_links', 'option');
    return $social_items;
}

public function social_new() {
    return (object) array(
        'facebook_share_icon' => get_field('facebook_share_icon', 'option'),
        'twitter_share_icon' => get_field('twitter_share_icon', 'option'),
        'pinterest_share_icon' => get_field('pinterest_share_icon', 'option'),
        'email_share_icon' => get_field('email_share_icon', 'option'),
        'link_share_icon' => get_field('link_share_icon', 'option'),
    );
}

public function social_footer_items() {
    $social_footer_items = get_field('social_footer_links', 'option');
    return $social_footer_items;
}

public function buy_cta() {
    return (object) array(
        'title' => get_field('issue_cta_title', 'option'),
        'text' => get_field('issue_cta_text', 'option'),
        'tag' => get_field('issue_cta_tag', 'option'),
        'link_text' => get_field('issue_cta_link_text', 'option'),
        'link' => get_field('issue_cta_link', 'option'),
        'image' => get_field('issue_cta_image', 'option')['url'],
        'image_alt' => get_field('issue_cta_image', 'option')['alt'],
    );
}

public function twoMoreLoop()
{


        global $post;
        $related = get_crp_posts_id( array(
             'postid' => $post->ID,
            'limit' => 1000,
            'post_type' => 'editorial'
        ) );
        $posts = wp_list_pluck( (array) $related, 'ID'  );

        $two_more_items = get_posts([
            'post__in' => $posts,
            'posts_per_page' => 2,
            'meta_query' => array(
                array(
                    'key' => 'evergreen', // name of custom field
                    'value' => '"yes"', // matches exaclty "red", not just red. This prevents a match for "acquired"
                    'compare' => 'LIKE'
                )
                ),
    'post_type' => 'editorial',
    'post__not_in' => array($post->ID),
        ]);



            return array_map(function ($post) {
                if ( get_field( 'sponsored', $post->ID ) ):
                    $sponsored =  (get_field('sponsored', $post->ID))[0];
                  else: $sponsored = '';
              endif;

                return [
                    'thumbnail' => get_the_post_thumbnail($post->ID, 'home-sm'),
                    'old_thumbnail' => get_field('hero_image', $post->ID),
                    'title' => get_the_title($post->ID),
                    'link' => get_permalink($post->ID),
                    'categories' => get_the_terms( $post, 'section' ),
                    'post_is' => ($post->ID),
                    'sponsored' => $sponsored,
                ];
            }, $two_more_items);







}

public function categories() {
    global $post;
    $sections = get_the_terms( $post, 'section' );
    return $sections;
}


public function gallery() {
    return get_field('images');
}

public function homeFeature1() {
        return get_field('featured_article_1');
}
public function homeFeature2() {
    return get_field('featured_article_2');
}
public function homeFeature3() {
    return get_field('featured_article_3');
}
public function homeRightAd() {
    return get_field('ad_unit_right_column');
}
public function homeAd2() {
    return get_field('ad_unit_2');
}
public function homeRightAd2() {
    return get_field('ad_unit_right_column_2');
}
public function homeHungerEditsTitle() {
    return get_field('hunger_edits_title');
}
public function homeHungerEdit1() {
    return get_field('hunger_edit_1');
}
public function homeHungerEdit2() {
    return get_field('hunger_edit_2');
}
public function homeHungerEdit3() {
    return get_field('hunger_edit_3');
}
public function homeHungerEdit4() {
    return get_field('hunger_edit_4');
}

public function sixMoreLoop()
{
    $six_more_items = get_posts([
        'post_type' => array('article', 'editorial'),
        'posts_per_page'=>'6',
    ]);

    return array_map(function ($post) {
        if ( get_field( 'sponsored', $post->ID ) ):
            $sponsored =  (get_field('sponsored', $post->ID))[0];
          else: $sponsored = '';
      endif;
        return [
            'thumbnail' => get_the_post_thumbnail($post->ID, 'home-sm'),
            'title' => get_the_title($post->ID),
            'link' => get_permalink($post->ID),
            'categories' => get_the_terms( $post, 'section' ),
            'post_is' => ($post->ID),
            'old_thumbnail' => get_field('hero_image', $post->ID),
            'sponsored' => $sponsored,
        ];
    }, $six_more_items);
}
public function mySearch() {
return sprintf(__('%s', 'sage'), get_search_query());
}

public function myCategory() {
    // use this to echo the slug
    return category_description();
 }

 public function sponsored() {
    return get_field('sponsored');
 }
}



