@php global $post_id;


  $post = get_post();
  $post_id = false;
  if ($post && isset($post->ID)){
    $post_id = $post->ID;
  }

  $is_section_redirect = trim(get_field('is_section_redirect', $post_id));
  if ($is_section_redirect === 'yes') {

    global $post;
    $sections = get_the_terms( $post, 'section' );
    if ($sections && is_array($sections)) {
      $url = false;
      foreach($sections as $s) {
        $url = trim(get_term_link($s, 'section'));
        break;
      }
      if ($url) {
        header("HTTP/1.1 301 Moved Permanently");
        header('Location: ' . $url);
        exit;
      }
    }
  }


  $is_version_3 = (defined('HTV_LAST_V2_POST_ID') && $post_id > HTV_LAST_V2_POST_ID && defined('HTV_LAST_V3_POST_ID') && $post_id <= HTV_LAST_V3_POST_ID);
//echo 'version 3';
//  echo $is_version_3;
  $is_version_4 = (defined('HTV_LAST_V3_POST_ID') && $post_id > HTV_LAST_V3_POST_ID);
//echo 'version 4';
//  echo $is_version_4;

  if ($is_version_4) { @endphp

@include('partials.content-single-article-v4')
 @php }

 else {

  function htv_article_wpseo_opengraph_desc($desc)   {
    global $post_id;

    if ($post_id) {
      $excerpt = trim(strip_tags(get_field('article_excerpt', $post_id)));
      if ($excerpt !== '')
        return $excerpt;
    }

    return trim($desc);
  }
  add_filter( 'wpseo_opengraph_desc', 'htv_article_wpseo_opengraph_desc', 10, 1 );
  add_filter( 'wpseo_twitter_description', 'htv_article_wpseo_opengraph_desc', 10, 1 );

  function htv_article_wpseo_metadesc($meta){
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
  add_filter('wpseo_metadesc','htv_article_wpseo_metadesc', 10, 1);

  function htv_article_v3_wpseo_og_image($img_url){
    global $post_id;
    $hero_type = get_field('hero_type', $post_id);
    $thumb = false;

    if ($hero_type === 'image'){
      $hero_image = get_field('hero_image', $post_id);
      $thumb = wp_get_attachment_image_src($hero_image['ID'], apply_filters( 'wpseo_opengraph_image_size', 'gallery' ) );

      if(is_array($thumb) && count($thumb))
        return $thumb[0];
    }

    return $img_url;
  }
  if ($is_version_3){
    add_filter('wpseo_twitter_image','htv_article_v3_wpseo_og_image', 10, 1);
    add_filter('wpseo_opengraph_image','htv_article_v3_wpseo_og_image', 10, 1);
  }
  @endphp

@php

    global $sectionsIDs;
    global $sections;

    $fields = get_fields();
@endphp
<div class="row no-gutters">
    <div class="col-sm-16 offset-sm-1">

  <aside class="paragraphs">
  @php
        $attachments = get_children( array('post_parent' => get_the_ID(), 'post_status' => 'inherit', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'attachment', 'post_mime_type' => 'image'));
        $images = array();

      $accordion_image =  App\vvu_get_formatted_field('accordion_image');
   $animated_gif = App\vvu_get_formatted_field('animated_gif');

        foreach ($attachments as $image) {
          if ($image->ID == $accordion_image)
            continue;

          if ($image->ID == $animated_gif)
            continue;

          $images[$image->ID] = $image;
        }

        $exclude = NULL;
        if (isset($fields['custom_embed_code'])
            && isset($fields['embed_code'])
            && trim($fields['embed_code']) != ""
            && ($fields['custom_embed_code'] == "above" || $fields['custom_embed_code'] == "replace")) :

          if ($fields['custom_embed_code'] == "replace") :
            if (count($images)) {
              $image = reset($images); // get first element of associative array without shifting it
              $exclude = $image->ID;
            }
          endif;

          echo '<div class="paragraph embed v2">';
          echo '<div class="payload">';
          echo $fields['embed_code'];
          echo '</div></div>';
        elseif (count($images) > 0) :
          $image = reset($images); // get first element of associative array without shifting it
          $class = "landscape";
          $formats = array(
            array(
              "format" => "1column",
              "pmin" => 0,
              "pmax" => 300
            ),
            array(
              "format" => "2column",
              "pmin" => 301
            ),
            array(
              "format" => "content",
              "pmin" => 617
            )
          );
          if ($info = wp_get_attachment_image_src($image->ID, $size='slideshow')) :
            if ($info[1] < $info[2])
              $class = "portrait";
          endif;
          @endphp
          <div class="paragraph image v2  @php echo $class; @endphp">

          </div>
          @php
        endif;
        @endphp
    <div class="paragraph copy v2">
    @php //the_content(); @endphp
    </div>
    @php
    //was count 0
  if (count($images) > 999999999) : @endphp
    <div class="paragraph gallery">
      <figure class="gallery-preview">
        <h3>Gallery</h3>
        <div class="images">

        @php
          $formats = array(
            array(
              "format" => "tiny",
              "pmin" => 0,
              "pmax" => 150
            ),
            array(
              "format" => "1column",
              "pmin" => 151
            )
          );
          global $post;
          $slug = get_post( $post )->post_name;
          $c = 1;
          foreach($images as $image) :
            echo '<a href="' . home_url('/gallery/' . get_the_ID() . '/1/' . $c . '/' . $slug . '/') .'">';
           // echo hungertv_v2_responsive_image($image->ID, $formats, array('title' => ''), false);
            echo '</a>';
            $c++;
            if ($c == 5)
              break;
          endforeach;
          @endphp
        </div>
        <a href=" @php echo home_url('/gallery/' . get_the_ID() . '/1/1/' . $slug . '/'); @endphp" class="teaser button">View all images</a>
      </figure>
    </div>
    @php endif; @endphp
 <!-- <div class="paragraph teads"><script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/81832/tag"></script></div> -->
  <div class="paragraph htvadv">
    <aside class="feature htvad embed mobkoi">
      <div class='dfp' id='gpt-feature-mobkoi'>
           <script>
              if (window.googletag) {
                googletag.cmd.push(function() {
                  if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.feature_mobkoi !== 'undefined'){
                    googletag.display('gpt-feature-mobkoi');
                    googletag.pubads().refresh([primary_adslots.feature_mobkoi]);
                  }
                });
              }
           </script>
       </div>
    </aside>
  </div>
  <div class="paragraph htvadv">
    <aside class="feature mpu htvad embed">
      <div class='dfp' id='gpt-feature-mpu-hpu'>
           <script>
              if (window.googletag) {
                googletag.cmd.push(function() {
                  if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.feature_mpu_hpu !== 'undefined'){
                    googletag.display('gpt-feature-mpu-hpu');
                    googletag.pubads().refresh([primary_adslots.feature_mpu_hpu]);
                  }
                });
              }
           </script>
       </div>
    </aside>
  </div>
