<?php
/*
  ATTENTION: REQUIRES PECL OAUTH LIBRARY OR OAUTH
 */


define('OAUTH_CONSUMER_KEY', 'WVx8aH6CiCZfNxb8AKr5fA');
define('OAUTH_CONSUMER_SECRET', 'ot8fGeYi3lHVMOp7a9idbzUPCSaXdZRDOVp8zv9Ir4');

define('OAUTH_TOKEN', '412277058-vRbM6X7Xyoy2skcf8g6gODvlhdy6AxLuxGUYyiU');
define('OAUTH_TOKEN_SECRET', 'A80MgRGn4KmkrpzgK2xZnZBmh21paVnnhpREowHn4');

function hungertv_twitter_feed() {
  $account = 'hungermagazine';
  $cache = hungertv_twitter_feed_get_cache($account);
  if (!$cache) {
    $cache = "";
    try {
      $oauth = new OAuth(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET);
      $oauth->setToken(OAUTH_TOKEN, OAUTH_TOKEN_SECRET);
      $oauth->fetch("https://api.twitter.com/1.1/statuses/user_timeline.json?count=2");
      $results = json_decode($oauth->getLastResponse());

      if ($results) {
        $cache = '<ul>';
        foreach ($results as $tweet) {
          $cache .= '<li>';
          $cache .= '<p>' . hungertv_twitter_feed_link(strip_tags($tweet->text, '<a>')) . '</p>';
          $cache .= '<span>' . hungertv_twitter_feed_nice_time(strtotime(str_replace("+0000", "", $tweet->created_at))) . '</span>';
          $cache .= '</li>';
        }
        $cache .= '</ul>';
        $cache .= '<p class="follow"><a href="https://twitter.com/hungermagazine" target="_blank">Follow us on twitter</a>';
      } else {
        $cache = '<p class="follow">No tweets found</p>';
      }
      hungertv_twitter_feed_set_cache($account, $cache);
    } catch(OAuthException $e) {}
  }
  if ($cache != "") {
    echo '<aside id="twitter">';
      echo '<h3><a href="https://twitter.com/hungermagazine" target="_blank">Twitter</a></h3>';
      echo $cache;
    echo '</aside>';
  }
}

function hungertv_twitter_feed_get_cache($id) {
  return wp_cache_get( 'hunger-tv-twitter-' . $id, 'hungertv');
}

function hungertv_twitter_feed_set_cache($id, $data) {
  wp_cache_set( 'hunger-tv-twitter-' . $id, $data, 'hungertv', 300);
}


// thanks http://snipplr.com/view/53105/!
function hungertv_twitter_feed_nice_time($time) {
  $delta = time() - $time;
  if ($delta < 60) {
    return 'less than a minute ago';
  } else if ($delta < 120) {
    return 'about a minute ago';
  } else if ($delta < (45 * 60)) {
    return floor($delta / 60) . ' minutes ago';
  } else if ($delta < (90 * 60)) {
    return 'about an hour ago';
  } else if ($delta < (24 * 60 * 60)) {
    return 'about ' . floor($delta / 3600) . ' hours ago';
  } else if ($delta < (48 * 60 * 60)) {
    return '1 day ago.';
  } else {
    return floor($delta / 86400) . ' days ago';
  }
}

function hungertv_twitter_feed_link($text) {
  if (strpos($text, ' href="') === FALSE) {
    $text = html_entity_decode($text);
    $text = " ".$text;

    $text = preg_replace('/(\b(www\.|http\:\/\/)\S+\b)/', "<a target='_blank' href='$1'>$1</a>", $text);
    $text = preg_replace('/\#(\w+)/', "<a target='_blank' href='http://search.twitter.com/search?q=$1'>#$1</a>", $text);
    $text = preg_replace('/\@(\w+)/', "<a target='_blank' href='http://twitter.com/$1'>@$1</a>", $text);

  }
  return $text;
}