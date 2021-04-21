<article @php post_class() @endphp>
  <header>
    <div class="row no-gutters">
      <div class="col-18-sm">


    {{ the_post_thumbnail( 'full' )  }}
</div>
</div>
  <div class="row no-gutters lg-margin">
    <div class="col-sm-12 offset-sm-3">
      <h3>{!!  get_field('standfirst') !!}</h3>

      @php

        // check if the flexible content field has rows of data
        if( have_rows('article_builder') ):

            // loop through the rows of data
            while ( have_rows('article_builder') ) : the_row();
                //paragraphs
                if( get_row_layout() == 'paragraphs' ):
                  echo '<div class="art-margin">
                  <!-- paragraphs -->';
                  the_sub_field('paragraphs');
                  echo '</div>';
                elseif( get_row_layout() == 'indented_paragraphs' ):
                  echo '</div>
                  </div>
                  <div class="row no-gutters">
    <div class="col-sm-8 offset-sm-5">
                  <!-- indented paragraphs -->';
                  the_sub_field('paragraphs');
                  echo '</div>
                  </div>
                  <div class="row no-gutters">
    <div class="col-sm-12 offset-sm-3">';

            elseif( get_row_layout() == 'two_column_-_image_left' ):
              $image = get_sub_field('image');

                  echo '</div></div>
                  <div class="row no-gutters">
                  <div class="col-sm-9">
                  <!-- two column image left -->';
                  @endphp
                  <img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt']; @endphp" />
                  @php
                  echo '</div>
                  <div class="col-sm-5 offset-sm-1  center-me text">';
                  the_sub_field('text');
                  echo '</div>
                  </div>
                  <div class="row no-gutters">
          <div class="col-sm-12 offset-sm-3">';

          elseif( get_row_layout() == 'two_column_-_image_right' ):
            $image = get_sub_field('image');
                  echo '</div></div>
                  <div class="row no-gutters">';

                  $credits = get_sub_field('text_is_credits');

