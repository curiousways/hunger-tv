@php


 // $preview= get_query_var( 'preview', 1 ); echo $preview; echo 'is it?';
require_once(ABSPATH . 'wp-load.php');
global $wp_query;global $wp_query;
if ($preview =='yes') { @endphp
  <h1 class="sm-margin">{!! get_the_title() !!}</h1>
  @php
}

 else {

    @endphp
{{--{{ dd(get_defined_vars()) }} --}}

<article @php post_class() @endphp>
  <header>
  <div class="row no-gutters">
    <div class="col-md-7 offset-1 col-15 order-2 order-md-1 xl-margin mobile-sm">
    <h2 class="post-cats editorial-main">@include('partials/categories', ['post_is' =>  $post->ID])</h2>

      <h1 class="sm-margin">{!! get_the_title() !!}</h1>
    </div>
    <div class="col-md-9 offset-md-1 order-1 order-md-2 offset-2 col-16 right main-image">
   @php // Use the build-in function if WP
if(wp_is_mobile()) // On mobile
{
      
           if ( has_post_thumbnail() )  {
    $imgdata = wp_get_attachment_image_src( get_post_thumbnail_id(), 'article-desk-new' ); //change thumbnail to whatever size you are using
    $imgwidth = $imgdata[1]; // thumbnail's width  
      $imgbol = $imgdata[3]; // boolean 
     // echo $imgheight;
   // $wanted_width = 929; //change this to your liking
    if ( ($imgbol == 1 ) ) {
        the_post_thumbnail('article-desk-new');
    } else { 
        the_post_thumbnail('article-desk');
    }
}
     
    
}
else
{
      
      if ( has_post_thumbnail() )  {
    $imgdata = wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-lg-new' ); //change thumbnail to whatever size you are using
    $imgwidth = $imgdata[1]; // thumbnail's width  
      $imgbol = $imgdata[3]; // boolean 
     // echo $imgheight;
   // $wanted_width = 929; //change this to your liking
    if ( ($imgbol == 1 ) ) {
        the_post_thumbnail('home-lg-new');
    } else { 
        the_post_thumbnail('home-lg');
    }
}
}
      @endphp
      <div class="sm-margin text-left">
     {!! App\hungertv_parse_credits(get_field('article_info')) !!}
    </div>
    </div>
  </div>
  </header>
  <section class="row no-gutters mobile-md">
    <div class="col-sm-16 offset-sm-1 center">

<div class="mobile-ad">
<!-- /64193083/MOB_MPU_LEADER_2 -->
<div id='div-gpt-ad-1533727476269-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1533727476269-0'); });
</script>
</div>
</div>

      <div class="desk-ad">
     <!-- /64193083/BILLBOARD_LEADERBOARD -->
<div id='div-gpt-ad-1529145463897-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145463897-0'); });
</script>
</div>
</div>

</div>
</section>
  <div class="row no-gutters lg-margin mobile-md">
    <div class="col-lg-10 col-md-14 col-16 offset-1" id="sticky-art-start">
      <h3>{!!  get_field('standfirst') !!}</h3>
      <div class="paragraph teads"><script type="text/javascript" class="teads" async="true" src="//a.teads.tv/page/81832/tag"></script></div>
      @php
      $isfirstfull = 'yes';
        // check if the flexible content field has rows of data
        if( have_rows('article_builder') ):

            // loop through the rows of data
            while ( have_rows('article_builder') ) : the_row();
                //paragraphs
                if( get_row_layout() == 'paragraphs' ):
                  echo '<div class="art-margin para">
                  <!-- paragraphs -->';
                  the_sub_field('paragraphs');
                  echo '</div>';

                elseif( get_row_layout() == 'ad_unit' ):
                  echo '<div class="center art-margin">
                  <!-- ad unit -->';
                  the_sub_field('ad_unit');
                  echo '</div>';

                  elseif( get_row_layout() == 'freeform_html' ):
                  echo '<div class="art-margin">
                  <!-- freeform html -->';
                  the_sub_field('freeform_html');
                  echo '</div>';





                elseif( get_row_layout() == 'call_to_action' ):
                  echo '<!-- call to action -->';
                  echo '<div class="cta art-margin">';