</aside>
            </div>
            </div>


  @php
 global $is_article;
  global $sectionsIDs;
  global $fields;
  global $sections;




  $is_article = true;

  if (DO_AXON_FC):
      // this is a bit of a hack
      // but to avoid to load jwplayer.js all the time we have to go through the
      // cached content and check if a video player is used if so
      // embed the needed js.
      $fragment_key = 'htv_article_detail_' . get_the_ID();

      global $hungertv_video_player_js_added;
      $content = axon_fragment_cache($fragment_key, array('get_template_part', array('partial-single-article-detail-v3')), 86400, FALSE);
      if (strpos($content, 'has-videojs')){
        wp_enqueue_script('videojs', get_asset_url() . "/js/videojs/video.min.js", array('jquery'), FALSE, TRUE);
        wp_enqueue_script('videojs-plugins', get_asset_url() . "/js/videojs-plugins.js", array('videojs'), FALSE, TRUE);
        addInlineScript('videojs.options.flash.swf="' . get_asset_url() . '/js/videojs/video-js.swf";');
        $hungertv_video_player_js_added = true;
      }
    endif;
@endphp
<div id="content">
<article @php post_class() @endphp>
<div class="row no-gutters">
    <div class="col-sm-16 offset-sm-1 xl-margin">
  <header>
@php //echo HTV_LAST_V2_POST_ID @endphp

    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    <h5>Published on  @php the_time('d F Y'); @endphp</h5>

    {!! App\hungertv_parse_credits(get_field('article_info')) !!}

    @php get_template_part('partial-share'); @endphp
  </header>
  </div>
  <div class="col-sm-16 offset-sm-1 xl-margin">
  <div class="entry-content">
  @php the_content() @endphp
  @php
    global $sectionsIDs;
    global $sections;

    $fields = get_fields();

    $gallery_counter = 0;

    if (isset($fields['hero_type']) && ($fields['hero_type'] == "image" || $fields['hero_type'] == "video")) :
  @endphp
  <aside class="hero">
    @php if ($fields['hero_type'] == "image") :
      $image = array(
        'ID' => $fields['hero_image']['ID'],
        'caption' => $fields['hero_image']['caption'],
        'alt' => $fields['hero_image']['title'],
        'credits' => $fields['hero_image']['description'],
        'width' => $fields['hero_image']['width'],
        'height' =>  $fields['hero_image']['height'],
        'sizes' => $fields['hero_image']['sizes'],
        'video' => hungertv_video_player_get_video_fields(null, $fields['hero_image']['ID'])
      );
      $image['isvideo'] = false;
      if (is_array($image['video']) && count($image['video']) > 0){
        $image['isvideo'] = true;
        $image['video']['permalink'] = get_permalink();
      }
    @endphp
      @php
        $attr = "";
        if ($image['isvideo']):
          $attr = hungertv_article_video_attributes($image, "video-player video-js vjs-default-skin vjs-16-9 has-videojs");
      @endphp
        <div class="video-player-wrapper"><video @php echo $attr; @endphp id="video-player-hero"><span class="js-info"><span class="cell">Initializing video player</span></span></video></div>
      @php else:

          $img = wp_get_attachment_image_src($image['ID'], 'original', false);

          if ($img) :
          $imgUse =   $img[0];
     //     echo 'this is:';
     //     echo $imgUse;  @endphp


      <!--   <img src="@php echo $imgUse; @endphp" /> -->


            <figure class="">
              <img src="@php echo $imgUse; @endphp" alt="@php echo trim($image['alt']); @endphp" />
            </figure>
            @php
           @endphp

        @php



