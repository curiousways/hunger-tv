<?php
  $theme_body_class = "page-axon-gallery";

  global $post;
  global $post_id;
  global $gallery_id;
  global $image_id;
  global $tmp_post;
  global $image_attachement_id;
  global $images;
  global $attachment;
  global $sections;
  global $gallery_version;

  $attachment = false;
  $post_id = get_query_var('post');
  $gallery_id = get_query_var('gallery');
  $image_id = get_query_var('image');
  $image_attachement_id = false;
  $tmp_post = get_post($post_id);
  $fields = false;
  $images = array();
  $gallery_version = "v3";

  if ($tmp_post && ($tmp_post->post_status == 'publish' || is_preview())){
    $fields = get_fields($tmp_post->ID);
    if (defined('HTV_LAST_V2_POST_ID')){
      if ($tmp_post->ID > HTV_LAST_V2_POST_ID){
        if (isset($fields['feature'])){
          $gallery_count = 0;
          $image_count = 0;
          foreach ($fields['feature'] as $paragraph) {
            if ($paragraph['acf_fc_layout'] == "gallery"){
              $gallery_count++;

              if ($gallery_count == $gallery_id){
                foreach ($paragraph['gallery'] as $image) {
                  if ($image['type'] != "image")
                    continue;

                  $image_count++;
                  if ($image_count == $image_id){
                    $image_attachement_id = $image['id'];
                  }

                  $image_info = array(
                    'ID' => $image['ID'],
                    'caption' => $image['alt'],
                    'alt' => $image['title'],
                    'credits' => $image['description'],
                    'width' => $image['width'],
                    'height' =>  $image['height'],
                    'sizes' => $image['sizes'],
                    'video' => hungertv_video_player_get_video_fields(null, $image['ID'])
                  );
                  if (is_array($image_info['video']) && count($image_info['video']) > 0){
                    $image_info['isvideo'] = true;
                    $image_info['video']['permalink'] = home_url('/gallery/' . $gallery_id . '/' . ($image_count + 1) . '/' . $tmp_post->post_name . '/');
                  }
                  $images[] = $image_info;
                }
              }
              if($image_attachement_id)
                break;
            }
          }
        }
      }else{
        $gallery_version = "v2";
        $attachments = get_children( array('post_parent' => $tmp_post->ID, 'post_status' => 'inherit', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'attachment', 'post_mime_type' => 'image'));
        $image_count = 0;

        $accordion_image = vvu_get_formatted_field('accordion_image', '{{value}}', false, $tmp_post->ID);
        $animated_gif = vvu_get_formatted_field('animated_gif', '{{value}}', false, $tmp_post->ID);

        foreach ($attachments as $image) {
          if ($image->ID == $accordion_image)
            continue;

          if ($image->ID == $animated_gif)
            continue;

          $info = wp_get_attachment_image_src($image->ID, 'original');

          if ( $info ) {
            list($src, $width, $height) = $info;

            $image_info = array(
              'ID' => $image->ID,
              'caption' => get_post_meta($image->ID, '_wp_attachment_image_alt', true),
              'alt' => $image->post_title,
              'credits' => $image->post_content,
              'width' => $width,
              'height' => $height,
              'sizes' => array(),
              'video' => hungertv_video_player_get_video_fields($image)
            );
            if (is_array($image_info['video']) && count($image_info['video']) > 0){
              $image_info['isvideo'] = true;
              $image_info['video']['permalink'] = home_url('/gallery/' . $gallery_id . '/' . ($image_count + 1) . '/' . $tmp_post->post_name . '/');
            }

            $sizes = array('slideshow_thumb', '1column','2column','slideshow','page','gallery');

            foreach ($sizes as $size) {
              $info = wp_get_attachment_image_src($image->ID, $size);
              list($src, $width, $height) = $info;
              if ($info) {
                $image_info['sizes'][$size] = $src;
                $image_info['sizes'][$size . "-width"] = $width;
                $image_info['sizes'][$size . "-height"] = $height;
              }
            }
            $images[] = $image_info;
          }

          $image_count++;
          if ($image_count == $image_id){
            $image_attachement_id = $image->ID;
          }
        }
      }
    }
  }else{
    header("HTTP/1.0 404 Not Found");
    include "404.php";
    exit();
  }

  if ($image_attachement_id)
    $attachment = get_post( $image_attachement_id );

  if (count($images) === 0 || !$image_attachement_id || !$attachment || !$post_id || !$gallery_id || !$image_id || !$tmp_post):
    header("HTTP/1.0 404 Not Found");
    include "404.php";
    exit();
  endif;

  function axon_gallery_opengraph_type( $type ) {
    return 'website';
  }
  add_filter( 'wpseo_opengraph_type', 'axon_gallery_opengraph_type', 10, 1 );


  function axon_gallery_wpseo_opengraph_desc($desc)   {
    global $post_id;

    if ($post_id) {
      $excerpt = trim(strip_tags(get_field('article_excerpt', $post_id)));
      if ($excerpt !== '')
        return $excerpt;
    }

    return trim($desc);
  }
  add_filter( 'wpseo_opengraph_desc', 'axon_gallery_wpseo_opengraph_desc', 10, 1 );
  add_filter( 'wpseo_twitter_description', 'axon_gallery_wpseo_opengraph_desc', 10, 1 );

  function axon_gallery_wpseo_metadesc($meta){
    global $post_id;

    if ($post_id) {
      $yoast_meta = get_post_meta($post_id, '_yoast_wpseo_metadesc', true);

      if ($yoast_meta && trim($yoast_meta) !== "") {
        $meta = $yoast_meta;
      } else {
        $tmp_meta = strip_tags(get_field('article_excerpt', $post_id));

        if (trim($tmp_meta) !== "")
          $meta = $tmp_meta;
      }
    }
    return $meta;
  }
  add_filter('wpseo_metadesc','axon_gallery_wpseo_metadesc', 10, 1);

  function axon_gallery_wpseo_canonical() {
    global $post_id;
    global $gallery_id;
    global $image_id;
    global $tmp_post;
    return home_url("/gallery/$post_id/$gallery_id/$image_id/" . $tmp_post->post_name . '/');
  }
  add_filter( 'wpseo_canonical', 'axon_gallery_wpseo_canonical', 10, 1 );

  function axon_gallery_wpseo_title() {
    global $tmp_post;
    global $gallery_id;
    global $image_id;
    return $tmp_post->post_title . ' - Gallery ' . $gallery_id . ' - Image ' . $image_id ;
  }
  add_filter( 'wpseo_title', 'axon_gallery_wpseo_title', 10, 1 );

  // configured in functions.php
  // function axon_gallery_wpseo_opengraph_image_size() {
  //   return 'slideshow';
  // }
  // add_filter( 'wpseo_opengraph_image_size', 'axon_gallery_wpseo_opengraph_image_size', 10, 1 );


  function axon_gallery_opengraph() {
    global $tmp_post;
    global $image_attachement_id;
    global $gallery_id;
    global $image_id;
    global $images;
    global $attachment;
    global $gallery_version;

    $caption = "";
    if ($attachment){
      $caption = trim(strip_tags( $attachment->post_excerpt));
      if ($caption != "")
        $caption .= " | ";
    }


    $hero_type = get_field('hero_type', $tmp_post->ID);
    $thumb = false;

    if ($hero_type === 'image' && $gallery_version === 'v3'){
      $hero_image = get_field('hero_image', $tmp_post->ID);
      $thumb = wp_get_attachment_image_src($hero_image['ID'], apply_filters( 'wpseo_opengraph_image_size', 'gallery' ) );
    }else{
      $thumb = wp_get_attachment_image_src($image_attachement_id, apply_filters( 'wpseo_opengraph_image_size', 'gallery' ) );
    }

    if(is_array($thumb) && count($thumb)){
      echo '<meta property="og:image" content="' . $thumb[0] . '" />' . "\n";
    }

    $seo_options = get_option('wpseo_social');

    echo '<meta name="twitter:card" content="gallery" />' . "\n";
    echo '<meta name="twitter:site" content="@' . $seo_options['twitter_site'] . '" />' . "\n";
    echo '<meta name="twitter:creator" content="@' . $seo_options['twitter_site'] . '" />' . "\n";
    echo '<meta name="twitter:title" content="' . $tmp_post->post_title . '">' . "\n";
    echo '<meta name="twitter:url" content="' . get_permalink($tmp_post->ID) .'" />' . "\n";

    if (is_array($images)){
      $image_count = 0;
      foreach ($images as $image) {
        echo '<meta name="twitter:image' . $image_count . '" content="' . $image['sizes']['gallery'] . '">' . "\n";

        if ($image_count >= 3)
          break;

        $image_count++;
      }
    }
  }
  add_action('wpseo_opengraph', 'axon_gallery_opengraph', 20);

  function axon_gallery_wpseo_twitter_image($img_url){
    global $tmp_post;
    global $image_attachement_id;
    global $gallery_version;

    $hero_type = get_field('hero_type', $tmp_post->ID);
    $thumb = false;

    if ($hero_type === 'image' && $gallery_version === 'v3'){
      $hero_image = get_field('hero_image', $tmp_post->ID);
      $thumb = wp_get_attachment_image_src($hero_image['ID'], apply_filters( 'wpseo_opengraph_image_size', 'gallery' ) );
    }else{
      $thumb = wp_get_attachment_image_src($image_attachement_id, apply_filters( 'wpseo_opengraph_image_size', 'gallery' ) );
    }

    if(is_array($thumb) && count($thumb))
      return $thumb[0];

    return $img_url;
  }

  add_filter('wpseo_twitter_image','axon_gallery_wpseo_twitter_image', 10, 1);

  // added also in helper
  function get_asset_url() {
    static $asset_url;
    if(!is_null($asset_url))
      return $asset_url;

    if (function_exists('axon_asset_management_asset_url')){
      $asset_url = axon_asset_management_asset_url();
    }else{
      // $asset_url = get_bloginfo('template_url');
      // added for dev testing
      $asset_url = '/app/uploads/';
    }

    return $asset_url;
  }

  wp_enqueue_script('gallery', get_asset_url() . "/js/gallery.js", array('custom'), FALSE, TRUE);

  $post = $tmp_post;
  setup_postdata($post);

  get_header('axon-gallery');

  $post = $tmp_post;
  setup_postdata($post);

  $formats = array(
    array(
      "format" => "1column",
      "pmin" => 0
    )
  );
