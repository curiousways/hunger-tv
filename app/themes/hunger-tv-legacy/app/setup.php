<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
        'secondary_navigation' => __('Secondary Navigation', 'sage'),
        '404_navigation' => __('404 Navigation', 'sage'),
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

// add acf options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Hunger Theme Settings');
}

// add different number of posts to display
add_action( 'pre_get_posts',  __NAMESPACE__ . '\\set_posts_per_page'  );
function set_posts_per_page( $query ) {

  global $wp_the_query;

  if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_search() ) ) {
    $query->set( 'posts_per_page', 20 );
  }
  elseif ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_archive() ) ) {
    $query->set( 'posts_per_page', 12 );
  }


  return $query;
}



// Alter header menu searchform placeholder text
add_filter('get_search_form', function(){
    $form = '';
      echo template(realpath(get_template_directory() . '/views/partials/searchform.blade.php'), []);
    return $form;
  });

  add_action( 'pre_get_posts',  __NAMESPACE__ . '\\tags_page' );
function tags_page( $query ) {
  if ( !is_admin() && $query->is_main_query()) {
    if ( is_tag()) {
     // $meta_query = $query->get('meta_query');

      $query->query_vars['post_type'] = 'any';

    }
  }

  return $query;
}
add_filter('next_posts_link_attributes',  __NAMESPACE__ . '\\posts_link_attributes');


function posts_link_attributes() {
    return 'class="styled-button"';
}
add_filter('previous_posts_link_attributes',  __NAMESPACE__ . '\\posts_link_attributes2');


function posts_link_attributes2() {
    return 'class="styled-button2"';
}

function add_author_support_to_posts() {
    add_post_type_support( 'editorial', 'author' );
 }
 add_action( 'init',  __NAMESPACE__ . '\\add_author_support_to_posts' );

 /*-----------------------------------------------------------------------------------*/
/* Remove Unwanted Admin Menu Items */
/*-----------------------------------------------------------------------------------*/

function remove_menus(){

    remove_menu_page( 'edit.php' );                   //Posts
    remove_menu_page( 'edit-comments.php' );          //Comments

  }
  add_action( 'admin_menu',  __NAMESPACE__ . '\\remove_menus', 999  );
//start of code from old theme //
/*
 * render the content of a post. you can customize the output by specifying a template.
 * you can also define a callback function taking the post and attributes
 *
 */
global $theme_body_style;

if (function_exists('axon_fragment_cache'))
  define('DO_AXON_FC', true);
else
  define('DO_AXON_FC', false);
/* l comment out
include "functions.query_rewrites.php";
*/
function wpseo_opengraph_image_size() {
  return 'gallery';
}
add_filter( 'wpseo_opengraph_image_size',  __NAMESPACE__ . '\\wpseo_opengraph_image_size', 10, 1 );

function wpseo_de_html_social_tags_desc($desc) {
  return strip_tags($desc);
}
add_filter( 'wpseo_opengraph_desc',  __NAMESPACE__ . '\\wpseo_de_html_social_tags_desc', 10, 1 );
add_filter( 'wpseo_twitter_description',  __NAMESPACE__ . '\\wpseo_de_html_social_tags_desc', 10, 1 );

/* l comment out
if (!WP_LOCAL_DEV){
  add_filter( 'auto_update_plugin', '__return_true' );
  add_filter( 'auto_update_theme', '__return_true' );
}
*/

if (DO_AXON_FC) {
  function refresh_content_when_post_thumbnail_add($post_id, $meta_key, $meta_value){
    if ( $meta_key == '_thumbnail_id' ) {
      axon_fc_clear_accordion($post_id);
      axon_fc_clear_frs($post_id);
      wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_content_' . $post_id);
      wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_article_detail_' . $post_id);
      wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_article_detail_' . $post_id . '_slideshow');
    }
  }
  /* l comment out
  function refresh_content_when_post_thumbnail_update($meta_id, $post_id, $meta_key, $meta_value){
    refresh_content_when_post_thumbnail_add($post_id, $meta_key, $meta_value);
  }
  */
  add_action('add_post_meta', 'refresh_content_when_post_thumbnail_add', 10, 3);
    /* l comment out
  add_action('update_post_meta', 'refresh_content_when_post_thumbnail_update', 10, 4);
  */

  function axon_fc_clear_frs($post_id){
    wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_frs_first');
    for ($i=1;$i<11;$i++){
      wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_frs_' . $i);
    }
  }

  function axon_fc_clear_accordion($post_id){
    wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_accordion_front');
    $sections = get_terms("section");
    if ($sections){
      foreach ($sections as $section) {
        wp_cache_delete(axon_fragment_cache_get_prefix() . 'htv_accordion_' . $section->term_id);
      }
    }
  }

  if (function_exists('axon_fragment_cache_register_purge_key')){
    // feature roll inserts are listing posts and features so clear them
    axon_fragment_cache_register_purge_key('*', 'htv_fri');

    axon_fragment_cache_register_purge_key('hungerads', 'axon_fc_clear_accordion');

    axon_fragment_cache_register_purge_key('article', 'axon_fc_clear_accordion');
    axon_fragment_cache_register_purge_key('article', 'htv_content_{ID}');
    axon_fragment_cache_register_purge_key('article', 'htv_article_detail_{ID}');
    axon_fragment_cache_register_purge_key('article', 'htv_article_detail_{ID}_slideshow');
    axon_fragment_cache_register_purge_key('article', 'htv_article_related_{ID}');
    axon_fragment_cache_register_purge_key('article', 'htv_trending_videos');

    axon_fragment_cache_register_purge_key('post', 'htv_content_{ID}');
    axon_fragment_cache_register_purge_key('post', 'htv_search_{ID}');

    axon_fragment_cache_register_purge_key('page', 'axon_fc_clear_frs');
    axon_fragment_cache_register_purge_key('page', 'htv_trending_videos');

    axon_fragment_cache_register_purge_key('post', 'htv_blog_slideshow');

  }
}

/* l comment out
if (WP_LOCAL_DEV && function_exists('profile_start'))
  profile_start();

if (defined('WP_LOCAL_DEV') && !WP_LOCAL_DEV){
  add_filter('acf/settings/show_admin', '__return_false');
}
*/

global $content_width;
$content_width = 476;
global $in_dev_mode;
$in_dev_mode = false;

$theme_body_class = "";

define('SECTIONS_SEPARATOR', ' / ');

/* l comment out
define('DISALLOW_FILE_EDIT',true); // disable the theme editor in the backend
*/

/*
REMOVE UNWANTED CODE ADDED BY DISQUS PLUGIN
 */
remove_action('wp_footer', 'dsq_output_footer_comment_js');

/* l comment out
remove_action('loop_end', 'dsq_loop_end');
*/

/*
REDIRECT USER AFTER LOGIN, IF ADMIN OR
 */
