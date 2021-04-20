<div class="some">
@php $counter = 1;
@endphp
@while (have_posts()) @php the_post();
if ($counter == 1 || $counter == 5 ) { @endphp
  <div class="row sm-margin">
    <div class="col-sm-4 offset-sm-1">
    <article @php post_class() @endphp>
  <header>
  <div class="img-holder">
  <a href="{{ get_permalink() }}">
    @if(get_the_ID()  >= 224675)
    {!! the_post_thumbnail('home-sm') !!}

@else
        <img src="{!! get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
        @include('partials/partnership', ['post_is'=>  get_the_ID(), ])
</a>
      </div>
        @include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
  </header>
</article>
@php
}
@endphp
@php
if ($counter == 2 || $counter == 3 || $counter == 4 || $counter == 6 || $counter == 7 || $counter == 8 ) { @endphp
    <div class="col-sm-4">
    <article @php post_class() @endphp>
  <header>
  <div class="img-holder">
  <a href="{{ get_permalink() }}">
    @if(get_the_ID()  >= 224675)
    {!! the_post_thumbnail('home-sm') !!}

@else
        <img src="{!! get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
        @include('partials/partnership', ['post_is'=>  get_the_ID(), ])
</a>
      </div>
        @include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
  </header>
</article>
@php
}
@endphp
@php
if ($counter == 1 || $counter == 5 || $counter == 2 || $counter == 3 || $counter == 6 || $counter == 7 ) { @endphp
</div>
@php
}
@endphp
@php
if ($counter == 4 || $counter == 8 ) { @endphp
</div>
</div>
@php
}
@endphp
@php
if ($counter == 8 ) { @endphp
<div class="row lg-margin">
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
</div>
@php
}
@endphp
@php
if ($counter == 9 ) { @endphp
<div class="row lg-margin">
  <div class="col-sm-12 offset-sm-1">
  <div class="row">
@php
}
@endphp
@php
if ($counter >=9 ) { @endphp
<div class="col-sm-6">
<article @php post_class() @endphp>
  <header>
    <div class="img-holder">
    <a href="{{ get_permalink() }}">
    @if(get_the_ID()  >= 224675)
    {!! the_post_thumbnail('home-md') !!}

@else
        <img src="{!! get_field('hero_image')['url'] !!}" alt="{!! get_field('hero_image')['alt'] !!}" />
        @endif
        @include('partials/partnership', ['post_is'=>  get_the_ID(), ])
</a>
      </div>
        @include('partials/categories', ['post_is' =>  get_the_ID(), ])
    <h4 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h4>
  </header>
</article>
@php
}
@endphp

@php
if ($counter == 20) { @endphp
</div>
</div>
</div>
<div class="col-sm-4  center replace-me2">

  <!-- /64193083/MPU_DMPU -->
<div id='div-gpt-ad-1529145788203-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145788203-0'); });
</script>
</div>



</div>

@php
}
@endphp
@php
if ($counter >=9 ) { @endphp
  @php
if ($counter !==20 ) { @endphp
</div>

@php
}
}
@endphp
@php $counter ++;

if ($counter >= 21) {
  $counter = 1;
}
@endphp
@endwhile
{!! get_the_posts_navigation() !!}
</div>
</div>
<div class="newsletter">
    <div class="row no-gutter">
      <div class="col-sm-16 offset-sm-1">
@include('partials/newsletter')
</div>
