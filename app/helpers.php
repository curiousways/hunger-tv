<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    if (remove_action('wp_head', 'wp_enqueue_scripts', 1)) {
        wp_enqueue_scripts();
    }

    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

function vvu_get_formatted_field($key, $template='{{value}}', $the_content=false, $post_id = false) {
    // vars
    global $post;

    if(!$post_id) {
      $post_id = $post->ID;
    }

    if (function_exists('get_field')) {
      $field = get_field($key, $post_id);
    } else {
      $field = get_post_meta($post_id, $key, true);
    }

    if ((string)$field != '') {
      if ($the_content) {
        $field = apply_filters('the_content', $field);
        $field = str_replace(']]>', ']]&gt;', $field);
      }
      return str_replace('{{value}}', $field, $template);
    }
  }

  function vvu_formatted_field($key, $template='{{value}}', $the_content=false, $post_id = false) {
    echo vvu_get_formatted_field($key, $template, $the_content, $post_id);
  }

  function vvu_get_featured_image_url($id, $format='thumbnail') {
    if (has_post_thumbnail($id)) {
      $post_thumbnail_id = get_post_thumbnail_id( $id );
      if ($post_thumbnail_id) {
        if ($info = wp_get_attachment_image_src($post_thumbnail_id, $size='2column')) {
          return $info[0];
        }
      }
    }
    return '';
  }



function hungertv_get_first_terms() {
    $terms = array();
    $categories = get_the_category();
    if ($categories) {
      foreach($categories as $c) {
        $terms[] = $c->slug;
        break;
      }
    }

    $sections = get_the_terms( false, 'section' );
    if ($sections) {
      foreach($sections as $s) {
        $terms[] = $s->slug;
        break;
      }
    }
    return implode(' ', $terms);
  }

  function hungertv_get_first_category() {
    $categories = get_the_category();
    if ($categories) {
      foreach($categories as $c) {
        return $c;
        break;
      }
    }
    return false;
  }

  function hungertv_get_main_sections($post_id=false) {
    $main_sections = false;
    $sections = get_the_terms( $post_id, 'section' );
    if ($sections) {
      $main_sections = array();
      foreach($sections as $s) {
        if ($s->parent == "0" ) {
          $main_sections[$s->term_id] = $s;
        } else if (!array_key_exists($s->parent, $main_sections)) {
          $s = get_term($s->parent, 'section');
          $main_sections[$s->term_id] = $s;
        }
      }
    }
    return $main_sections;
  }


  function hungertv_parse_credits($credits, $wrap_in_aside="true") {
    $lines = "";
    if (strpos($credits, '@@@') !== false) {
      $lines = explode("\n", str_replace("\n\n", "\n", trim($credits)));
      for ($i = 0; $i < count($lines); $i++) {
        if (strpos($credits, '@@@') !== false && trim($lines[$i]) != "") {
          $lines[$i] = '<b>' . str_replace("@@@", '</b> ', $lines[$i]);
        }
      }
      if ($wrap_in_aside){
        return '<aside class="credits" data-lines="' . count($lines) .'"><span>' . implode('<br/>', $lines) . "</span></aside>";
      }else{
        return '<span>' . implode('<br/>', $lines) . "</span>";
      }

    }
  }
  function hungertv_parse_credits2($credits, $wrap_in_aside="true") {
    $lines = "";
    if (strpos($credits, '@@@') !== false) {
      $lines = explode("\n", str_replace("\n\n", "\n", trim($credits)));
      for ($i = 0; $i < count($lines); $i++) {
        if (strpos($credits, '@@@') !== false && trim($lines[$i]) != "") {
          $lines[$i] = '<b>' . str_replace("@@@", '</b> ', $lines[$i]);
        }
      }
      if ($wrap_in_aside){
        return '<aside class="credits" data-lines="' . count($lines) .'"><span>' . implode('<br/>', $lines) . "</span></aside>";
      }else{
        return '<span>' . implode('<br/>', $lines) . "</span>";
      }

    }
  }
  function get_asset_url() {
    static $asset_url;
    if(!is_null($asset_url))
      return $asset_url;

    if (function_exists('axon_asset_management_asset_url')){
      //$asset_url = axon_asset_management_asset_url();
      $asset_url = 'http://hungertv.com/wp-content/uploads/';
    }else{
      // $asset_url = get_bloginfo('template_url');
      // added for dev testing
      $asset_url = 'http://hungertv.com/wp-content/uploads/';
    }

    return $asset_url;
  }