function hungertv_login_redirect($redirect_to, $request, $user){
  return (isset($user) && isset($user->roles) && is_array($user->roles) && in_array('subscriber', $user->roles)) ? site_url() : admin_url();
}
add_filter('login_redirect',  __NAMESPACE__ . '\\hungertv_login_redirect', 10, 3);

if (function_exists('add_theme_support')) {
  add_theme_support('menus');
}

/* we want to disable that images are per default linked onto */
/* l comment out
add_filter( 'option_image_default_link_type', 'option_image_default_link_type' );
function option_image_default_link_type() {
  return "none";
}
*/
add_filter('index_rel_link', 'disable_stuff' );
add_filter('parent_post_rel_link', 'disable_stuff');
add_filter('start_post_rel_link', 'disable_stuff');
add_filter('previous_post_rel_link', 'disable_stuff');
add_filter('next_post_rel_link', 'disable_stuff');
add_filter('post_comments_feed_link','disable_stuff');

function disable_stuff( $data ) {
  return false;
}

function htv_is_ajax() {
  return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ? true : false);
}



add_action( 'after_setup_theme',  __NAMESPACE__ . '\\theme_setup' );
if ( ! function_exists( 'theme_setup' ) ) {
  function theme_setup() {
    add_theme_support( 'post-thumbnails', array( 'post', 'article', 'issue' ));
    add_image_size('home-sm', 386,  210, true);
  // add_image_size('tiny', 150,  1000, false);
 //  add_image_size('1column', 300,  1000, false);
 //   add_image_size('1column316', 316,  1000, false);
 //   add_image_size('1column400', 400,  1000, false);
 //   add_image_size('2column', 616,  2000, false);
 //   add_image_size('insert', 150,  112, true);
    add_image_size('thumbnail', 350,  262, true);
 //  add_image_size('slideshow', 784,  581, false);
   // add_image_size('feature-content-portrait', 588,  2000, false);
   // add_image_size('feature-content-landscape', 784,  2000, false);
  // add_image_size('page', 980,  2000, false);
 //   add_image_size('gallery', 1200,  800, false);
  //  add_image_size('slideshow_thumb', 200,  63, false);
 //   add_image_size('newsletter-large', 279, 800, false);
  //  add_image_size('newsletter-thumb', 110, 82, true);
 ////   add_image_size('sidebar', 181,  237, true);
  //  add_image_size('featured', 637,  358, true);
 //   add_image_size('featuredlarge', 770,  433, true);
 //   add_image_size('blog', 588,  2000, false);



    add_theme_support( 'post-thumbnails', array( 'editorial' ));

    add_image_size('article-desk', 688,  387, true);
    add_image_size('home-lg', 929,  523, true);
    add_image_size('home-md', 705,  396, true);
    add_image_size('gallery-2', 1004,  1004, false);
    add_image_size('mobile-full', 767,  767, false);

    add_editor_style('css/wysiwyg.css');

    register_nav_menu('header', 'Header');
    register_nav_menu('footer', 'Footer');

    if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => 'filter',
        'id' => 'filter',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => ''));
  }
}


/* l comment out
add_action('widgets_init', 'unregister_default_wp_widgets', 1);
function unregister_default_wp_widgets() {
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  //unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Tag_Cloud');

}
*/

add_filter("attachment_fields_to_edit", "remove_image_insert_url", 10, 2);
function remove_image_insert_url($form_fields, $post) {
  $form_fields["url"]["value"] = "";
  $form_fields["image_alt"]["label"] = "Description";
  $form_fields["image_alt"]["helps"] = "(optional) Shown on the features' slideshows";


  $form_fields["post_content"]["label"] = "Image Credits";
  $form_fields["post_content"]["helps"] = "Please place one entry per line and the @@@ place holder to separate label from value (e.g.: Director@@@Rankin)";

  // please note further fields are added at hungetv-custom/hungertv-video-player.php

  return $form_fields;
}
/*
if (is_admin()) :
add_filter( 'gettext', 'hungertv_customize_media_manager', 20, 3 );
  function hungertv_customize_media_manager( $translated_text, $text, $domain ) {
        switch ( $translated_text ) {
          case 'Caption' :
            $translated_text = 'Youtube ID';
            break;

          case 'Alt Text' :
            $translated_text = 'Caption';
            break;

          case 'Description' :
            $translated_text = 'Credits';
            break;
        }
      return $translated_text;
  }
endif;
*/

// Custom Functions for CSS/Javascript Versioning
$GLOBALS["TEMPLATE_URL"] = get_asset_url()."/";
$GLOBALS["TEMPLATE_RELATIVE_URL"] = wp_make_link_relative($GLOBALS["TEMPLATE_URL"]);

// Add ?v=[last modified time] to style sheets
function versioned_stylesheet($relative_url, $add_attributes=""){
  echo '<link rel="stylesheet" href="'.versioned_resource($relative_url).'" '.$add_attributes.'>'."\n";
}

// Add ?v=[last modified time] to javascripts
function versioned_javascript($relative_url, $add_attributes=""){
  echo '<script src="'.versioned_resource($relative_url).'" '.$add_attributes.'></script>'."\n";
}

// Add ?v=[last modified time] to a file url
function versioned_resource($relative_url){
  $file = $_SERVER["DOCUMENT_ROOT"].$relative_url;
  $file_version = "";

  if(file_exists($file)) {
    $file_version = "?v=".filemtime($file);
  }

  return $relative_url.$file_version;
}

function excerpt_ellipse($text) {
   return str_replace('[...]', ' <a href="'.get_permalink().'">Read more...</a>', $text);
}
add_filter('the_excerpt',  __NAMESPACE__ . '\\excerpt_ellipse');

$GLOBALS["externalScripts"] = "";
$GLOBALS["inlineScripts"] = "";
function addExternalScript($src) {
  $GLOBALS["externalScripts"] .= "\n" . '<script src="' . $src . '"></script>';
}
function addInlineScript($src) {
  $GLOBALS["inlineScripts"] .= "\n" . $src . "\n";
}
function showInlineJS() {
  if ($GLOBALS["inlineScripts"] != "") {
    print '<script type="text/javascript">';
    print $GLOBALS["inlineScripts"];
    print "</script>";
  }
}

function usejQueryCDN() {
  if (wp_script_is('jquery')) {
    print '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>';
    print '<script>($ == undefined) && document.write(\'<script src="' . get_bloginfo('template_url') . 'js/jquery.1.6.2.min.js"><\/script>\');</script>';
    print $GLOBALS["externalScripts"];
  }
}

function mytheme_mce_settings( $initArray ){
 $initArray["theme_advanced_buttons1"] = "bold,italic,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,wp_more,wp_adv";
 $initArray["theme_advanced_buttons2"] = "formatselect,underline,forecolor,|,pastetext,pasteword,removeformat,|,charmap,|,outdent,indent,|,source,undo,redo,wp_help";
 return $initArray;
}
add_filter( 'tiny_mce_before_init',  __NAMESPACE__ . '\\mytheme_mce_settings' );