//$testImage = $image['sizes']['page'];
@endphp
<!--  <img src="@php echo $testImage; @endphp" /> -->
@php
// echo 'test';
       // echo ($image['width'] >= $image['height'])? 'landscape':'portrait';
     // echo $image['sizes']['1column'];
  // echo str_replace('/app/uploads/', 'http://hungertv.com/wp-content/uploads/', $image['sizes']['1column']);
        @endphp
   <!--    <figure class="">
              <img src="@php echo $image['url'] @endphp" alt="@php echo trim($image['alt']); @endphp" />
            </figure> -->
        @php endif; @endphp
      @php endif; @endphp
    @php endif; @endphp
    @php if ($fields['hero_type'] == "video") :

      $code =  $fields['hero_video'];
      if (stripos($code, "mixcloud") !== false){
        $matches = array();
        preg_match('/<iframe.*src=\".*\".*><\/iframe>/isU', $code, $matches);
        if (count($matches) > 0){
          $code = $matches[0];
        };
      }

      @endphp
      <div class="video-player-wrapper force-16-9"><div class="video-player">@php echo $code;@endphp</div></div>
    @php endif; @endphp
  </aside>
  @php endif; @endphp
  <header class="article-header" class="clearfix">
    <aside class="title">
    @php

    if ($sections) :
      $first = true;
      echo '<h2>';
      foreach ($sections as $section) :
        if (!$first)
          echo SECTIONS_SEPARATOR;
        @endphp<a href="@php echo bloginfo('url') . '/features/' . $section->slug; @endphp">@php echo $section->name; @endphp</a>@php
        $first = false;
      endforeach;
      echo '</h2>';
    endif @endphp

    </aside>
  </header>

  <aside class="paragraphs">
    @php
    if( have_rows('feature') ):
        $c = 1;
        while ( have_rows('feature') ) : the_row();
            if( get_row_layout() == 'copy' ):
              @endphp
                <div class="paragraph copy">
                  <div class="constraint">
                    <div class="copy">
                      @php the_sub_field('copy'); @endphp
                    </div>
                  </div>
                </div>
            @php
            elseif( get_row_layout() == 'embed_code' ):
              if (get_sub_field('embed_type') == "oEmbed") : @endphp
              <div class="paragraph embed oembed">
                  <div class="payload">@php echo get_sub_field('embed_oembed');@endphp</div>
              </div>

              @php elseif (get_sub_field('embed_type') == "embed"): @endphp
              <div class="paragraph embed">
                  <div class="payload">@php echo get_sub_field('embed_code');@endphp</div>
              </div>
              @php endif; @endphp
            @php
            elseif( get_row_layout() == 'image' ):
              $image = get_sub_field('image');
              if ($image):
                $class = "landscape";
                if ($image['width'] < $image['height'])
                  $class = "";

                $formats = array(
                  array(
                    "format" => "1column",
                    "pmin" => 0,
                    "pmax" => 300
                  ),
                  array(
                    "format" => "1column316",
                    "pmin" => 0,
                    "pmax" => 316
                  ),
                  array(
                    "format" => "1column400",
                    "pmin" => 0,
                    "pmax" => 400
                  ),
                  array(
                    "format" => "feature-content-portrait",
                    "pmax" => 588
                  ),
                  array(
                    "format" => "feature-content-landscape",
                    "pmin" => 589
                  )
                );

                $caption = trim(get_sub_field('caption'));
                @endphp<div class="paragraph ">
                <img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt'] @endphp" />
                @php

                    if ($caption !== "") :
                      @endphp<span class="caption">@php echo $caption; @endphp</span>
                    @php endif;
                   @endphp
                </div>@php
              endif;
            elseif( get_row_layout() == 'quote' ):
              $quote = trim(get_sub_field('quote'));
              if ($quote !== "") :
              @endphp<div class="paragraph tweet_embed art-margin">
                  <div class="tweet">@php echo $quote; @endphp</div>
                    @php $quote = (strlen($quote) > 140) ? substr($quote, 0, 137) . '...' : $quote;@endphp


                    <a href="https://twitter.com/intent/tweet?text=@php echo urlencode($quote); @endphp&url=http://hungertv.com/{{ get_permalink() }}&via=hungermagazine" class="twitter retweet" target="_blank">Retweet this quote</a>

                </div>@php
              endif;
            elseif( get_row_layout() == 'question_and_answer') : @endphp
              <div class="paragraph qa">
                  <div class="question">@php echo get_sub_field('question');@endphp</div>
                  <div class="answer">@php echo get_sub_field('answer');@endphp</div>
              </div>
             @php
            elseif( get_row_layout() == 'video') :
              $type = get_sub_field('type');

              if ($type == "embed") :
                $code = get_sub_field('embed_url');
                if (stripos($code, "mixcloud") !== false){
                  $matches = array();
                  preg_match('/<iframe.*src=\".*\".*><\/iframe>/isU', $code, $matches);
                  if (count($matches) > 0){
                    $code = $matches[0];
                  };
                }
                @endphp
                <div class="paragraph video">
                    <div class="video-player-wrapper force-16-9"><div class="video-player">@php echo $code; @endphp</div></div>
                </div>
              @php elseif ($type == "htvplayer") :
                  $image = get_sub_field('poster');
                  if ($image){
                    $video = hungertv_video_player_get_acf_player($image['ID'], get_the_ID(), "slideshow");
                  }else{
                    $video = "";
                  }

                if (trim($video)) :
                  @endphp
                  <div class="paragraph video">
                      <div class="video-player-wrapper"><div class="video-player has-videojs">@php echo $video; @endphp</div></div>
                  </div>
                @php endif;
              endif;
            elseif( get_row_layout() == 'gallery') :
              $images = get_sub_field('gallery');
              if (is_array($images) && count($images) > 0): @endphp
                  <div class="paragraph gallery">
                    <figure class="gallery-preview">
                      <h3>@php echo the_sub_field('name'); @endphp</h3>

                      <div class="images">
                      @php

                        global $post;
                        $slug = get_post( $post )->post_name;
                        if (trim($slug) == "")
                          $slug = "preview";

                     //   $gallery_counter++;
                      //  $c = 1;
                        @endphp
                        <div class="hunger-gallery">
                        @php
                        foreach($images as $image) :
