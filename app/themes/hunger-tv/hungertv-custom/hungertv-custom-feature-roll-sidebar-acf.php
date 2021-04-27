<?php
/*
DEPRECATED
 */
  global $htv_custom_frs_page_id;
  global $htv_custom_frs_max_features;
  global $htv_custom_frs_max_features_page_1;
  $htv_custom_frs_page_id = 6448;
  $htv_custom_frs_max_features = 6;
  $htv_custom_frs_max_features_page_1 = 3;

  if (WP_STAGE_NAME == "production")
    $htv_custom_frs_page_id = 53902;

  if (WP_STAGE_NAME == "staging")
    $htv_custom_frs_page_id = 51222;

/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => '526032e0a422a',
    'title' => 'Feature Roll Sidebar',
    'fields' =>
    array (
      0 =>
      array (
        'key' => 'field_frs_page_1',
        'label' => 'Page 1',
        'name' => 'frs_page_1',
        'type' => 'relationship',
        'order_no' => 0,
        'instructions' => 'Please note that on the homepage and the section landing pages only ' . $htv_custom_frs_max_features_page_1 . ' features will be shown on page 1',
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
        'max' => $htv_custom_frs_max_features,
      ),
      1 =>
      array (
        'key' => 'field_frs_page_2',
        'label' => 'Page 2',
        'name' => 'frs_page_2',
        'type' => 'relationship',
        'order_no' => 1,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      2 =>
      array (
        'key' => 'field_frs_page_3',
        'label' => 'Page 3',
        'name' => 'frs_page_3',
        'type' => 'relationship',
        'order_no' => 2,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      3 =>
      array (
        'key' => 'field_frs_page_4',
        'label' => 'Page 4',
        'name' => 'frs_page_4',
        'type' => 'relationship',
        'order_no' => 3,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      4 =>
      array (
        'key' => 'field_frs_page_5',
        'label' => 'Page 5',
        'name' => 'frs_page_5',
        'type' => 'relationship',
        'order_no' => 4,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      5 =>
      array (
        'key' => 'field_frs_page_6',
        'label' => 'Page 6',
        'name' => 'frs_page_6',
        'type' => 'relationship',
        'order_no' => 5,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      6 =>
      array (
        'key' => 'field_frs_page_7',
        'label' => 'Page 7',
        'name' => 'frs_page_7',
        'type' => 'relationship',
        'order_no' => 6,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      7 =>
      array (
        'key' => 'field_frs_page_8',
        'label' => 'Page 8',
        'name' => 'frs_page_8',
        'type' => 'relationship',
        'order_no' => 7,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      8 =>
      array (
        'key' => 'field_frs_page_9',
        'label' => 'Page 9',
        'name' => 'frs_page_9',
        'type' => 'relationship',
        'order_no' => 8,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
      ),
      9 =>
      array (
        'key' => 'field_frs_page_10',
        'label' => 'Page 10',
        'name' => 'frs_page_10',
        'type' => 'relationship',
        'order_no' => 9,
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
              'value' => '',
            ),
          ),
          'allorany' => 'all',
        ),
        'post_type' =>
        array (
          0 => 'article',
        ),
        'taxonomy' =>
        array (
          0 => 'all',
        ),
        'max' => $htv_custom_frs_max_features,
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
          'value' => (string)$htv_custom_frs_page_id,
          'order_no' => 0,
        ),
      ),
      'allorany' => 'all',
    ),
    'options' =>
    array (
      'position' => 'normal',
      'layout' => 'no_box',
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
