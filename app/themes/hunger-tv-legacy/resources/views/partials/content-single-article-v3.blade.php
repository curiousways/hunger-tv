<article @php post_class() @endphp>
  <header>
  <div class="row no-gutters">
    <div class="col-sm-7 offset-sm-1">
    @include('partials/categories')

      <h1 class="entry-title">{!! get_the_title() !!}</h1>
    </div>
    <div class="col-sm-9 offset-sm-1">
    {!! the_post_thumbnail('post-featured') !!}
    @include('partials/tags')
    @include('partials/by')
    </div>
  </div>
  </header>
  <div class="row no-gutters">
    <div class="col-sm-7 offset-sm-1">
      <h3>{!!  get_field('standfirst') !!}</h3>
      @php

        // check if the flexible content field has rows of data
        if( have_rows('article_builder') ):

            // loop through the rows of data
            while ( have_rows('article_builder') ) : the_row();
                //paragraphs
                if( get_row_layout() == 'paragraphs' ):
                  echo '<!-- paragraphs -->';
                  the_sub_field('paragraphs');

                elseif( get_row_layout() == 'ad_unit' ):
                  echo '<!-- ad unit -->';
                  the_sub_field('ad_unit');

                elseif( get_row_layout() == 'call_to_action' ):
                  echo '<!-- call to action -->';
                  echo '<div class="cta">';

                  the_sub_field('call_to_action');
                  echo '</div>';

                elseif( get_row_layout() == 'youtube_video' ):

                $full_width = get_sub_field('youtube_display_options');

                if ($full_width == 'full-width') {
                echo '<!-- full width youtube -->';
                echo '</div>
                </div>
                <div class="row no-gutters video-full">';
                  the_sub_field('youtube_video');
                echo '</div>
                <div class="row no-gutters">
                  <div class="col-sm-7 offset-sm-1">';
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
      @include('partials/tags')
      <div class="social">
      @include('partials/social')
      </div>
      </div>
      </div>
      </article>
      <div class="article-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 offset-sm-1">
              Like this article?<br />
              Share the love
            </div>
            <div class="col-sm-10 offset-sm-1 center-me">
              Keep up with this story and more, <a href="">join our newsletter.</a>
            </div>
          </div>
        </div>
      </div>
      <div class="article-footer-2">
        <div class="container">
          <div class="row">
            <div class="col-sm-10 offset-sm-1">
              wavo goes here
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10 offset-sm-1">
            @include('partials/more-button')
            @php
            if( get_field( 'hungry_for_more' ) ){ @endphp
              <h3>Hungry for more?</h3>
              </div>
          </div>
              @include('partials/two-more')
            @php } @endphp
          <div class="row">
            <div class="col-sm-16 offset-sm-1">
            @php
            if( get_field( 'promote_the_current_issue' ) ){ @endphp
              @if($buy_cta)
                <div class="buy">
                  <div>
                    <p>{{ $buy_cta->title }} </p>
                    <p class="tags">{{ $buy_cta->tag }}</p>
                    <a href="{{ $buy_cta->link }}">{{ $buy_cta->link_text }}</a>
                    </div>
                  <img src="{{ $buy_cta->image }}" alt="{{ $buy_cta->image_alt }}" />
                </div>
              @endif
              @php } @endphp
            </div>
          </div>
         @include('partials/article-preview')
         <div class="row">
            <div class="col-sm-16 offset-sm-1">
              <div class="social">
                 @include('partials/social')
              </div>
            </div>
          </div>
      </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>