$cta = get_sub_field('call_to_action');
$first_tag = '';
$posttags = get_the_tags();
$count=0;
if ($posttags) {
  foreach($posttags as $tag) {
    $count++;
    if (1 == $count) {
      $first_tag = $tag->name;
    }
  }
}
$cta = str_replace("[first tag]",$first_tag,$cta);
                  echo $cta;
                  echo '</div>';

                 elseif( get_row_layout() == 'image' ):

                $full_width = get_sub_field('image_display_options');

                if ($full_width != 'full-bleed') {
                  echo '<!-- image inline  -->';
                  echo '<div class="image">';
                  $image = get_sub_field('image');
                  $image_credit = get_sub_field('image_credit');

                  @endphp
                  <img src="@php echo $image['sizes']['gallery-2']; @endphp" alt="@php echo $image['alt']; @endphp" class="art-margin" />
                @php  if ($image_credit) {
              @endphp

<div class="share-me">
                  <p class="caption">@php echo $image_credit; @endphp</p>
                  <div class="social social-hide">
      @include('partials/social', ['post_is'=> $post->ID])
      </div></div>

                  @php
}
                  echo '</div>';
                }
                else {
                  echo '<!-- image full width  -->';


                  $image = get_sub_field('image');

                @endphp

                </div>
                @php  if ($isfirstfull == 'yes') { @endphp
                  <div class="col-md-4  offset-md-2">
                  <div  id="sticky-art-ad">
<!-- /64193083/MPU_DMPU -->
<div id='div-gpt-ad-1529145788203-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145788203-0'); });
</script>
</div>
</div>
               @php    $isfirstfull == 'no';
                } @endphp
                </div>
                <div class="row">
                <div class="col-sm-18  art-margin">
                <img src="@php echo $image['sizes']['gallery-2']; @endphp" alt="@php echo $image['alt']; @endphp" class="art-margin" />
@php
$image_credit = get_sub_field('image_credit');
                  if ($image_credit) {
              @endphp


                 <div class="share-me"><p class="caption">@php echo $image_credit; @endphp</p>
                  <div class="social social-hide">
      @include('partials/social', ['post_is'=> $post->ID])
      </div></div>
                  @php
}
@endphp

                </div>

                </div>
                <div class="row">
                <div class="col-lg-10 col-md-14 col-16 offset-1">

@php

                }

                elseif( get_row_layout() == 'subheader' ):
                  echo '<!-- subheader -->';
                  echo '<div class="para"><h3>';
                  the_sub_field('subheader');
                  echo '</h3></div>';

                  elseif( get_row_layout() == 'spotify_audio' ):
                  echo '<!-- spotify -->';
                  echo '<div class="spotify-audio art-margin">';

                  the_sub_field('spotify_audio');
                  echo '</div>';


                  elseif( get_row_layout() == 'tweet_embed' ):
                  echo '<!-- tweet embed -->';
                  echo '<div class="tweet_embed art-margin">';

                  @endphp





                   <blockquote class="twitter-tweet" data-lang="en">
<a href="@php the_sub_field('tweet_embed'); @endphp"></a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                    @php
 echo '</div>';


                  elseif( get_row_layout() == 'instagram_embed' ):
                  echo '<!-- instagram -->';
                  echo '<div class="instagram-embed">';

                  the_sub_field('instagram_embed');
                  echo '</div>';

                   elseif( get_row_layout() == 'hungry_for_more_like_this' ):
                  echo '<!-- hungry for more like this - enabled? -->';




 elseif( get_row_layout() == 'gallery') :
  echo '<!-- gallery 2-->';
              $images = get_sub_field('image');


