<?php
/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */
if(function_exists("register_field_group")){
  $htv_tv_page_id = (WP_LOCAL_DEV)? 6384 : 50104;
  register_field_group(array (
    'id' => '525d4b7360367',
    'title' => 'Trending Videos',
    'fields' =>
    array (
      0 =>
      array (
        'key' => 'field_49',
        'label' => 'Trending Videos',
        'name' => 'trending_videos',
        'type' => 'repeater',
        'order_no' => 0,
        'instructions' => '',
        'required' => 1,
        'conditional_logic' =>
        array (
          'status' => 0,
          'rules' =>
          array (
            0 =>
            array (
              'field' => 'null',
              'operator' => '==',
            ),
          ),
          'allorany' => 'all',
        ),
        'sub_fields' =>
        array (
          'field_50' =>
          array (
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'instructions' => '',
            'column_width' => 33,
            'save_format' => 'object',
            'preview_size' => 'thumbnail',
            'order_no' => 0,
            'key' => 'field_50',
          ),
          'field_51' =>
          array (
            'label' => 'Feature',
            'name' => 'feature',
            'type' => 'relationship',
            'instructions' => '',
            'column_width' => '',
            'post_type' =>
            array (
              0 => 'article',
            ),
            'taxonomy' =>
              array (
                0 => "section:art-culture",
                1 => "section:art",
                2 => "section:culture",
                3 => "section:fashion-beauty",
                4 => "section:beauty",
                5 => "section:fashion",
                6 => "section:fashion-week",
                7 => "section:films",
                8 => "section:film",
                9 => "section:interview",
                10 => "section:shorts",
                11 => "section:music",
                12 => "section:dirty-video-music",
                13 => "section:mixtapes",
                14 => "section:news",
                15 => "section:photography",
                16 => "section:documentary",
                17 => "section:fashion-photography"
              ),
            'max' => 1,
            'order_no' => 1,
            'key' => 'field_51',
          ),
        ),
        'row_min' => 1,
        'row_limit' => 6,
        'layout' => 'table',
        'button_label' => 'Add Video',
      ),
    ),
    'location' =>
    array (
      'rules' =>
      array (
        0 =>
        array (
          'param' => 'page',
          'operator' => '==',
          'value' => $htv_tv_page_id,
          'order_no' => 0,
        ),
      ),
      'allorany' => 'all',
    ),
    'options' =>
    array (
      'position' => 'normal',
      'layout' => 'default',
      'hide_on_screen' =>
      array (
        0 => 'the_content',
        1 => 'excerpt',
        2 => 'custom_fields',
        3 => 'discussion',
        4 => 'comments',
        5 => 'revisions',
        6 => 'slug',
        7 => 'author',
        8 => 'format',
        9 => 'featured_image',
        10 => 'categories',
        11 => 'tags',
        12 => 'send-trackbacks',
      ),
    ),
    'menu_order' => 0,
  ));
}
