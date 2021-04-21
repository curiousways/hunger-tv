<div class="some">
@php $counter = 1;
@endphp
@while (have_posts()) @php the_post();
  if ( get_field( 'sponsored', get_the_ID() ) ):
          $sponsored =  (get_field('sponsored', get_the_ID()))[0];
        else: $sponsored = '';
        endif;
if ($counter == 1) { @endphp
  <div class="row no-gutters content">
    <div class="col-16 offset-1 md-margin">
      <div class="row">
      <div class="col-md-6">
@php
}
@endphp
@php
if ($counter == 2) { @endphp
  <div class="col-md-6">
@php
}
@endphp
@php
if ($counter == 3) { @endphp
  <div class="col-md-6">
@php
}
@endphp
@php
if ($counter == 1 || $counter == 2 || $counter == 3 ) { @endphp
<article @php post_class() @endphp>
  <header>
  <div class="img-holder-2">
  <a href="{{ get_permalink() }}">
    @if(get_the_ID()  >= 224675 || get_the_ID()  <= 103672 )
    {!! the_post_thumbnail('home-sm') !!}

@else
        <img src="{!! get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
     @php
        if ( $sponsored == 'yes') {
          @endphp
        <div class="sponsored">Partnership</div>

        @php
}
@endphp
</a>
</div>
        @include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h4><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
  </header>
</article>
@php
}
@endphp
@php
if ($counter == 1 || $counter == 2) { @endphp
</div>
@php
}
@endphp
@php
if ($counter == 3) { @endphp
</div>
</div>
</div>
</div>

@php
}
@endphp
@php
if ($counter == 4 ) { @endphp
  <div class="row no-gutters sm-margin">
  <div class="col-md-12">
@php
}
@endphp
@php
if ($counter == 4 || $counter == 6 ) { @endphp
<div class="ani-2">
  <div class="col-md-14 offset-md-4 col-16 offset-2">
  <article @php post_class() @endphp>
  <header>
  <a href="{{ get_permalink() }}">
  <div class="img-zoom">
  @if(get_the_ID()  >= 224675 || get_the_ID()  <= 103672 )
    {!! the_post_thumbnail('home-md') !!}

@else
        <img src="{!! get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
        </div>
        @php
        if ( $sponsored == 'yes') {
          @endphp
          <div class="sponsored">Partnership</div>
        @php
}
@endphp
</a>
</div>
<div class="col-md-8 offset-md-1 col-16 offset-2">
<div class="article-detail-inner-2">
@include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h3 class="sub"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h3>
</div>
</div>
</header>
</article>
</div>
@php
}
@endphp

@php
if ($counter == 5 ) { @endphp
<div class="ani-3">
  <div class="col-md-14 offset-md-1 col-16">
  <article @php post_class() @endphp>
  <header>
  <a href="{{ get_permalink() }}">
  <div class="img-zoom">
  @if(get_the_ID()  >= 224675 || get_the_ID()  <= 103672 )
    {!! the_post_thumbnail('home-md') !!}

@else
        <img src="{!!  get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
        </div>
        @php
        if ( $sponsored == 'yes') {
          @endphp
          <div class="sponsored">Partnership</div>
        @php
}
@endphp
</a>
</div>
<div class="col-md-6 offset-md-12">
<div class="article-detail-inner-3">
@include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h3 class="sub"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h3>
</div>
</div>
</header>
</article>
</div>
@php
}
@endphp
@php
if ($counter == 6) { @endphp

</div>
<div class="col-sm-5 offset-sm-1">
<div class="ad-unit-right replace-me1">
<!-- /64193083/HERO_MPU_DMPU_ROS -->
<div id='div-gpt-ad-1532356085298-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1532356085298-0'); });
</script>
</div>


</div>
</div>
</div>
@php
if ( get_field( 'promote_the_current_issue', 'option' ) ):
          $promote_the_current_issue =  (get_field('promote_the_current_issue', 'option'))[0];
        else: $promote_the_current_issue = '';
        endif;
        if ($promote_the_current_issue == 'yes') {
          @endphp
              @if($buy_cta)
<section class="row sm-pad">
  <div class="col-sm-16 offset-sm-1">
                <div class="buy row">
                  <div class="col-sm-9 offset-sm-1">
                    <h5 class="xl-margin md-pad">{{ $buy_cta->title }} </h5>
                    <p class="tags sm-margin">{{ $buy_cta->tag }}</p>
                    <a href="{{ $buy_cta->link }}">{{ $buy_cta->link_text }}</a>
                    </div>
                    <div class="col-sm-7">
                  <img src="{{ $buy_cta->image }}" alt="{{ $buy_cta->image_alt }}" />
                </div>
                </div>
            </div>
</section>
@endif
              @php } @endphp
<section class="row">
<div class="col-sm-16 offset-sm-1">
<div class="center replace-me"><!-- ad here -->
<!-- /64193083/BILLBOARD_LEADERBOARD_BF -->
<div id='div-gpt-ad-1532355911205-0'>
<script>
googletag.cmd.push(function() {
  googletag.display('div-gpt-ad-1532355911205-0');
  googletag.pubads().refresh([adslot0]); });
</script>
</div>

</div>
</div>


</section>
<div class="col-sm-16 offset-sm-1 center replace-me3">
  <!-- ad here -->

<!-- /64193083/MOB_MPU_LEADER -->
<div id='div-gpt-ad-1529145936494-0'>
<script>
googletag.cmd.push(function() {
    googletag.display('div-gpt-ad-1529145936494-0');
    googletag.pubads().refresh([adslotc0]); });

</script>

</div>
</div>
@php
}
@endphp

@php
if ($counter == 7) { @endphp
  <section class="row no-gutters">
    <div class="col-md-10 offset-1 col-16">
  <div class="row">
@php
}
@endphp
@php
if ($counter == 7 || $counter == 9 || $counter == 11 || $counter == 8 || $counter == 10 || $counter == 12 ) { @endphp
  <div class="col-9 sm-margin">
  <article @php post_class() @endphp>
  <header>
  <div class="img-holder-2">
  <a href="{{ get_permalink() }}">
  @if(get_the_ID()  >= 224675 || get_the_ID()  <= 103672)
    {!! the_post_thumbnail('home-sm') !!}

@else
        <img src="{!!  get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
        @php
        if ( $sponsored == 'yes') {
          @endphp
          <div class="sponsored">Partnership</div>
        @php
}
@endphp
</a>
</div>
        @include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h4><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
      </div>
      </header>
</article>
@php
}
@endphp
@php
if ($counter == 8 || $counter == 10 ) { @endphp
  </div>
<div class="row">
@php
}
@endphp
@php
if ($counter == 12 ) { @endphp
  </div>
  </div>
<section class="col-sm-7 center replace-me2">
  <!-- /64193083/MPU_DMPU -->
<div id='div-gpt-ad-1529145788203-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145788203-0'); });
</script>
</div>

</section>
<div class="newsletter md-margin">
    <div class="row no-gutter">
      <div class="col-sm-16 offset-sm-1">
@include('partials/newsletter')
</div>
</div>
</div>
@php
}
@endphp
@php $counter ++;

if ($counter >= 13) {
  $counter = 1;
}
@endphp
@endwhile
<div class="row no-gutter">
      <div class="col-sm-16 offset-sm-1 sm-margin">
{!! get_the_posts_navigation() !!}
</div>
</div>
</div>
</div>