function remove_admin_bar_links() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments');
  $wp_admin_bar->remove_menu('appearance');
  $wp_admin_bar->remove_menu('new-link');
  $wp_admin_bar->remove_menu('new-user');
  $wp_admin_bar->remove_menu('new-plugin');
  $wp_admin_bar->remove_menu('new-theme');
}
add_action( 'wp_before_admin_bar_render',  __NAMESPACE__ . '\\remove_admin_bar_links' );

/* end improve admin tools */

//EXCERPT
function excerpt_length( $length ) {
  return 50;
}
add_filter( 'excerpt_length',  __NAMESPACE__ . '\\excerpt_length' );

function auto_excerpt_more( $more ) {
  return '';
}
add_filter( 'excerpt_more',  __NAMESPACE__ . '\\auto_excerpt_more' );

function custom_excerpt_more( $output ) {
  return $output;
}
add_filter( 'get_the_excerpt',  __NAMESPACE__ . '\\custom_excerpt_more' );


function vvu_truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);

  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n",$string);
    $string = array_shift($string) . $append;
  }

  return $string;
}


/**
 * this method is a generic handler for images of a post. You can customize the output
 * via the attr see default settings below. You can also define a callback function that
 * will be called with the following parameter ($image, $post_id, $format, $attr)
 */
function vvu_render_images($id, $format='post-thumbnail', $attr) {
  $output = "";
  $default_attr = array(
    'class' => '',
    'alt' => '',
    'title' => '',
    'pre_list' => '<ul>',
    'post_list' => '</ul>',
    'pre_item' => '<li>',
    'post_item' => '</li>',
    'no_images' => '',
    'echo' => true,
    'item_callback' => null,
  );

  $attr = wp_parse_args($attr, $default_attr);

  $images = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'attachment', 'post_mime_type' => 'image'));
  if (count($images)) {

    if (!is_null($attr['item_callback'])) {

      if (function_exists($attr['item_callback'])) {
        foreach ($images as $image) {
          $output .= call_user_func_array($attr['item_callback'], array($image, $id, $format, $attr));
        }
      } else {
        $output .= 'Error: item_callback not found';
      }
    } else {
      $output .= $attr['pre_list'];
      foreach ($images as $image) {
        $output .= $attr['pre_item'];
        $output .= wp_get_attachment_image($image->ID, $format, false, array('alt' => $attr['alt'], 'title' => $attr['title'], 'class'=>$attr['class']));
        $output .= $attr['post_item'];
      }
      $output .= $attr['post_list'];
    }

  } else {
    if ($attr['echo'])
      echo $attr['no_images'];

    return false;
  }

  if ($attr['echo']) {
    echo $output;
    return true;
  } else {
    return $output;
  }
}

/*
 * render the content of a post. you can customize the output by specifying a template.
 * you can also define a callback function taking the post and attributes
 *
 */
function vvu_render_post($id, $attr) {
  $output = "";
  $default_attr = array(
    'template' => '<h2>{{title}} - {{datetime}} </h2>{{content}}<a href="{{permalink_url}}">read more</a>',
    'echo' => true,
    'datetime' => 'd/m/Y H:m',
    'no_post_found' => '',
    'item_callback' => null,
    'thumbnail' => false,
    'thumbnail_format' => 'post-thumbnail',
    'thumbnail_attributes' => array('title'=>'', 'alt' => ''),
    'content' => true,
    'excerpt' => false,
  );

  $attr = wp_parse_args($attr, $default_attr);

  $post = get_post($id);

  if ($post) {
    if (!is_null($attr['item_callback'])) {

      if (function_exists($attr['item_callback'])) {
        foreach ($images as $image) {
          $output .= call_user_func_array($attr['item_callback'], array($post, $attr));
        }
      } else {
        $output .= 'Error: item_callback not found';
      }

    } else {

      $output = $attr['template'];
      $title = get_the_title($id);
      $thumbnail = "";

      if ($attr['thumbnail']) {
        $thumbnail = get_the_post_thumbnail($id, $attr['thumbnail_format'], $attr['thumbnail_attributes']);
      }

      $content = "";
      if ($attr['content']) {
        $content = $post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
      }

      $excerpt = "";
      if ($attr['excerpt']) {
        $excerpt = get_the_excerpt($id);
      }

      $the_time = get_post_time(get_option('time_format'), false, $post, true);
      $the_time = apply_filters('get_the_time', $the_time, $attr['datetime'], $post);
      $the_time = apply_filters('the_time', $the_time, $attr['datetime']);

      $permalink = apply_filters('the_permalink', get_permalink($id));

      $output = str_replace(array('{{title}}', '{{content}}', '{{permalink_url}}', '{{datetime}}', '{{thumbnail}}', '{{excerpt}}'), array($title, $content, $permalink, $the_time, $thumbnail, $excerpt), $output);

    }

  } else {
    if ($attr['echo'])
      echo $attr['no_post_found'];

    return false;
  }

  if ($attr['echo']) {
    echo $output;
    return true;
  } else {
    return $output;
  }
}

function vvu_get_fields($post_id = false) {
  // vars
  global $post;

  if(!$post_id) {
    $post_id = $post->ID;
  }

  // default
  $value = array();
  $keys = get_post_custom_keys($post_id);

  if($keys) {
    if (function_)

    foreach($keys as $key) {
      if(substr($key, 0, 1) != "_") {
        if (function_exists('get_field')) {
          $value[$key] = get_field($key, $post_id);
        } else {
          $value[$key] = get_post_meta($post_id, $key, true);
        }
      }
    }
  }

  // no value
  if(empty($value)) {
    return false;
  }

  return $value;
}



function hungertv_fb_like_button($url, $count="button_count") {
  // echo '<div class="htvfb-like" data-href="' . $url . '" data-send="false" data-layout="' . $count . '" data-width="80" data-height="20" data-show-faces="false"></div>';
  // so it seems that FB has a bug the FB.XFBML.parse(); generated version above
  // disappears after 45s for spurious reasons.
  // so we swtiched to the iframe version.
  // this unfortunately does not allow for the comment box after a like
  // but this made anyways trouble with the stacked button row.
  echo '<div class="htvfb-like"><iframe src="//www.facebook.com/plugins/like.php?href=' . $url . '&amp;width=80&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=229071657129108" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></div>';
}

function hungertv_twitter_button($url, $title, $count="horizontal") {
  echo '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . $url . '" data-text="' . $title . '" data-count="' . $count . '" data-via="hungermagazine">Tweet</a>';
}

function hungertv_pinit_button($url, $title, $featured_image, $position="beside") {
  echo '<span class="pin-it"><a href="http://pinterest.com/pin/create/button/?url=' . urlencode($url) . '&description=' . $title . '&media=' . $featured_image . '" data-pin-do="buttonPin" data-pin-config="' .$position . '"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" border="0" /></a></span>';
}

