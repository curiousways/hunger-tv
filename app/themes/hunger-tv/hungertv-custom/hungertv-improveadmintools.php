<?php
if (is_admin()) {

  function my_acf_result_query( $args, $field, $post )
  {
      $args['posts_per_page'] = 100;

      return $args;
  }

  // acf/fields/relationship/result - filter for every field
  add_filter('acf/fields/relationship/query', 'my_acf_result_query', 10, 3);

  function htv_crop_vertical_at_top( $payload, $orig_w, $orig_h, $dest_w, $dest_h, $crop ){

    // Change this to a conditional that decides whether you
    // want to override the defaults for this image or not.
    if( false )
      return $payload;

    if ( $crop ) {
      // crop the largest possible portion of the original image that we can size to $dest_w x $dest_h
      $aspect_ratio = $orig_w / $orig_h;
      $new_w = min($dest_w, $orig_w);
      $new_h = min($dest_h, $orig_h);

      if ( !$new_w ) {
          $new_w = intval($new_h * $aspect_ratio);
      }

      if ( !$new_h ) {
          $new_h = intval($new_w / $aspect_ratio);
      }

      $size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

      $crop_w = round($new_w / $size_ratio);
      $crop_h = round($new_h / $size_ratio);

      $s_x = floor( ($orig_w - $crop_w) / 2 );

      if ($aspect_ratio < 1) {
        // it's a portrait image so take it from the top.
        $s_y = 0;
      } else {
        $s_y = floor( ($orig_h - $crop_h) / 2 );
      }
    } else {
      // don't crop, just resize using $dest_w x $dest_h as a maximum bounding box
      $crop_w = $orig_w;
      $crop_h = $orig_h;

      $s_x = 0;
      $s_y = 0;

      list( $new_w, $new_h ) = wp_constrain_dimensions( $orig_w, $orig_h, $dest_w, $dest_h );
    }

    // if the resulting image would be the same size or larger we don't want to resize it
    if ( $new_w >= $orig_w && $new_h >= $orig_h )
      return false;

    // the return array matches the parameters to imagecopyresampled()
    // int dst_x, int dst_y, int src_x, int src_y, int dst_w, int dst_h, int src_w, int src_h
    return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );

  }
  add_filter( 'image_resize_dimensions', 'htv_crop_vertical_at_top', 10, 6 );

  add_filter( 'wpseo_use_page_analysis', '__return_false' );

  add_filter('acf_relationship_query', 'hungertv_acf_relationship_order', 10, 1);
  function hungertv_acf_relationship_order($options) {
    $options["orderby"] = "date";
    $options["order"] = "DESC";
    return $options;
  }

  function change_image_alt($translation, $text="", $domain="") {
    if ($translation == 'Alternate Text') {
      return "Description";
    }
    if ($translation == 'Alt text for the image, e.g. &#8220;The Mona Lisa&#8221;') {
      return "Shown below the image/video in the fullscreen slideshow and above videos on the feature page";
    }
    return $translation;
  }
  add_filter('gettext', 'change_image_alt');

  add_filter('wp_dropdown_users', 'MySwitchUser');
  function MySwitchUser($output) {
    global $pagenow;
    global $post;

    if (('post.php' == $pagenow || 'post-new.php' == $pagenow ) && current_user_can( 'create_users' )) {
      //global $post is available here, hence you can check for the post type here
      $users = get_users();

      $output = "<select id=\"post_author_override\" name=\"post_author_override\" class=\"\">";

      //Leave the admin in the list
      foreach($users as $user) {
          $sel = ($post->post_author == $user->ID)?"selected='selected'":'';
          $output .= '<option value="'.$user->ID.'"'.$sel.'>'.$user->user_login.'</option>';
      }
      $output .= "</select>";
    }
    return $output;
  }

  function hunger_remove_meta_boxes() {
    // remove page parent page options meta box on the pages
    remove_meta_box('pageparentdiv', 'page', 'normal');
  }
  add_action( 'add_meta_boxes', 'hunger_remove_meta_boxes' );

  add_filter( 'wpseo_metabox_prio', 'app_move_seo_meta_boxes', 10, 1 );
  function app_move_seo_meta_boxes($prio) {
    return 'low';
  }

  function restrict_manage_authors() {
    global $typenow;

    if ($typenow == "post") {
      wp_dropdown_users(array(
        'show_option_all'       => 'Show all Authors',
        'show_option_none'      => false,
        'name'                  => 'author',
        'selected'              => !empty($_GET['author']) ? $_GET['author'] : 0,
        'include_selected'      => false
      ));


    }

    if ($typenow == "article") {
      ?><select name='featured' id='featured' class='postform'>
        <option value="">Featured</option>
        <option value="section" <?php if( isset($_GET['featured']) && $_GET['featured']=='section') echo 'selected="selected"' ?>>In section</option>
        <option value="home" <?php if( isset($_GET['featured']) && $_GET['featured']=='home') echo 'selected="selected"' ?>>On homepage </option>
      </select><?php
    }
  }
  add_action('restrict_manage_posts', 'restrict_manage_authors');


  function hungertv_featured_posts_where($where) {
      global $wpdb;
      if (isset($_GET['featured'])) {
        if(  $_GET['featured'] == 'section' ) {
            $where .= " AND ID IN (SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='article_featured' AND meta_value='1' )";
        } else if( $_GET['featured'] == 'home' ) {
            $where .= " AND ID IN (SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='article_home_featured' AND meta_value='1' )";
        }
      }
      return $where;
  }
  add_filter('posts_where', 'hungertv_featured_posts_where');

  function add_article_counts() {
    if (!post_type_exists('article')) {
         return;
    }

    $num_posts = wp_count_posts( 'article' );
    $num = number_format_i18n( $num_posts->publish );
    $text = _n( 'Article', 'Articles', intval($num_posts->publish) );
    if ( current_user_can( 'edit_articles' ) ) {
      $num = "<a href='edit.php?post_type=article'>$num</a>";
      $text = "<a href='edit.php?post_type=article'>$text</a>";
    }
    echo '<td class="first b b-video">' . $num . '</td>';
    echo '<td class="t video">' . $text . '</td>';

    echo '</tr>';
  }
  add_action('right_now_content_table_end', 'add_article_counts');

  function todo_restrict_manage_posts() {
    global $typenow;
    $args=array( 'public' => true, '_builtin' => false );
    $post_types = get_post_types($args);

    if ( in_array($typenow, $post_types) ) {
      $filters = get_object_taxonomies($typenow);
      foreach ($filters as $tax_slug) {
        if ($tax_slug == 'category')
          continue;

        $tax_obj = get_taxonomy($tax_slug);
        wp_dropdown_categories(array(
            'show_option_all' => __('Show All '.$tax_obj->label ),
            'taxonomy' => $tax_slug,
            'name' => $tax_obj->name,
            'orderby' => 'term_order',
            'selected' => $_GET[$tax_obj->query_var],
            'hierarchical' => $tax_obj->hierarchical,
            'show_count' => false,
            'hide_empty' => true
        ));
      }
    }

    if ($typenow == 'hungerads' && function_exists('get_field_object')) {
      $field = get_field_object('field_adv_type');
      if ($field) {
        echo '<select id="type" class="postform" name="type">';
        echo '<option value="">Show All Types</option>';
        foreach ($field['choices'] as $key => $value) {
          $selected = "";
          if (!empty($_GET['type']) && $_GET['type']==$key)
            $selected = ' selected="selected"';

          echo '<option value="' . $key . '"' . $selected . '>';
          echo $value;
          echo '</option>';
        }
        echo '</select>';
      }
    }
  }
  function todo_convert_restrict($query) {
    global $pagenow;
    global $typenow;
    if ($pagenow=='edit.php') {
      $filters = get_object_taxonomies($typenow);
      foreach ($filters as $tax_slug) {
        $var = &$query->query_vars[$tax_slug];
        if ( isset($var) ) {
          $term = get_term_by('id',$var,$tax_slug);
          $var = $term->slug;
        }
      }

      if ($typenow == "hungerads" && !empty($_GET['type'])) {
        $query->query_vars['meta_key'] = 'type';
        $query->query_vars['meta_value'] = $_GET['type'];
      }
    }
  }
  add_action( 'restrict_manage_posts', 'todo_restrict_manage_posts' );
  add_filter('parse_query','todo_convert_restrict');

  // add section column to article admin listing
  function add_section_column_to_arcticle_listing( $posts_columns ) {
    if (!isset($posts_columns['tags'])) {
      $new_posts_columns = $posts_columns;
    } else {
      $new_posts_columns = array();
      $index = 0;
      foreach($posts_columns as $key => $posts_column) {
        if ($key=='tags')
          $new_posts_columns['sections'] = null;
        $new_posts_columns[$key] = $posts_column;
      }
    }
    $new_posts_columns['sections'] = 'Sections';
    return $new_posts_columns;
  }
  add_action('manage_article_posts_columns', 'add_section_column_to_arcticle_listing');

  // add section column to
  function add_section_column_to_hungerads_listing( $posts_columns ) {
    if (!isset($posts_columns['categories'])) {
      $new_posts_columns = $posts_columns;
    } else {
      $new_posts_columns = array();
      $index = 0;
      foreach($posts_columns as $key => $posts_column) {
        if ($key=='categories') {
          $new_posts_columns['type'] = 'Type';
          $new_posts_columns['sections'] = 'Sections';
          $new_posts_columns[$key] = $posts_column;
          $new_posts_columns['expires'] = 'Expires';
          $new_posts_columns['views'] = 'Views';
          $new_posts_columns['clicks'] = 'Clicks';
        } else {
          $new_posts_columns[$key] = $posts_column;
        }
      }
    }
    return $new_posts_columns;
  }
  add_action('manage_hungerads_posts_columns', 'add_section_column_to_hungerads_listing');

  function show_columns_for_listing_list( $column_id, $post_id ) {
    global $typenow;
    static $hungerTVAdvertsTypes;

    if (is_null($hungerTVAdvertsTypes)){
      $hungerTVAdvertsTypes = array();
      $field = get_field_object('field_adv_type');
      if ($field) {
        foreach ($field['choices'] as $key => $value) {
          $str = $value;
          if (strlen($str) > 40){
            $str = substr($str, 0, 40) . "...";
          }
          $hungerTVAdvertsTypes[$key] = $str;
        }
      }
    }

    //print "{$typenow}:{$column_id}";

    switch ("{$typenow}:{$column_id}") {
      case 'hungerads:type':
        $type =  get_post_meta($post_id, 'type', true);

        if (array_key_exists($type, $hungerTVAdvertsTypes)) {
          echo $hungerTVAdvertsTypes[$type];
        } else {
          echo 'No Assigned';
        }

        break;
      case 'hungerads:expires':
        try{
          $date = new DateTime(get_post_meta($post_id, 'visible_until', true));
          echo $date->format('d.m.Y');
        }catch (Exception $e) {
          echo 'Not Defined';
        }
        break;

      case 'hungerads:views':
        echo get_post_meta($post_id, 'views', true);
        break;

      case 'hungerads:clicks':
        echo get_post_meta($post_id, 'clicks', true);
        break;

      case 'article:sections':
      case 'hungerads:sections':
        $taxonomy = 'section';
        $terms = get_the_terms($post_id, $taxonomy);
        if (is_array($terms)) {
          foreach($terms as $key => $term) {
            $edit_link = get_admin_url() . "edit.php?s&post_status=all&post_type={$typenow}&section={$term->term_id}";
            $terms[$key] = '<a href="'.$edit_link.'">' . $term->name . '</a>';
          }
          echo implode(' | ',$terms);
        } else {
          echo "No section(s) assigned";
        }
        break;
    }
  }
  add_action('manage_posts_custom_column', 'show_columns_for_listing_list',10,2);

  function admin_js() {
    global $post;

    if (isset($post) && isset($post->post_type) && $post->post_type == 'article') {
      echo <<<EOF
<script type="text/javascript">
jQuery( document ).ready( function($) {
  if ( $( ".post-new-php form#post" ).length || $( ".post-php form#post" ).length ) {
    $( "form#post" ).submit( function() {
      if ( $( "#sectionchecklist input:checked" ).length == 0 ) {
        alert( "Please select a section for this article!" );
        setTimeout(function(){jQuery('.spinner').css('display', 'none');}, 100);
        setTimeout(function(){jQuery('#publish').removeClass('button-primary-disabled');}, 100);
        setTimeout(function(){jQuery('#save-post').removeClass('button-disabled');}, 100);
        return false;
      }
    });
  }
});
</script>
list:section
EOF;
    }

    if (isset($post) && isset($post->post_type) && $post->post_type == 'post') {
      echo <<<EOF
<script type="text/javascript">
jQuery( document ).ready( function($) {
  if ( $( ".post-new-php form#post" ).length || $( ".post-php form#post" ).length ) {
    $( "form#post" ).submit( function() {
      if ( $( "#categorychecklist input:checked" ).length == 0 ) {
        alert( "Please select a category for this post!" );
        setTimeout(function(){jQuery('.spinner').css('display', 'none');}, 100);
        setTimeout(function(){jQuery('#publish').removeClass('button-primary-disabled');}, 100);
        setTimeout(function(){jQuery('#save-post').removeClass('button-disabled');}, 100);
        return false;
      }
    });
  }
});
</script>
list:section
EOF;
    }
  }
  add_action( 'admin_footer', 'admin_js' );

  add_action('admin_head', 'hungertv_custom_admin_head');
  function hungertv_custom_admin_head(){
    echo <<<EOF
<style type="text/css">
.acf_relationship .relationship_list li a .info {
  color: #CCCCCC;
  float: right;
  font-size: 11px;
  text-transform: uppercase;
  background: none !important;
  padding: 0;
  border: none;
}
</style>
EOF;

  }
}


/*
Taken from  Force Post Title
Add jQuery check for a post title
http://appinstore.com
Forces user to assign a Title to a post before publishing
Jatinder Pal Singh
Version: 0.1
http://appinstore.com/
*/
function force_post_title_init()
{
  wp_enqueue_script('jquery');
}
function force_post_title()
{
  echo "<script type='text/javascript'>\n";
  echo "
  jQuery('#publish').click(function(){
        if (jQuery('#title').val().length < 1)
        {
            jQuery('#title').css('background-color', '#c00').css('color','#fff').focus(function(){
              jQuery(this).css('background-color', 'transparent').css('color','#000');
            });
            setTimeout(\"jQuery('.spinner').css('display', 'none');\", 100);
            alert('Please enter a title');
            setTimeout(\"jQuery('#publish').removeClass('button-primary-disabled');\", 100);
            return false;
        }
    });
  ";
   echo "</script>\n";
}
add_action('admin_init', 'force_post_title_init');
add_action('edit_form_advanced', 'force_post_title');
add_action('edit_page_form', 'force_post_title');


