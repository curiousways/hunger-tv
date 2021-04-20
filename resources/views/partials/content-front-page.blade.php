
<!-- feature 1 -->
<div class="row no-gutters">
  <div class="col-md-12">
  <div class="ani">
  <a href="{!! get_permalink($home_feature1) !!}">
    <div class="img-zoom">
{!!  get_the_post_thumbnail($home_feature1, 'home-lg') !!}</div> </a>
@include('partials/partnership', ['post_is'=>  $home_feature1, ])
<div class="row no-gutters article-detail">
<div class="col-16 offset-1">
  <div class="article-detail-inner">
@include('partials/categories', ['post_is'=>  $home_feature1, ])
<h1 class="entry-title"><a href="{!! get_permalink($home_feature1) !!}">{!! get_the_title($home_feature1) !!}</a></h1>
</div>
</div>
</div>
<!-- feature 2 -->
<div class="ani-2">
<div class="row no-gutters">
<div class="col-16 col-md-14 offset-md-4 offset-2">
<a href="{!! get_permalink($home_feature2) !!}"><div class="img-zoom">{!!  get_the_post_thumbnail($home_feature2, 'home-md') !!}
@include('partials/partnership', ['post_is'=>  $home_feature2, ])</div></a>
</div>
</div>
<div class="row no-gutters">
<div class="col-md-8 offset-md-1 col-15 offset-2">
<div class="article-detail-inner-2">
@include('partials/categories', ['post_is'=>  $home_feature2, ])
<h3 class="sub"><a href="{!! get_permalink($home_feature2) !!}"><div class="img-zoom">{!! get_the_title($home_feature2) !!}</div></a></h3>
</div>
</div>
</div>
</div>
<!-- feature 3 -->
<div class="ani-3">
<div class="row no-gutters">
<div class="col-md-14 offset-md-1 col-16" id="stick-section">
<a href="{!! get_permalink($home_feature3) !!}"><div class="img-zoom">{!!  get_the_post_thumbnail($home_feature3, 'home-md') !!}
@include('partials/partnership', ['post_is'=>  $home_feature3, ])</div></a>
</div>
</div>
<div class="row no-gutters">
<div class="col-md-6 offset-md-12 offset-1 col-15">
<div class="article-detail-inner-3">
@include('partials/categories', ['post_is'=>  $home_feature3, ])
<h3 class="sub"><a href="{!! get_permalink($home_feature3) !!}">{!! get_the_title($home_feature3) !!}</a></h3>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-sm-5 offset-sm-1">
<div class="ad-unit-home-right" id="sticky-ad">{!!  $home_right_ad !!}</div>
</div>
</div>
<div class="center">
<!-- /64193083/MOB_MPU_LEADER_2 -->
<div id='div-gpt-ad-1533727476269-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1533727476269-0'); });
</script>
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
  <div class="col-md-16 offset-md-1">
                <div class="row buy">
                  <div class="col-md-9 order-2 order-md-1">
                    <h5 class="md-margin xl-pad">{{ $buy_cta->title }} </h5>
                    <p class="tags sm-margin">{{ $buy_cta->tag }}</p>
                    <a href="{{ $buy_cta->link }}">{{ $buy_cta->link_text }}</a>
                    </div>
                    <div class="col-md-7 offset-md-1  order-1 order-md-2">
                    <a href="{{ $buy_cta->link }}"><img src="{{ $buy_cta->image }}" alt="{{ $buy_cta->image_alt }}" /></a>
                </div>
                </div>
              </div>
</section>
@endif
              @php } @endphp
<section class="row preview">
<div class="col-sm-16 offset-sm-1">
<div class="center"><!-- /64193083/BILLBOARD_LEADERBOARD -->
<div id='div-gpt-ad-1529145463897-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145463897-0'); });
</script>
</div>
</div>
</div>
</section>
<div class="row md-margin">
  <div class="col-md-10 offset-md-1 col-18">
<div class="row">
  @foreach($six_more_loop as $six_more_item)
      <div class="col-9 sm-margin">