function hungertv_tumblr_button($url, $title, $excerpt) {
  echo '<a href="http://www.tumblr.com/share/link?url=' . urlencode($url) . '&name=' . urlencode($title) . '&description=' . urlencode(str_replace("\n", ' ', strip_tags($excerpt))) . '" title="Share on Tumblr" style="display:inline-block; text-indent:-9999px; overflow:hidden; width:62px; height:20px; background:url(\'http://platform.tumblr.com/v1/share_2.png\') top left no-repeat transparent;" class="tumblr-button">Share on Tumblr</a>';
}

function hungertv_reddit_button($url) {
  echo '<a target="_blank" class="reddit-button" href="http://www.reddit.com/submit" onclick="window.location = \'http://www.reddit.com/submit?url=' . urlencode($url) . '\'; return false"><img src="http://www.reddit.com/static/spreddit7.gif" alt="submit to reddit" border="0" /></a>';
}

function hungertv_email_button($url, $title) {
  echo '<a class="email-button" href="mailto:?subject=' . $title . '&body=' . $url . '">Email to a friend</a>';
}

function hungertv_gplus_share($url) {
  static $js_added = false;
  echo '<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60" data-href="' . $url . '"></div>';

  if (!$js_added) {
    $js = <<<EOF
      ;(function() {
        function loadGooglePlus(){
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = 'https://apis.google.com/js/plusone.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        }
        var oldonload = window.onload;
        window.onload = (typeof window.onload != 'function') ?
          loadGooglePlus : function() { oldonload(); loadGooglePlus(); };
      })();
EOF;
    addInlineScript($js);
    $js_added = true;
  }
}

function hungertv_fb_share_link($url, $title) {
  $title = html_entity_decode ($title, ENT_QUOTES);
  echo '<a class="fb" href="http://www.facebook.com/sharer.php?u=' . urlencode($url) . '&t=' . urlencode($title) . '" target="_blank">Share article on Facebook</a>';
}

function hungertv_twitter_share_link($url, $title) {
  $title = html_entity_decode ($title, ENT_QUOTES);
  echo '<a href="https://twitter.com/intent/tweet?text=' . urlencode($title) . '&url=' . urlencode($url) . '&via=hungermagazine" class="twitter" target="_blank">Tweet article on Twitter</a>';
}

function hungertv_pinterest_share_link($url, $title, $featured_image) {
  $title = html_entity_decode ($title, ENT_QUOTES);
  echo '<a href="http://pinterest.com/pin/create/button/?url=' . urlencode($url) . '' . $featured_image . '&description=' . urlencode($title) . '" class="pinterest" target="_blank">Pin article on Pinterest</a>
  ';
}

function hungertv_tumblr_share_link($url, $title, $excerpt) {
  $title = html_entity_decode ($title, ENT_QUOTES);
  echo '<a href="http://www.tumblr.com/share?v=3&u=' . urlencode($url) . '&t=' . urlencode($title) . '" class="tumblr" target="_blank">Post article on Tumblr</a>';
}

function hungertv_gplus_share_link($url) {
  echo '<a class="gplus" href="https://plus.google.com/share?url=' . urlencode($url) . '" target="_blank">Share on Google+</a>';
}

function hungertv_email_share_link($url, $title) {
  $title = html_entity_decode ($title, ENT_QUOTES);
  echo '<a class="email" href="mailto:?subject=' . urlencode($title)  . '&body=' . urlencode($url) . '">Email to a friend</a>';
}

function hungertv_get_blogger($author_id) {
   $bloggers = query_posts( 'post_type=blogger&posts_per_page=1&author=' . $author_id );

   wp_reset_query();
   if (count($bloggers)) {
     $blogger = array();
     $blogger['author_id'] = $author_id;
     $blogger['ID'] = $bloggers[0]->ID;
     $blogger['NAME'] = $bloggers[0]->post_title;

     $post_categories = wp_get_post_categories( $bloggers[0]->ID );
     foreach($post_categories as $c){
       $blogger['cat_id'] = (int)$c;
       $cat = get_category( (count($post_categories) > 1 && $post_categories[0] == 3174) ? $post_categories[1] : $post_categories[0]);
       $blogger['blog_url'] = "/blogs/" . $cat->slug . "/";
       break;
     }

     $blogger = array_merge($blogger, vvu_get_fields($blogger['ID']));

     if (array_key_exists('blogger_profile_picture', $blogger) && isset($blogger['blogger_profile_picture'])) {
       $blogger['blogger_profile_picture_image'] = wp_get_attachment_image($blogger['blogger_profile_picture'], 'sidebar', false, array('alt' => '', 'title' => ''));
     }
     if (array_key_exists('blogger_blogs_page_image', $blogger) && isset($blogger['blogger_blogs_page_image'])) {
       $blogger['blogger_blogs_page_image_image'] = wp_get_attachment_image($blogger['blogger_blogs_page_image'], 'original', false, array('alt' => '', 'title' => ''));
     }
     return $blogger;
   }
   return null;
}

$current_cat = null;
$current_parent_cat = null;
add_filter('category_template',  __NAMESPACE__ . '\\hungertv_category_template_filter');
function hungertv_category_template_filter(){
  global $current_parent_cat;
  global $current_cat;

  $cat = get_query_var('cat');
  $category = get_category ($cat);

  $file = TEMPLATEPATH . '/category.php';
  if ($category->category_parent != 0) {

    $current_parent_cat = $category->category_parent;
    $current_cat = $category->term_id;

    if ($category->category_parent == 3) {
      $file = TEMPLATEPATH . '/category-hungry.php';
    } else {
      $file = TEMPLATEPATH . '/category-all-blogs.php';
    }
  } else if ( file_exists(TEMPLATEPATH . '/category-' . $category->slug . '.php') ) {
    $file = TEMPLATEPATH . '/category-' . $category->slug . '.php';
  }
  return $file;
}

add_filter('single_template',  __NAMESPACE__ . '\\hungertv_single_post');
function hungertv_single_post($single_template) {
  global $post;
  global $current_parent_cat;
  global $current_cat;

  if ($post->post_type == 'post') {
    $do_hungry = false;

    $categories = wp_get_post_categories( $post->ID);

    $category = null;
    if (count($categories)) {
      $category = get_category ($categories[0]);
      $current_parent_cat = $category->category_parent;
      $current_cat = $category->term_id;
    }

    if (has_term( 'hungry', 'category', $post ) || !is_null($category) && ($category->term_id == 3 || $category->category_parent == 3)) {
      $do_hungry = true;
    }

    if ($do_hungry && file_exists(TEMPLATEPATH . "/single-hungry-post.php"))
        $single_template = dirname( __FILE__ ) . '/single-hungry-post.php';

  }
  return $single_template;
}

function hungertv_render_post_image_or_video($image, $post_id, $url, $do_share=true) {
  $output = "";
  $class = "";
  $return=FALSE;
  $do_video=TRUE;
  $img_prefix="";
  $img_postfix="";
  $video_fields = false;
  $format = "2column";

  if ($do_video && !$video_fields)
    $video_fields = hungertv_video_player_get_video_fields($image);

  $alt = trim(get_post_meta($image->ID, '_wp_attachment_image_alt', true));
  if ($video_fields && $video_fields['hasVideo']) {
    $output .= hungertv_video_player_get_player($image, $video_fields, $format, $post_id);

    if ($output != "") {
      $alt = trim(get_post_meta($image->ID, '_wp_attachment_image_alt', true));
      if ($format == "2column" && $alt != "") {
        $output = $output . "<div class=\"description\">$alt</div>";
      }
      if ($do_share)
        $output .= '<a href="' . $url . '#image-' . $post_id . '" class="sharePopUp">Share</a>';
    }
  } else {
    $formats = array(
      array(
        "format" => "1column",
        "pmin" => 0,
        "pmax" => 300
      ),
      array(
        "format" => "2column",
        "pmin" => 301
      )
    );
    $output .= $img_prefix . hungertv_responsive_image($image->ID, $formats, $attr=array('title' => '', 'class'=> $class)) . $img_postfix . "\n";

    if ($alt != "")
      $output .= "<div class=\"description\">$alt</div>" ;

    if ($do_share)
      $output .= '<a href="' . $url . '#image-' . $post_id . '" class="sharePopUp">Share</a>';
  }
  if ($return)
    return '<div class="image" id="image-' . $post_id . '">' . $output . "</div>";
  print '<div class="image" id="image-' . $post_id . '">' . $output . "</div>";;
}


add_action('wp_footer',  __NAMESPACE__ . '\\hungertv_slideshow');
function hungertv_slideshow() {
  if (isset($_GET['slideshow']) && (int)$_GET['slideshow'] == 1)
    echo '<div class="s-curtain"></div>';
}

function hungertv_get_latest_news_slideshow() {
  if (DO_AXON_FC):
    $key = "latest_news_slideshow";
    axon_fragment_cache($key, 'hungertv_render_latest_news_slideshow', 3600);
  else:
    hungertv_render_latest_news_slideshow();
  endif;
}

function hungertv_render_latest_news_slideshow(){
  global $wpdb;

  $term = get_term_by('slug', 'news', 'section');
  if (!$term)
    return;

  $articles = array();
  $sql = "  SELECT DISTINCT p.*
            FROM {$wpdb->posts} p
            LEFT JOIN {$wpdb->term_relationships} tr ON tr.object_id = p.ID
            LEFT JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
            LEFT JOIN {$wpdb->postmeta} m ON m.post_id=p.id AND m.meta_key='views'
            WHERE p.post_type='article' AND p.post_status='publish' AND tt.term_id=%d
            ORDER BY p.post_date DESC
            LIMIT 5;";
  $articles = $wpdb->get_results( $wpdb->prepare($sql, array($term->term_id)), OBJECT);

  if ($articles){
    echo '<aside class="trending addon listed has-cycle"><div class="wrapper"><div class="container">';

    echo '<h2>News News News</h2>';

    echo '<div class="slideshow"><ul class="slides cycle-slideshow cycle-slideshow-delayed-1000"
            data-cycle-auto-init="false"
            data-cycle-swipe="true"
            data-cycle-swipe-fx="fade"
            data-cycle-timeout="3000"
            data-cycle-speed="500"
            data-cycle-log="false"
            data-cycle-slides="> li"
            data-cycle-pause-on-hover="true"
            data-cycle-pager-template="<li><a href=#>{{slideNum}}</a></li>"
          ><ul class="cycle-pager"></ul>';
    foreach ($articles as $article) {
      vvu_render_post($article->ID, array(
        'template' => '<li><a href="{{permalink_url}}">{{thumbnail}}</a><h3>{{title}}</h3><a href="{{permalink_url}}">More</a></li>',
        'echo' => true,
        'thumbnail' => true,
        'thumbnail_format' => 'thumbnail',
        'content' => false,
        'excerpt' => false,
      ));
    }
    echo '</ul></div></div></div></aside>';
  }
}

function hungertv_get_most_viewed() {
  if (DO_AXON_FC):
    $key = "htv_most_viewed";
    $term = get_queried_object();
    if ($term){
      $key .= "_" . $term->term_id;
    }
    axon_fragment_cache($key, 'hungertv_render_most_viewed', 3600);
  else:
    hungertv_render_most_viewed();
  endif;
}

function hungertv_render_most_viewed(){
  global $wpdb;

  $term = get_queried_object();

  $articles = array();
  if ($term) {
    $sql = "  SELECT DISTINCT p.*
              FROM {$wpdb->posts} p
              LEFT JOIN {$wpdb->term_relationships} tr ON tr.object_id = p.ID
              LEFT JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
              LEFT JOIN {$wpdb->postmeta} m ON m.post_id=p.id AND m.meta_key='views'
              WHERE p.post_type='article' AND p.post_status='publish' AND tt.term_id=%d  AND p.post_date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
              ORDER BY CAST(m.meta_value AS SIGNED) DESC, p.post_date DESC
              LIMIT 3;";
    $articles = $wpdb->get_results( $wpdb->prepare($sql, array($term->term_id)), OBJECT);
  }

  if (count($articles) == 0) {
    $articles = hungertv_get_global_most_viewed();
  }

  if ($articles){
    echo '<aside class="trending addon listed has-cycle"><div class="wrapper"><div class="container">';

    echo '<h2>Trending</h2>';

    echo '<div class="slideshow"><ul class="slides cycle-slideshow cycle-slideshow-delayed-1000"
            data-cycle-auto-init="false"
            data-cycle-swipe="true"
            data-cycle-swipe-fx="fade"
            data-cycle-timeout="3000"
            data-cycle-speed="500"
            data-cycle-log="false"
            data-cycle-slides="> li"
            data-cycle-pause-on-hover="true"
            data-cycle-pager-template="<li><a href=#>{{slideNum}}</a></li>"
          ><ul class="cycle-pager"></ul>';
    foreach ($articles as $article) {
      vvu_render_post($article->ID, array(
        'template' => '<li><a href="{{permalink_url}}">{{thumbnail}}</a><h3>{{title}}</h3><a href="{{permalink_url}}">More</a></li>',
        'echo' => true,
        'thumbnail' => true,
        'thumbnail_format' => 'thumbnail',
        'content' => false,
        'excerpt' => false,
      ));
    }
    echo '</ul></div></div></div></aside>';
  }
}

function hungertv_get_global_most_viewed() {
  global $wpdb;
  $sql = "  SELECT DISTINCT p.ID
            FROM {$wpdb->posts} p
            LEFT JOIN {$wpdb->postmeta} m ON m.post_id=p.id AND m.meta_key='views'
            WHERE p.post_type='article' AND p.post_status='publish' AND p.post_date >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
            ORDER BY CAST(m.meta_value AS SIGNED) DESC, p.post_date DESC
            LIMIT 3;";
  return $wpdb->get_results( $wpdb->prepare($sql, array()), OBJECT);
}

function hungertv_stream_follow_us(){
  // ATTENTION FOLLOW US LINKS ARE ALSO USED IN partial-footer-follow-us.php
  echo '<aside class="follow-us addon listed"><div class="wrapper"><div class="container">';
  echo '  <h2>Follow us</h2>';
  echo '  <div class="links">';
  echo '  <a href="https://www.facebook.com/Hungertv" class="fb ir" target="_blank">View our Facebook page</a>';
  echo '  <a href="https://twitter.com/hungermagazine" class="twitter ir" target="_blank">View our Twitter page</a>';
  echo '  <a href="http://instagram.com/hungermagazine/" class="instagram ir" target="_blank">Vistit our Instagram profile</a>';
  echo '  <a href="http://www.youtube.com/user/TheHungerTV" class="yt ir" target="_blank">View our YouTube channel</a>';
  echo '  <a href="https://vimeo.com/hungertv" class="vimeo ir" target="_blank">Visit us on Vimeo</a>';
  echo '  <a href="http://hungertv.tumblr.com" class="tumblr ir" target="_blank">Visit us on Tumblr</a>';
  echo '  <a href="http://www.pinterest.com/hungermagazine" class="pinterest ir" target="_blank">Visit us on Pinterest</a>';
  echo '</div></div></div></aside>';
}

function xTimeAgo ($oldTime, $newTime, $timeType) {
    $timeCalc = strtotime($newTime) - strtotime($oldTime);
    if ($timeType == "x") {
        if ($timeCalc = 60) {
            $timeType = "m";
        }
        if ($timeCalc = (60*60)) {
            $timeType = "h";
        }
        if ($timeCalc = (60*60*24)) {
            $timeType = "d";
        }
    }
    if ($timeType == "s") {
        $timeCalc .= " seconds ago";
    }
    if ($timeType == "m") {
        $timeCalc = round($timeCalc/60) . " minutes ago";
    }
    if ($timeType == "h") {
        $timeCalc = round($timeCalc/60/60) . " hours ago";
    }
    if ($timeType == "d") {
        $timeCalc = round($timeCalc/60/60/24) . " day ago";
    }
    return $timeCalc;
}

function hungertv_get_active_bloggers($display = "all", $order_by="DATE") {
  global $wpdb;
  $out = array();

  if ($display == "all") {
    $sql = "SELECT u.ID, u.user_nicename, u.display_name,
          (SELECT pp.post_date FROM wp_posts pp WHERE pp.post_author = u.ID AND pp.post_status='publish' ORDER BY pp.post_date DESC LIMIT 1 ) as last_post,
          (SELECT b.ID FROM wp_posts b WHERE b.post_type='blogger' AND b.post_author = u.ID AND b.post_status='publish' LIMIT 1) as blogger_id
        FROM wp_users u
        WHERE u.id IN (SELECT DISTINCT p.post_author
        FROM wp_posts p
        WHERE p.post_author NOT IN (18, 1) AND p.post_type='post' AND p.post_status='publish')";
    if ($order_by == "DATE") {
      $sql .= " ORDER BY last_post DESC";
    } else if ($order_by == "NAME") {
      $sql .= " ORDER BY u.display_name ASC";
    }

  } else {
    $sql = "SELECT u.ID, u.user_nicename, u.display_name,
                   (SELECT pp.post_date FROM wp_posts pp WHERE pp.post_author = u.ID AND pp.post_status='publish' ORDER BY pp.post_date DESC LIMIT 1 ) as last_post,
                   (SELECT b.ID FROM wp_posts b WHERE b.post_type='blogger' AND b.post_author = u.ID AND b.post_status='publish' LIMIT 1) as blogger_id
            FROM wp_users u
            WHERE u.id IN (SELECT DISTINCT p.post_author
            FROM wp_posts p
            WHERE p.post_author NOT IN (1, 18)
              AND p.post_date > DATE_SUB(now(), INTERVAL 18 MONTH)";

              // AND p.post_author NOT IN (
              //   SELECT p.post_author
              //   FROM wp_posts p
              //   LEFT JOIN wp_term_relationships tr ON tr.object_id=p.id
              //   LEFT JOIN wp_term_taxonomy  tt ON tr.term_taxonomy_id=tt.term_taxonomy_id
              //   LEFT JOIN wp_terms t ON tt.term_id=t.term_id
              //   WHERE t.slug='guest-blogger-2' AND p.post_type='blogger')
    $sql .= " AND p.post_type='post' AND p.post_status='publish')
            ORDER BY last_post DESC";
  }

  $authors = $wpdb->get_results($sql);

  if ($authors && is_array($authors) && count($authors)) {
    foreach ($authors as $author) {


      $cats = wp_get_post_categories($author->blogger_id);
      if ($cats && is_array($cats) && count($cats)) {
        $c = get_category( (count($cats) > 1 && $cats[0] == 3174) ? $cats[1] : $cats[0]);
        $author->blog_url = "/blogs/" . $c->slug . "/";
      }

      $out[] = $author;
    }
  }

  return $out;
}

function hungertv_article_video_attributes($image, $class="gallery-video-player") {
  global $hungertv_video_player_js_added;

  if (empty($hungertv_video_player_js_added)) {
    wp_enqueue_script('videojs', get_asset_url() . "/js/videojs/video.min.js", array('jquery'), FALSE, TRUE);
    wp_enqueue_script('videojs-plugins', get_asset_url() . "/js/videojs-plugins.js", array('videojs'), FALSE, TRUE);
    addInlineScript('videojs.options.flash.swf="' . get_asset_url() . '/js/videojs/video-js.swf";');
    $hungertv_video_player_js_added = true;
  }

  $fields = $image['video'];
  $attr = array();

  $attr['data-image-large'] = $image['sizes']['gallery'];
  $attr['data-image-small'] = $image['sizes']['2column'];

  if ($fields['isStream']) {
    if (trim($fields['att_vimeo_mobile']) !== "")
      $attr['data-lowres'] = $fields['att_vimeo_mobile'];
    if (trim($fields['att_vimeo_standard']) !== "")
      $attr['data-standard'] = $fields['att_vimeo_standard'];
    if (trim($fields['att_vimeo_high']) !== "")
      $attr['data-highres'] = $fields['att_vimeo_high'];
    if (trim($fields['att_vimeo_live']) !== "")
      $attr['data-stream'] = $fields['att_vimeo_live'];
  } else if (trim($fields['youtube']) !== "") {
    $attr['data-youtube'] = $fields['youtube'];
  }

  $attr['data-tracking-info'] = $fields['tracking_info'];
  $attr['data-title'] = $fields["parent_title"];
  if ($fields['allowEmbed']) {
    $attr['data-embed'] = $fields["embedURL"];
    $attr['data-permalink'] = $fields["permalink"];
  }

  $out = ' class="' . $class . '"';
  foreach($attr as $name => $value){
    $out .= " " . $name .'="' . $value . '"';
  }

  return $out;
}

function hungertv_accordion_render_video($image, $fields) {
  global $hungertv_video_player_js_added;

  if (empty($hungertv_video_player_js_added)) {
    wp_enqueue_script('videojs', get_asset_url() . "/js/videojs/video.min.js", array('jquery'), FALSE, TRUE);
    wp_enqueue_script('videojs-plugins', get_asset_url() . "/js/videojs-plugins.js", array('videojs'), FALSE, TRUE);
    addInlineScript('videojs.options.flash.swf="' . get_asset_url() . '/js/videojs/video-js.swf";');
    $hungertv_video_player_js_added = true;
  }
  $attr = array('title' => '', 'alt' => '', 'class' => 'acc-dyn-video tmp');
  if ($fields['isStream']) {
    $attr['data-lowres'] = $fields['att_vimeo_mobile'];
    $attr['data-standard'] = $fields['att_vimeo_standard'];
    $attr['data-highres'] = $fields['att_vimeo_high'];
    $attr['data-stream'] = $fields['att_vimeo_live'];
  } else {
    $attr['data-youtube'] = 'https://www.youtube.com/watch?v=' . trim($image->post_excerpt);
  }
  $attr['data-title'] = $fields["parent_title"];
  $attr['data-tracking-info'] = $fields['tracking_info'];
  $attr['data-embed'] = false;
  if ($fields['allowEmbed']) {
    $attr['data-embed'] = $fields["embedURL"];
    $attr['data-permalink'] = $fields["permalink"];

  }
  return hungertv_accordion_get_image($image->ID, ".ai", $attr ) . "\n";
}

function hungertv_responsive_image($image_id, $formats = array(), $attr=array(), $has_video=false, $max_widths=false){
  $tag = "";
  $alt = "";
  $image = get_post( $image_id );

  if (!$image)
    return;

  if($image)
    $alt = trim(strip_tags( $image->post_excerpt));

  if (strpos($image->post_mime_type, "gif") !== false){
    $img = wp_get_attachment_image_src($image_id, 'original', false);
    if ($img){
      $class = ($img[1] >= $img[2])? "landscape":"portrait";
      $testImage2 =  $img[0];
      $tag = '<figure class="ri img-resp ' . $class . '"><img src="' . $testImage2 . '" alt="' . $alt . '" /></figure>';
    }
  }else{
    // opening <figure will be added on the very end to allow to have access to height and width
    $tag = '  <span data-alt="' . $alt . '" data-picture=""';
    foreach ( $attr as $name => $value ) {
      $tag .= " $name=" . '"' . $value . '"';
    }
    $tag .= '>';

    $large_url = "";
    $width = $height = 0;

    foreach ($formats as $format){
      $img = wp_get_attachment_image_src($image_id, $format['format'], false);
      if ($img){
        $large_url =  $img[0];
        $width = $img[1];
        $height = $img[2];
        $min = $max = '';
        if (isset($format['pmin']))
           $min = 'data-pmin="' . $format['pmin'] . '"';

        if (isset($format['pmax']))
           $max = 'data-pmax="' . $format['pmax'] . '"';

        $tag .= '    <span data-src="' . $large_url . '" data-pparent=".ri"' . $min . $max . '></span>';
      }
    }

    if ($large_url !== ""){
      $tag .= '    <!--[if (lt IE 9) & (!IEMobile)]><span data-src="' . $large_url . '"></span><![endif]-->';
      $tag .= '    <noscript><img src="' . $large_url . '" alt="' . $alt . '" /></noscript>';
    }
    $tag .= '  </span>';
    $tag .= '</figure>';

    $class = ($width >= $height)? "landscape":"portrait";
    if ($has_video)
      $class .= " has-video";

    $max_width = "";
    if (is_array($max_widths)) {
      if (array_key_exists("landscape", $max_widths) && ($width >= $height)){
        if ($width < $max_widths["landscape"]){
          $max_width = ' style="max-width: ' . $width . 'px;height:auto;"';
        }
      }
      if (array_key_exists("portrait", $max_widths) && ($height > $width)){
        if ($width <= $max_widths["portrait"]){
          $max_width = ' style="max-width: ' . $width . 'px;height:auto;"';
        }
      }

    }
    $tag = '<figure class="ri img-resp ' . $class . '"' . $max_width .' data-width="' . $width . '" data-height="' . $height . '">' . $tag;

  }
  return $tag;
}

function hungertv_v2_responsive_image($image_id, $formats = array(), $attr=array(), $show_video=true){
    $show_image = true;
    $has_video = false;
    $tag = "";
    $alt = "";
    $image = get_post( $image_id );
    if($image)
      $alt = trim(strip_tags( $image->post_excerpt));

    $video_fields = hungertv_video_player_get_video_fields($image);
    if ($video_fields) {
      $has_video = $video_fields && $video_fields['hasVideo'];
      if ($has_video && $show_video) {
        $tag .= '<div class="video-player-wrapper">' . hungertv_video_player_get_player($image, $video_fields, "2column") . "</div>";
        $show_image = false;
      }
    }


    if ($show_image){
      if (strpos($image->post_mime_type, "gif") !== false){
        $img = wp_get_attachment_image_src($image_id, 'original', false);

        if ($img){
          $class = ($img[1] >= $img[2])? "landscape":"portrait";
          $testImage = $img[0];
          $tag = '<figure class="ri img-resp lara' . $class . '"><img src="' . $testImage . '" alt="' . $alt . '" /></figure>';
        }
      }else{
        // opening <figure will be added on the very end to allow to have access to height and width
        $tag = '  <span data-alt="' . $alt . '" data-picture=""';
        foreach ( $attr as $name => $value ) {
          $tag .= " $name=" . '"' . $value . '"';
        }
        $tag .= '>';

        $large_url = "";
        $width = $height = 0;

        foreach ($formats as $format){
          $img = wp_get_attachment_image_src($image_id, $format['format'], false);
          if ($img){
            $large_url = $img[0];
            $width = $img[1];
            $height = $img[2];
            $min = $max = '';
            if (isset($format['pmin']))
               $min = 'data-pmin="' . $format['pmin'] . '"';

            if (isset($format['pmax']))
               $max = 'data-pmax="' . $format['pmax'] . '"';

            $tag .= '    <span data-src="' . $large_url  . '" data-pparent=".ri"' . $min . $max . '></span>';
          }
        }

        if ($large_url !== ""){
          $tag .= '    <!--[if (lt IE 9) & (!IEMobile)]><span data-src="' . $large_url . '"></span><![endif]-->';
          $tag .= '    <noscript><img src="' . $large_url . '" alt="' . $alt . '" /></noscript>';
        }
        $tag .= '  </span>';
        $tag .= '</figure>';

        $class = ($width >= $height)? "landscape":"portrait";
        if ($has_video)
          $class .= " has-video";
        $tag = '<figure class="ri img-resp lara' . $class . '" data-width="' . $width . '" data-height="' . $height . '">' . $tag;

      }
    }
    return $tag;
  }


function hungertv_accordion_get_image($image_id, $pparent, $attr=array()){
  $image_small = wp_get_attachment_image_src($image_id, '1column', false);
  $image = wp_get_attachment_image_src($image_id, 'featured', false);
  $image_large = wp_get_attachment_image_src($image_id, 'featuredlarge', false);

  $alt = "";
  $attachment = get_post( $image_id );
  if($attachment)
    $alt = trim(strip_tags( $attachment->post_excerpt));


  $tag = "";
  $tag .= '<figure class="ai img-resp">';
  $tag .= '  <span data-alt="' . $alt . '" data-picture=""';
  foreach ( $attr as $name => $value ) {
    $tag .= " $name=" . '"' . $value . '"';
  }
  $tag .= '>';
  $tag .= '    <span data-src="' . $image_small[0] . '" data-pparent="' . $pparent . '" data-pmax="320"></span>';
  $tag .= '    <span data-src="' . $image[0] . '" data-pparent="' . $pparent . '" data-pmin="321" data-pmax="636"></span>';
  $tag .= '    <span data-src="' . $image_large[0] . '" data-pparent="' . $pparent . '" data-pmin="637" data-pmax="1000"></span>';
  $tag .= '    <!--[if (lt IE 9) & (!IEMobile)]><span data-src="' . $image_large[0] . '"></span><![endif]-->';
  $tag .= '    <noscript><img src="' . $image_large[0] . '" alt="' . $alt . '" /></noscript>';
  $tag .= '  </span>';

  $caption = trim(get_post_meta($image_id , '_wp_attachment_image_alt', true));
  if ($caption !== ""){
    $tag .= '<div class="acc-caption"><div class="text">';
    $tag .= $caption;
    $tag .= '</div><div class="line"></div>';

    $credits = trim(strip_tags($attachment->post_content));
    if ($credits !== '') {
      $tag .= '<div class="credits">' . $credits . '</div>';
    }
    $tag .= '</div>';
  }

  $tag .= '</figure>';
  return $tag;
}

function add_video_wmode_transparent($html, $url, $attr) {
  if ( strpos( $html, "<embed src=" ) !== false )
     { return str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html); }
  elseif ( strpos ( $html, 'feature=oembed' ) !== false )
     { return str_replace( 'feature=oembed', 'feature=oembed&wmode=opaque', $html ); }
  else
     { return $html; }
}
add_filter( 'embed_oembed_html',  __NAMESPACE__ . '\\add_video_wmode_transparent', 10, 3);

function hungertv_comments_callback( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
  ?>
  <li class="post pingback">
    <p><?php _e( 'Pingback:', 'twentyeleven' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?></p>
  <?php
      break;
    default :
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div id="comment-<?php comment_ID(); ?>" class="comment">
      <div class="comment-author vcard">
        <?php
          $url    = get_comment_author_url( $comment->comment_ID );
          $author = get_comment_author( $comment->comment_ID );
          $lastname = get_comment_meta( $comment->comment_ID, 'lastname', true );

          if ( empty( $url ) || 'http://' == $url )
            $author_link = $author . " " . $lastname;
          else
            $author_link = "<a href='$url' rel='external nofollow' class='url'>$author $lastname</a>";

          /* translators: 1: comment author, 2: date and time */
          printf( __( '%1$s %2$s', 'twentyeleven' ),
            sprintf( '<span class="fn">%s</span>', $author_link ),
            sprintf( '<time pubdate datetime="%2$s">%3$s</time>',
              esc_url( get_comment_link( $comment->comment_ID ) ),
              get_comment_time( 'c' ),
              /* translators: 1: date, 2: time */
              sprintf( __( '%1$s at %2$s', 'twentyeleven' ), get_comment_date(), get_comment_time() )
            )
          );
        ?>

        <?php edit_comment_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
      </div><!-- .comment-author .vcard -->

      <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyeleven' ); ?></em>
        <br />
      <?php endif; ?>

      <div class="comment-content"><?php comment_text(); ?></div>

      <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentyeleven' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      </div><!-- .reply -->
    </div><!-- #comment-## -->

  <?php
      break;
  endswitch;
}

function htv_stream_image($pf_class="si", $attachment_id = null, $class="", $data=""){
  if (is_null($attachment_id))
    $attachment_id = get_post_thumbnail_id();

  if (is_null($attachment_id))
    return;

  $alt = "";
  $attachment = get_post( $attachment_id );
  if($attachment)
    $alt = trim(strip_tags( $attachment->post_excerpt));

  $content_column = false;
  $image = wp_get_attachment_image_src($attachment_id, '2column');
  if ($image) {
    list($content_column, $width, $height) = $image;
  }

  if (!$content_column)
    return;

  echo '<figure class="' . $pf_class . ' img-resp ' . $class . '"' . $data .' data-width="' . $width . '" data-height="' . $height . '">';
  echo '  <span class="s" data-alt="' . $alt . '" data-picture="">';

  $image = wp_get_attachment_image_src($attachment_id, '1column');
  if ( $image ) {
    list($src, $width, $height) = $image;
    echo '    <span data-src="' .  $src . '" data-pmax="300" data-pparent=".si" data-resizeparent="true"></span>';
  }
  $image = wp_get_attachment_image_src($attachment_id, '1column316');
  if ( $image ) {
    list($src, $width, $height) = $image;
    echo '    <span data-src="' .  $src . '" data-pmin="301" data-pmax="316" data-pparent=".si" data-resizeparent="true"></span>';
  }
  $image = wp_get_attachment_image_src($attachment_id, '1column400');
  if ( $image ) {
    list($src, $width, $height) = $image;
    echo '    <span data-src="' .  $src . '" data-pmin="317" data-pmax="400" data-pparent=".si" data-resizeparent="true"></span>';
  }
  echo '    <span data-src="' . $content_column . '" data-pmin="401" data-pmax="616" data-pparent=".si" data-resizeparent="true"></span>';
  echo '    <!--[if (lt IE 9) & (!IEMobile)]><span data-src="' . $content_column . '" data-pparent=".si" data-resizeparent="true"></span><![endif]-->';
  echo '    <noscript><img src="' . $content_column . '" alt="' . $alt . '" /></noscript>';
  echo '  </span>';
  echo '</figure>';
}




function _remove_script_version( $src ){
    $parts = explode( '?ver', $src );
        return $parts[0];
}
add_filter( 'script_loader_src',  __NAMESPACE__ . '\\_remove_script_version', 15, 1 );
add_filter( 'style_loader_src',  __NAMESPACE__ . '\\_remove_script_version', 15, 1 );



function overwrite_tinymce_height($meta_id, $object_id, $meta_key, $_meta_value){
  global $wpdb;

  if ($meta_key == "wp_user-settings"){
    $values = explode("&", $_meta_value);
    for($i=0; $i < count($values); $i++){
      if (strpos($values[$i], "ed_size") !== false){
        $values[$i] = "ed_size=500";
        break;
      }
    }
    $wpdb->query($wpdb->prepare( "UPDATE {$wpdb->usermeta} SET meta_value = %s WHERE umeta_id = %d", maybe_serialize(implode('&', $values)), $meta_id));
  }
}
add_action('updated_user_meta',  __NAMESPACE__ . '\\overwrite_tinymce_height', 10, 4);