if ($credits != 'yes') {
  echo ' <div class="col-sm-5 offset-3 center-me text order-2 order-md-1">
                  <!-- two column image right -->';
                  the_sub_field('text');
                  echo '</div>
                  <div class="col-sm-6 offset-1 order-1 order-md-2">';
                  @endphp
                  <img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt']; @endphp" />
                  @php
                  echo '</div>
                  </div>
                  <div class="row no-gutters">
          <div class="col-sm-12 offset-sm-3">';
}
else {
  echo ' <div class="col-sm-5 offset-3 credits">
                  <!-- two column image right -->';
                  the_sub_field('text');
                  echo '</div>
                  <div class="col-sm-6 offset-1">';
                  @endphp
                  <img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt']; @endphp" />
                  @php
                  echo '</div>
                  </div>
                  <div class="row no-gutters">
          <div class="col-sm-12 offset-sm-3">';
}



                elseif( get_row_layout() == 'ad_unit' ):
                  echo '<div class="center art-margin">
                  <!-- ad unit -->';
                  the_sub_field('ad_unit');
                  echo '</div>';

                elseif( get_row_layout() == 'gallery_viewer' ):
                  echo '<!-- gallery -->';
                  // check if the repeater field has rows of data

                $count = count(get_sub_field('gallery_items'));
                  if( have_rows('gallery_items') ):
                    @endphp
                  </div>
                  </div>
                  <div class="row no-gutters md-margin">
                  <div class="col-sm-18">
                      <div class="hunger-gallery">

                    @php
                    // loop through the rows of data


                    $i = 1;
                      while ( have_rows('gallery_items') ) : the_row();

                          $image = get_sub_field('gallery_image');
                          @endphp
                          <div><img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt'] @endphp" /></div>

                          @php
                          if($i == $count):
                            @endphp
                            <div><img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt'] @endphp" />
                          <div class="gallery-more">

                            <div class="row no-gutters">

                              <div class="col-sm-5  offset-sm-4 gallery-more-hold">
                                <h4>Like this article? Share the love.</h4>
                          </div>
                          <div class="col-sm-5 gallery-more-hold">
                          <div class="social">
                                  @include('partials/social')
                                </div>
                          </div>

                                @include('partials/two-more-gallery')

                              </div>
                              </div>
                            </div>


                            @php
                          endif;
                          $i++;
                      endwhile;
                      @endphp
                    </div>
                    </div>
                    </div>
                    <div class="row">
            <div class="col-sm-16 offset-sm-1">
                    <div class="share-this"> Top MENNACE  Trousers PHOEBEENGLISH // Shoes NIKE // ring HARRIS’ OWN</div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-7 offset-sm-1">
                    @php
                  else :

                      // no rows found

                  endif;





                elseif( get_row_layout() == 'call_to_action' ):
                  echo '<!-- call to action -->';
                  echo '<div class="cta art-margin">';

                  the_sub_field('call_to_action');
                  echo '</div>';

                 elseif( get_row_layout() == 'image' ):

                $full_width = get_sub_field('image_display_options');

                if ($full_width != 'full-bleed') {
                  echo '<!-- image inline  -->';
                  echo '<div class="image">';
                  $image = get_sub_field('image');
              @endphp

                  <img src="@php echo $image['url']; @endphp"  alt="@php echo $image['alt']; @endphp" />
                  @php

                  echo '</div>';
                }
                else {
                  echo '<!-- image full width  -->';

                  $image = get_sub_field('image');

                @endphp

                </div>
                </div>
                <div class="row">
                <div class="col-sm-18">
                  <img src="@php echo $image['url']; @endphp" alt="@php echo $image['alt']; @endphp"  />
                </div>
                </div>
                <div class="row">
                <div class="col-sm-12 offset-sm-3">

@php

                }

                elseif( get_row_layout() == 'subheader' ):
                  echo '<!-- subheader -->';
                  echo '<h3>';
                  the_sub_field('subheader');
                  echo '</h3>';

                  elseif( get_row_layout() == 'spotify_audio' ):
                  echo '<!-- spotify -->';
                  echo '<div class="spotify-audio art-margin">';

                  the_sub_field('spotify_audio');
                  echo '</div>';

                  elseif( get_row_layout() == 'instagram_embed' ):
                  echo '<!-- instagram -->';
                  echo '<div class="instagram-embed">';

                  the_sub_field('instagram_embed');
                  echo '</div>';

                  elseif( get_row_layout() == 'pullquote' ):

                      $full_width = get_sub_field('pullquote_display_options');

                      if ($full_width == 'full-width') {
                      echo '<!-- full width pull quote -->';
                      echo '</div>
                      </div>
                      <div class="row no-gutters">
                      <div class="col-sm-15  offset-sm-1">
                      <aside class="pquote">
                        <blockquote>';
                          the_sub_field('pullquote');

                      echo '</blockquote>
                      </aside>';

                      $retweet = get_sub_field('add_tweet_this_quote');
                  if ($retweet == 'yes') {
                    @endphp
                    <a href="" class="retweet">Retweet this quote</a>
                    @php
                  }
                 echo '</div>
                      </div>
                      <div class="row no-gutters">
                        <div class="col-sm-12 offset-sm-3">';
                      }
                      else {
                        echo '<!-- right column pull quote -->';
                        echo '</div>
                        <div class="col-sm-4  offset-sm-4">
                        <aside class="pquote">
                          <blockquote>';
                            the_sub_field('pullquote');

                      echo'</blockquote>
                        </aside>';

                      $retweet = get_sub_field('add_tweet_this_quote');
                  if ($retweet == 'yes') {
                    @endphp
                    <a href="" class="retweet">Retweet this quote</a>
                    @php
                  }
                 echo '</div>
                      </div>
                      <div class="row no-gutters">
                        <div class="col-sm-12 offset-sm-3">';
                      }


                elseif( get_row_layout() == 'youtube_video' ):

                $full_width = get_sub_field('youtube_display_options');

                if ($full_width == 'full-width') {
                echo '<!-- full width youtube -->';
                echo '</div>
                </div>
                <div class="row no-gutters video-full">
                <div class="col-sm-12 offset-sm-3">';
                  the_sub_field('youtube_video');
                echo '</div></div>
                <div class="row no-gutters">
                  <div class="col-sm-12 offset-sm-3">';
                }
                else {
                  echo '<!-- inline youtube -->';
                  the_sub_field('youtube_video');
                }
                elseif( get_row_layout() == 'hungry_for_more_like_this' ):
                  echo '<!-- hungry for more like this - enabled? -->';

                endif;

            endwhile;

        else :

            // no layouts found

        endif;

      @endphp

      </div>
      </div>
      </article>
