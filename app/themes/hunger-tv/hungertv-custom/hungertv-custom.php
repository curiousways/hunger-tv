<?php
/* Plugin name: HungerTV Custom
   Plugin URI: http://www.hungertv.com
   Author: Vincent Van Uffelen
   Author URI: http://thisisstudio.co.uk
   Version: 1.0
   Description: Custom tweaks for Hunger TV

 This plugin adds the following functionality

 + Adds a WYSIWYG editor to the user profile's user description field.
 *
*/
  include "hungertv-add-custom-post-types.php";
  include "hungertv-trending-video-acf.php";
  include "hungertv-improveadmintools.php";
  include "hungertv-widgets.php";
  include "hungertv-related-articles.php";
  // taken out functionality... include "hungertv-custom-feature-roll-sidebar-acf.php";
  // taken out include... "hungertv-twitter.php";
  include "hungertv-instagram.php";
  include "hungertv-rss.php";
  include "latest-post-date.php";
  // taken out functionality... include "hungertv-comments.php";
  include "hungertv-custom-article-acf-location-rule.php";
?>