if (!$images == '') {
  echo '<!-- gallery 2 h-->';
  @endphp
 
                      <div class="hunger-gallery lg-margin">
@php
$count =  count( $images );
$i = 1;
foreach($images as $image) :
  @endphp
  <div><img src="@php echo $image['sizes']['gallery-2']; @endphp" alt="@php echo $image['alt'] @endphp" />
  @php if ($image['caption']) {
    @endphp
<div class="share-me">
  <div class="share-this"> @php echo $image['caption'] @endphp</div>
  <div class="social social-hide"> @include('partials/social', ['post_is'=> $post->ID])</div></div>
@php
}
@endphp

</div>

  @php
                          if($i == $count):
                            @endphp
                            <div><img src="@php echo $image['sizes']['gallery-2']; @endphp" alt="@php echo $image['alt'] @endphp" />
                          <div class="gallery-more">

                            <div class="row">

                              <div class="col-sm-10  gallery-more-hold">
                              <div class="row no-gutters">
                                <div class="col-sm-15 offset-sm-1 md-margin">
                                <div class="social social-gallery">
                                  @include('partials/social', ['post_is'=> $post->ID])
                                </div>
                                <h4>Like this article? Share the love.</h4>
                                <h5>Hungry for more like this?</h5>
                          </div>
                          </div>
                          </div>

</div>

                                @include('partials/two-more-gallery')

                              </div>
                              </div>



                            @php
                          endif;
                          $i++;
                          if ($i > $count) { $i = 1; } @endphp

@php

  endforeach;

@endphp
</div>
                    
@php
}
else {
}








                  elseif( get_row_layout() == 'pullquote' ):

                      $full_width = get_sub_field('pullquote_display_options');

                 
                        echo '<!-- no full & no right column pull quote -->';
                        echo '
                        <aside class="pquote">
                          <blockquote>';
                            the_sub_field('pullquote');

                      echo'</blockquote>
                        </aside>';

                      $retweet = get_sub_field('add_tweet_this_quote');
                  if ($retweet == 'yes') {
                    @endphp

                      @php $quote = get_sub_field('pullquote');
                    $quote = (strlen($quote) > 140) ? substr($quote, 0, 137) . '...' : $quote;@endphp

                    <a href="https://twitter.com/intent/tweet?text=@php echo urlencode($quote); @endphp&url=@php the_permalink(); @endphp&via=hungermagazine" class="twitter retweet" target="_blank">Retweet this quote</a>
                    @php
                  }
                 echo '';
                      


                elseif( get_row_layout() == 'youtube_video' ):

                $full_width = get_sub_field('youtube_display_options');

                if ($full_width == 'full-width') {
                echo '<!-- full width youtube -->';
                echo '</div>';
                  if ($isfirstfull == 'yes') { @endphp
                  <div class="col-md-4  offset-md-2">
                  <div  id="sticky-art-ad">
<!-- /64193083/MPU_DMPU -->
<div id='div-gpt-ad-1529145788203-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145788203-0'); });
</script>
</div>
                  </div>
               @php    $isfirstfull == 'no';
                }
              echo  '</div></div></section>
                <div class="row no-gutters video-full art-margin">';
                  the_sub_field('youtube_video');
                echo '</div>
                <div class="row no-gutters">
                  <div class="col-lg-10 col-md-14 col-16 offset-1">';
                }
                else {
                  echo '<!-- inline youtube -->';
                  the_sub_field('youtube_video');
                }


                  else :

                      // no rows found

                  endif;

            endwhile;



        else :

            // no layouts found

        endif;
        if ($isfirstfull == 'yes') { @endphp

</div>
<div class="col-md-4  offset-md-2">
<div  id="sticky-art-ad">
<!-- /64193083/MPU_DMPU -->
<div id='div-gpt-ad-1529145788203-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145788203-0'); });
</script>
</div>
</div>
</div>
</div>
<div class="row no-gutters">
                  <div class="col-lg-10 col-md-14 col-16 offset-1">

            @php

            }

      @endphp
 <div class="mobile-ad">
  <!-- /64193083/FEATURE_MOBKOI -->
  <div id='div-gpt-ad-1535880135495-0'>
    <script>
      googletag.cmd.push(function() { googletag.display('div-gpt-ad-1535880135495-0'); });
    </script>
  </div>
