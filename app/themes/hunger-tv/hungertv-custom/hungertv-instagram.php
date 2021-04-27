<?php
/*
  ATTENTION: REQUIRES PECL OAUTH LIBRARY OR OAUTH
 */

define('OAUTH_CONSUMER_KEY', 'WVx8aH6CiCZfNxb8AKr5fA');
define('OAUTH_CONSUMER_SECRET', 'ot8fGeYi3lHVMOp7a9idbzUPCSaXdZRDOVp8zv9Ir4');

define('OAUTH_TOKEN', '412277058-vRbM6X7Xyoy2skcf8g6gODvlhdy6AxLuxGUYyiU');
define('OAUTH_TOKEN_SECRET', 'A80MgRGn4KmkrpzgK2xZnZBmh21paVnnhpREowHn4');

// the access token does sometimes expire
// unfortunately there is currently no full automatic way of retrieving an access token
// we've got a helper script http://staging.hungertv.com/test.instagram.php
// login via the link accept the access
// and you should find a new access token after the page's redirect
define('INSTAGRAM_ACCESS_TOKEN', '359097527.7058e05.d6ea0351a3504870ba100ae456af66cb');

/*
  Instagram User:
  user: hungermagzine
  passwd: studio66
  id: 359097527

  Instgram Client Id

  Name: Hunger TV
  Client ID   7058e05fb9fa4140a24bbeec48ec91d6
  Client Secret   5b755128e7f747ad8f9d62ac6f6f5024
  Website URL   http://www.hungertv.com
  Redirect URI  http://www.hungertv.com


  Get access token by

  https://api.instagram.com/oauth/authorize/?client_id=7058e05fb9fa4140a24bbeec48ec91d6&redirect_uri=http://www.hungertv.com&response_type=code

  Copy the code querysting parameter value: 1ad5aa757ce644cf9195e51473adc817

  fill into
  curl -F 'client_id=[clientID]' -F 'client_secret=[clientSecret]' -F 'grant_type=authorization_code' -F 'redirect_uri=[redirectURI]' -F 'code=[code]' https://api.instagram.com/oauth/access_token

  which makes:
  curl -F 'client_id=7058e05fb9fa4140a24bbeec48ec91d6' -F 'client_secret=5b755128e7f747ad8f9d62ac6f6f5024' -F 'grant_type=authorization_code' -F 'redirect_uri=http://www.hungertv.com' -F 'code=1ad5aa757ce644cf9195e51473adc817' https://api.instagram.com/oauth/access_token

  run in terminal

  take access tokin from JSON response:

  359097527.7058e05.b27d1389b51c42d0bf4777b54cfd2a09

 */
/*
function get_instagram($user_id=15203338,$count=6,$width=190,$height=190){




    // Also Perhaps you should cache the results as the instagram API is slow
    $cache = './'.sha1($url).'.json';
    if(file_exists($cache) && filemtime($cache) > time() - 60*60){
        // If a cache file exists, and it is newer than 1 hour, use it
        $jsonData = json_decode(file_get_contents($cache));
    } else {
        $jsonData = json_decode(());
        file_put_contents($cache,json_encode($jsonData));
    }

    $result = '<div id="instagram">'.PHP_EOL;
    foreach ($jsonData->data as $key=>$value) {
        $result .= "\t".'<a class="fancybox" data-fancybox-group="gallery"
                            title="'.htmlentities($value->caption->text).' '.htmlentities(date("F j, Y, g:i a", $value->caption->created_time)).'"
                            style="padding:3px" href="'.$value->images->standard_resolution->url.'">
                          <img src="'.$value->images->low_resolution->url.'" alt="'.$value->caption->text.'" width="'.$width.'" height="'.$height.'" />
                          </a>'.PHP_EOL;
    }
    $result .= '</div>'.PHP_EOL;
    return $result;
}
*/

function hungertv_instagram_feed() {
  $account = 'instagram';
  $cache = hungertv_instagram_feed_get_cache($account);
  if (!$cache) {
    $cache = "<!-- no instagram response -->";
    $url = 'https://api.instagram.com/v1/users/359097527/media/recent/?access_token=' . INSTAGRAM_ACCESS_TOKEN . '&count=15';

    if ($json = file_get_contents($url)) {
      $response = json_decode($json);

      if ($response && isset($response->data)) {

        $cache = '<ul class="slides cycle-slideshow"
            data-cycle-auto-init="false"
            data-cycle-swipe="true"
            data-cycle-swipe-fx="scrollHorz"
            data-cycle-timeout="3000"
            data-cycle-speed="500"
            data-cycle-log="false"
            data-cycle-slides="> li"
            data-cycle-pause-on-hover="true"
            data-cycle-pager-template="<li><a href=#>{{slideNum}}</a></li>"
          ><ul class="cycle-pager"></ul>';

        $c == 0;
        foreach ($response->data as $pic) {

          if ($pic->type == 'image') {
            $cache .= '<li>';
            $cache .= '<a href="' . $pic->link . '" target="_blank">';

            //$cache .= '<img src="' . hungertv_instagram_feed_cache_image($pic->images->standard_resolution->url) . '" width="306" height="306" alt=""/></a>';
            $cache .= '<img src="' . $pic->images->low_resolution->url . '" width="306" height="306" alt=""/></a>';
            $cache .= '</li>';
            $c++;
          }
          if ($c == 5)
            break;
        }
        $cache .= '</ul>';
      }

    }
    hungertv_instagram_feed_set_cache($account, $cache);
  }
  if ($cache != "<!-- no instagram response -->") {
    echo '<aside class="instagram addon listed has-cycle"><div class="wrapper"><div class="container">';
    echo '<h2><a href="http://instagram.com/hungermagazine/#" targer="_blank">Instagram</a></h2>';
    echo '<div class="slideshow">';
        echo $cache;
      echo '</div></div></div>';
    echo '</aside>';
  }else{
    echo $cache;
  }
}

function hungertv_instagram_feed_cache_image($url){
  $path = explode("/", $url);
  if (is_array($path) && count($path) > 1){
    $filename = 'instagram_cache_' . $path[count($path)-1];

    if (strpos($filename, ".jpg") !== FALSE){
      $uploaddir = wp_upload_dir();
      $uploadfile = $uploaddir['path'] . '/' . $filename;
      if (!file_exists($uploadfile)){
        if (@file_put_contents($uploadfile, file_get_contents($url))){
          if (class_exists('Imagick')){
            $image = new Imagick( $uploadfile );
            $image->resizeImage(182, 182, imagick::FILTER_LANCZOS, 0.85, true);
            $image->writeImage($uploadfile);
            $image->destroy();
          }
        }
      }

      $url = $uploaddir['baseurl'] . $uploaddir['subdir'] . '/' . $filename;
      if (function_exists('axon_asset_management_get_cdn_url')){
        $cdn_url = axon_asset_management_get_cdn_url();
        $site_url = get_bloginfo('url');
        return str_replace($site_url, $cdn_url, $url);
      }
    }
  }
  return $url;
}


function hungertv_instagram_feed_get_cache($id) {
  return wp_cache_get( 'hunger-tv-instagram-' . $id, 'hungertv');
}

function hungertv_instagram_feed_set_cache($id, $data) {
  wp_cache_set( 'hunger-tv-instagram-' . $id, $data, 'hungertv', 300);
}
