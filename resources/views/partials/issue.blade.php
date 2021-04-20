@php
    query_posts(array(
        'post_type' => 'issue',
        'showposts' => 100
    ) );
@endphp
@php while (have_posts()) : the_post(); @endphp
<div class="row no-gutters border-top">
<div class="col-sm-7 offset-sm-1 xl-margin">
        <h2 class="post-cats">Hunger magazine</h2>
        <h1 class="sm-margin">@php the_title(); @endphp</h1>
        <h5 class="sm-margin">Featured in this issue</h5>
        <p>@php echo get_the_content(); @endphp</p>
        <div class="social social-about">
          @include('partials/social')
        </div>
      </div>
<div class="col-sm-7 offset-sm-3">
<a href="{{ the_field('buy_now_url')}}" class="read-more">
@if(get_the_ID()  >= 224675)
    {!! get_the_post_thumbnail() !!}

@else
        <img src="{!! get_the_post_thumbnail_url() !!}" alt="" />
        @endif
    </a>
        <h3 class="sm-margin">@php the_title(); @endphp</h3>
        <a href="{{ the_field('buy_now_url')}}" class="read-more">Buy</a><a href="https://boutiquemags.com/products/hunger-magazine" class="read-more">Subscribe</a><a href="/stockists" class="read-more">Stockists</a>
        <div class="row no-gutters">
          <div class="col-sm-16">
            <div class="issue-preview">

              @php
                  $features = get_field('featured_features');
                  if ($features) :
                    $ids = array();
                    foreach ($features as $f) {
                      $ids[] = $f->ID;
                    }
                  endif;


                 @endphp
                 @if(get_the_ID()  >= 224675)
    {!! get_the_post_thumbnail() !!}

@else
        <img src="{!! get_the_post_thumbnail_url() !!}" alt="" />
        @endif
                 @include('partials/categories', ['post_is' =>  $features['0']])
                 <h4>{!! get_the_title($features['0']) !!}</h4>


    </div>
    </div>
    </div>
</div>
        </div>
@php endwhile;@endphp