</div>
     <p class="date">{{ get_the_date( 'j F  Y' ) }}</p>
     @include('partials/tags', ['post_is'=>''])
      <div class="social">
      @include('partials/social', ['post_is'=> $post->ID])
      </div>
      </div>


      </div>
      </div>
      </article>
      <div class="article-footer" id="stick-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6 offset-1">
             <div class="like">Like this article?<br />
              Share the love
              <div>
              <div class="social social-hide">
      @include('partials/social', ['post_is'=> $post->ID])
      </div></div></div>
            </div>
            <div class="col-md-10 offset-1 center-me">
              Keep up with this story and more, <a href="https://hungertv.us5.list-manage.com/subscribe?u=dfaed807bb259c614199d67a0&amp;id=1b5d9b1f65" target="_blank">join our newsletter.</a>
            </div>
          </div>
      </div>
      </div>
      <div class="article-footer-2">
        <div class="">
          <div class="row">
            <div class="col-lg-10 col-md-14 col-16 offset-1">
            <div class="wrapper wavo xl-margin"> <script>var wb=window.wb||(window.wb={});wb.q||(wb.q=[]);wb.q.push(['addGrid',{siteId:'507633',id:"wb-ad-grid"}])</script> <script async src='https://d2szg1g41jt3pq.cloudfront.net/'></script> <div id="wb-ad-grid"></div></div>
            </div>
            <div class="col-lg-4 col-16 offset-1">
            <div class="xl-margin">
<!-- /64193083/MPU_DMPU_NTWAVO -->
<div id='div-gpt-ad-1537871716187-0'>
<script>

</script>
</div>
          </div>
          </div>
          </div>
          <div class="row art-margin">
            <div class="col-lg-10 col-md-14 col-16 offset-1">
            @include('partials/more-button', ['post_is'=> $post->ID])
      </div>
      </div>
      @php

if ( get_field( 'hungry_for_more', $post->ID ) ):
          $hungry_for_more =  (get_field('hungry_for_more', $post->ID))[0];
        else: $hungry_for_more = '';
        endif;
        if ($hungry_for_more == 'enabled') {
          @endphp
          <div class="row  art-margin">
            <div class="col-lg-10 col-md-14 col-16 offset-1">
              <h3>Hungry for more?</h3>
              </div>
          </div>
              @include('partials/two-more')
          @php
        }
@endphp

@php
if ( get_field( 'promote_the_current_issue', 'option' ) ):
          $promote_the_current_issue =  (get_field('promote_the_current_issue', 'option'))[0];
        else: $promote_the_current_issue = '';
        endif;
        if ($promote_the_current_issue == 'yes') {
          @endphp
              @if($buy_cta)
              <div class="row  art-margin">
                <div class="col-lg-10 col-md-14 col-16 offset-1">
                <div class="buy">
            <div class="col-md-9">
                <img src="{{ $buy_cta->image }}" alt="{{ $buy_cta->image_alt }}" />
        </div>
                <div class="col-md-7 col-16 offset-1">
                    <div>
                    <p class="tags">{{ $buy_cta->tag }}</p>
                    <a href="{{ $buy_cta->link }}">{{ $buy_cta->link_text }}</a>
                    </div>
                  </div>
        </div>
                </div>
        </div>
              @endif
              @php } @endphp
      </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>

    @php

$me_ids = array();





 $related = get_crp_posts_id( array(
            'postid' => $post->ID,
           'limit' => 1000,
           'post_type' => 'editorial'
       ) );

     //  print_r ($related);
       $posts = wp_list_pluck( (array) $related, 'ID'  );
//print_r ($posts);
       $metoo = get_posts([
           'post__in' => $posts,
           'posts_per_page' => 1000,
           'meta_query' => array(
               array(
                   'key' => 'evergreen', // name of custom field
                   'value' => '"yes"', // matches exaclty "red", not just red. This prevents a match for "acquired"
                   'compare' => 'LIKE'
               )
               ),
   'post_type' => 'editorial',
   'post__not_in' => array($post->ID),
       ]);

   //  print_r ($metoo);

        $i = 0;
        $me = wp_list_pluck( $metoo, 'ID' );
      //  print_r ($me);





$useme = implode(',', $me);




 wp_reset_query();
 if (empty($useme)) {

 }
 else {

              echo do_shortcode( '[ajax_load_more  post__in="' . $useme . '" preloaded_amount="1" seo="true" posts_per_page="1" pause="true" post_type="editorial"  scroll_distance="-700" pause_override="true" max_pages="0" orderby="post__in" css_classes="infinite-scroll"]'  );
            }
}
              @endphp