?>
<section class="axon-gallery <?php echo $gallery_version; ?> loading">
  <div class="gallery-container" data-gallery-title="<?php the_title() ?>" data-gallery-id="<?php echo $gallery_id; ?>" data-gallery-image-id="<?php echo $image_id; ?>" data-gallery-url="/<?php echo str_replace(home_url('/'), '', home_url('/gallery/' . $post->ID . '/' . $gallery_id . '/###/' . $post->post_name .'/'));?>">
    <div class="gwconstraint">
      <div class="ghconstraint">
        <div class="images">
           <ul class="slides"
             data-auto-height="false"
             data-starting-slide="<?php echo max($image_id-1, 0); ?>"
             data-cycle-timeout="3000"
             data-cycle-speed="750"
             data-cycle-slides="> li"
             data-cycle-paused="true"
             data-cycle-pause-on-hover="true"
             data-cycle-swipe="true"
             data-cycle-swipe-fx="fade"
             data-cycle-log="false"
             data-cycle-caption=".gallery-caption"
             data-cycle-caption-template="<span class='num'>Image {{slideNum}} of {{slideCount}}</span><span class='caption'>{{cycleTitle}}</span>"
             data-cycle-pager="#cycle-pager"
             data-cycle-pager-template=""
             data-cycle-prev="> .cycle-prev, .arrow.prev"
             data-cycle-next="> .cycle-next, .arrow.next"
           >
            <?php
              $image_counter = 1;
              foreach($images as $image):
                ?>
              <li<?php echo ($image['isvideo'])? ' class="has-video"':' class="has-image"';?> data-cycle-title="<?php echo trim($image['caption']); ?>">
                <?php
                  $attr = "";
                  if ($image['isvideo']):
                    $attr = hungertv_article_video_attributes($image, "gallery-video-player vjs-16-9 video-js vjs-default-skin has-videojs");
                ?>
                  <div class="gallery-video-y-pos"><div class="gallery-video-container"><video <?php echo $attr; ?> id="gallery-player-<?php echo $image_counter; ?>"><span class="js-info"><span class="cell">Initializing video player</span></span></video></div></div>
                <?php else:
                  $credits = trim(str_replace("\n", "<br />", hungertv_parse_credits($image['credits'], false)));
                ?>
                  <figure class="gi img-resp <?php echo ($image['width'] >= $image['height'])? 'landscape':'portrait';?>" data-width="<?php echo $image['width']; ?>" data-height="<?php echo $image['height']; ?>">
                      <span data-alt="<?php echo trim($image['alt']); ?>" data-picture=""<?php echo $attr; ?>>
                  <?php
                  if (strpos($image['sizes']['1column'], ".gif") !== false) :
                    $img = wp_get_attachment_image_src($image['ID'], 'original', false);
                    if ($img) :
                      ?>
                      <span data-src="<?php echo $img[0]; ?>" data-pparent=".gi"></span>
                      <?php
                    endif;
                  else: ?>
                      <span data-src="<?php echo $image['sizes']['1column']; ?>" data-pmax="300" data-pparent=".gi"></span>
                      <span data-src="<?php echo $image['sizes']['2column']; ?>" data-pmin="301" data-pmax="616" data-pparent=".gi"></span>
                      <span data-src="<?php echo $image['sizes']['slideshow']; ?>" data-pmin="617" data-pmax="784" data-pparent=".gi"></span>
                      <span data-src="<?php echo $image['sizes']['page']; ?>" data-pmin="785" data-pmax="980" data-pparent=".gi"></span>
                      <span data-src="<?php echo $image['sizes']['gallery']; ?>" data-pmin="981" data-pmax="1600" data-pparent=".gi"></span>
                      <!--[if (lt IE 9) & (!IEMobile)]><span data-src="<?php echo $image['sizes']['page']; ?>"></span><![endif]-->
                      <noscript><img src="<?php echo $image['sizes']['page']; ?>" alt="<?php echo trim($image['alt']); ?>" /></noscript>
                  <?php endif; ?>
                    </span>
                  </figure>
                  <?php if ($credits !== "") : ?>
                  <aside class="info-content"><?php echo $credits; ?></aside>
                  <?php endif; ?>
                <?php endif; ?>
              </li>
            <?php
              $image_counter++;
              endforeach; ?>
            <div class="cycle-prev"></div>
            <div class="cycle-next"></div>
            <div class="arrow prev"></div>
            <div class="arrow next"></div>
            <div class="info"><h3>Info</h3><span></span></div>
          </ul>
        </div>
      </div>

    </div>
  </div>
  <aside class="sidebar">
    <h1><?php the_title(); ?></h1>
    <?php
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

    echo str_replace("\n", "", hungertv_parse_credits($fields['article_info'])); ?>
    <div class="gallery-caption"></div>
    <aside class="share"></aside>
    <aside class="dfp mpu">
      <div class='dfp' id='gpt-gallery-sidebar-mpu'>
           <script>
              if (window.googletag) {
                googletag.cmd.push(function() {
                  if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.gallery_sidebar_mpu !== 'undefined'){
                    googletag.display('gpt-gallery-sidebar-mpu');
                    googletag.pubads().refresh([primary_adslots.gallery_sidebar_mpu]);
                  }
                });
              }
           </script>
       </div>
    </aside>
    <ul id="cycle-pager" class="cycle-pager">
      <?php foreach($images as $image): ?>
        <li>
          <figure class="git img-resp<?php echo ($image['isvideo'])? ' has-video':'';?>" data-width="<?php echo $image['sizes']['slideshow_thumb-width']; ?>" data-height="<?php echo $image['sizes']['slideshow_thumb-height']; ?>">
            <span data-alt="<?php echo trim($image['alt']); ?>" data-picture="">
              <span data-src="<?php echo $image['sizes']['slideshow_thumb']; ?>"></span>
              <!--[if (lt IE 9) & (!IEMobile)]><span data-src="<?php echo $image['sizes']['slideshow_thumb']; ?>"></span><![endif]-->
              <noscript><img src="<?php echo $image['sizes']['slideshow_thumb']; ?>" alt="<?php echo trim($image['alt']); ?>" /></noscript>
            </span>
          </figure>
        </li>
      <?php endforeach; ?>
    </ul>
    <a href="<?php the_permalink(); ?>" class="close button">Back to Article</a>
    <a href="<?php echo home_url('/'); ?>" class="close button home">Home</a>
  </aside>
</section>
<aside class="interstitial <?php echo $gallery_version; ?>">
  <div class="wrapper">
    <div class="sidebar">
      <a href="#" class="close button">Close Advertisement</a>
    </div>
    <div class="content">
      <aside class="dfp mpu-hpu">
        <div class="dfp" id="gpt-gallery-mpu-hpu"></div>
      </aside>

      <div class="arrow prev"></div>
      <div class="arrow next"></div>
    </div>
  </div>
</aside>
<?php
  get_footer('axon-gallery');
?>