@endphp
<div><img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt'] @endphp" /></div>


@php
                     //     $image['video'] = hungertv_video_player_get_video_fields(null, $image['ID']);
                     //     $image['isvideo'] = is_array($image['video']);

                        //  echfref="' . home_url('/gallery/' . get_the_ID() . '/' . $gallery_counter .  '/' . $c . '/' . $slug . '/') . ((is_preview())? '?preview=true':'') .'">';
                       @endphp

                       @php
                          echo '</a>';
                  //        $c++;
                   //       if ($c == 5)
                  //          break;
                        endforeach;
                      @endphp
                      </div>
                      </div>

                    </figure>
                  </div>
              @php
              endif;
            endif;
          if ($c == 2) : @endphp
            <div class="paragraph teads"><script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/81832/tag"></script></div>
          @php
          endif;
          if ($c == 4) : @endphp
            <div class="paragraph htvadv">
              <aside class="feature htvad embed mobkoi">
                <div class='dfp' id='gpt-feature-mobkoi'>
                     <script>
                        if (window.googletag) {
                          googletag.cmd.push(function() {
                            if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.feature_mobkoi !== 'undefined'){
                              googletag.display('gpt-feature-mobkoi');
                              googletag.pubads().refresh([primary_adslots.feature_mobkoi]);
                            }
                          });
                        }
                     </script>
                 </div>
              </aside>
            </div>
            @php
          endif;

          $c++;
        endwhile;
        @endphp
        <div class="paragraph htvadv">
          <aside class="feature mpu htvad embed">
            <div class='dfp' id='gpt-feature-mpu-hpu'>
                 <script>
                    if (window.googletag) {
                      googletag.cmd.push(function() {
                        if (typeof primary_adslots !== 'undefined' && typeof primary_adslots.feature_mpu_hpu !== 'undefined'){
                          googletag.display('gpt-feature-mpu-hpu');
                          googletag.pubads().refresh([primary_adslots.feature_mpu_hpu]);
                        }
                      });
                    }
                 </script>
             </div>
          </aside>
        </div>
        @php
    endif;
  @endphp
  </aside>
  </div>


  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  @php //comments_template('/partials/comments.blade.php') @endphp
</article>
@php } @endphp