<div class="img-holder-2">
<a href="{!! $six_more_item['link'] !!}">
@if($six_more_item['post_is'] >= 228985)
{!! $six_more_item['thumbnail'] !!}

@else
        <img src="{!! $six_more_item['old_thumbnail']['url'] !!}" alt="{!! $six_more_item['old_thumbnail']['alt'] !!}" />
        @endif
        @if ($six_more_item['sponsored'] == 'yes')
<div class="sponsored">Partnership</div>
@endif
</a>
</div>
        @include('partials/categories', ['post_is' =>  $six_more_item['post_is'], ])
       <a href="{!! $six_more_item['link'] !!}"><h4 class="entry-title">{!! $six_more_item['title'] !!}</h4></a>
      </div>
      @if ($loop->iteration == 2 or $loop->iteration == 4 )
</div>
<div class="row">
      @endif
  @endforeach
</div>
</div>
<div class="col-sm-5 offset-sm-2">
  <div class="home-ad-3 sm-margin">
  <!-- /64193083/MPU_DMPU -->
<div id='div-gpt-ad-1529145788203-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145788203-0'); });
</script>
</div>
</div>
</div>
</div>

<div class="newsletter lg-margin">
    <div class="row no-gutter">
      <div class="col-sm-16 offset-sm-1">
@include('partials/newsletter')
</div>
</div>
</div>
<section class="hunger-edits">
    <div class="row">
      <div class="col-sm-16 offset-sm-1">
        <h3>{!! $home_hunger_edits_title!!}</h3>
      </div>
</div>
      <div class="row no-gutters md-margin">
      <div class="col-sm-9">
        <div class="hunger-edit" style="background-image: url({!! $home_hunger_edit1['background_image']['url'] !!})">
        <a href="{!! $home_hunger_edit1['link'] !!}" class="edits"><h1>{!! $home_hunger_edit1['headline'] !!}</h1></a>
        <h4>{!! $home_hunger_edit1['strapline'] !!}</h4>
</div>
      </div>
      <div class="col-sm-9">
        <div class="hunger-edit" style="background-image: url({!! $home_hunger_edit2['background_image']['url'] !!})">
        <a href="{!! $home_hunger_edit2['link'] !!}" class="edits"><h1>{!! $home_hunger_edit2['headline'] !!}</h1></a>
        <h4>{!! $home_hunger_edit2['strapline'] !!}</h4>
</div>
</div>
<div class="col-sm-9">
        <div class="hunger-edit" style="background-image: url({!! $home_hunger_edit3['background_image']['url'] !!})">
        <a href="{!! $home_hunger_edit3['link'] !!}" class="edits"><h1>{!! $home_hunger_edit3['headline'] !!}</h1></a>
        <h4>{!! $home_hunger_edit3['strapline'] !!}</h4>
</div>
      </div>
      <div class="col-sm-9">
        <div class="hunger-edit" style="background-image: url({!! $home_hunger_edit4['background_image']['url'] !!})">
        <a href="{!! $home_hunger_edit4['link'] !!}" class="edits"><h1>{!! $home_hunger_edit4['headline'] !!}</h1></a>
        <h4>{!! $home_hunger_edit4['strapline'] !!}</h4>
</div>
      </div>
    </div>
  </section>
<section class="container">
    <div class="row">
    <div class="insta">
      <div class="col-sm-16 offset-sm-1">
<h5 class="follow">FOLLOW US ON INSTAGRAM <a href="https://www.instagram.com/hungermagazine/">@hungermagazine</a></h5>
@php echo do_shortcode('[instagram-feed]'); @endphp
</div>
</div>
</div>
</section>
<div class="newsletter lg-margin">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-sm-16 offset-sm-1">
@include('partials/newsletter')
</div>
</div>
</div>
</div>
@php echo do_shortcode( '[ajax_load_more  preloaded_amount="3" posts_per_page="1" pause="true" post_type="editorial"  scroll_distance="-700" pause_override="true" max_pages="0"  css_classes="infinite-scroll"]'  ); @endphp
