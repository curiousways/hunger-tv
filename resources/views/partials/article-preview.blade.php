@foreach($article_loop as $article_item)
  <div class="row no-gutters art-margin art">
    <div class="col-md-7 offset-1 col-15 order-2 order-md-1  xl-margin">
    <article @php post_class() @endphp>
  <header>
      @include('partials/categories', ['post_is' =>  $article_item['post_is'], ])
      <h1 class="entry-title"><a href="{!! $article_item['link'] !!}">{!! $article_item['title'] !!}</a></h1>
    </div>
    <div class="col-md-9 offset-md-1 order-1 order-md-2 offset-2 col-16">
      <div class="img-full">
        <a href="{!! $article_item['link'] !!}">
      @if (!$article_item['old_thumbnail'] )
      {!! $article_item['thumbnail'] !!}
@else
      <img src="{!! $article_item['old_thumbnail']['url'] !!}" alt="{!! $article_item['old_thumbnail']['alt'] !!}" />
@endif
@if ($article_item['sponsored'])
@if ($article_item['sponsored'] == 'yes')
<div class="sponsored">Partnership</div>
@endif
@endif
</a>
    </div>
      @include('partials/tags', ['post_is'=>  $article_item['post_is'], ])
      @include('partials/by', ['post_is'=>  $article_item['post_is'], ])
      {!! App\hungertv_parse_credits($article_item['article_info']) !!}
      </header>
</article>
    </div>
  </div>
  <div class="row no-gutters art-margin">
    <div class="col-sm-16 offset-sm-1 center">
    <!-- /64193083/BILLBOARD_LEADERBOARD -->
<div id='div-gpt-ad-1529145463897-0'>
<script>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1529145463897-0'); });
</script>
</div>

</div>
</div>
  <div class="row no-gutters art-margin">
    <div class="col-md-7 offset-1 col-16">
      @if ($article_item['excerpt'] !== '')
        <h3>{!! $article_item['excerpt'] !!}</h3>
      @else
        <h3>{!! $article_item['old_excerpt'] !!}</h3>
      @endif
      <a href="{!! $article_item['link'] !!}" class="read-more">Read more</a>
    </div>
    <div class="col-sm-9 offset-sm-1">
    </div>
  </div>
@endforeach
@php


$page_to_get = ( $page_to_get ) ? $page_to_get : 1;

echo $page_to_get;
require_once(ABSPATH . 'wp-load.php');
$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
$args = array('posts_per_page'=>2,
                                 'post_type'=>'article',
                                 'paged'          => $page_to_get);
$the_query = new WP_Query($args);
// Pagination fix
global $wp_query;
$original_query = $wp_query;
$wp_query = NULL;
$wp_query = $the_query;

                           @endphp
                           @php while ($the_query -> have_posts()) : $the_query -> the_post(); @endphp



<div class="col-xs-12 file">
<a href="@php the_permalink(); @endphp" class="file-title" target="_blank">
<i class="fa fa-angle-right" aria-hidden="true"></i> @php echo get_the_title(); @endphp
</a>
<div class="file-description">@php the_content(); @endphp</div>
</div>
@php
endwhile;

 if ($the_query -> have_posts()) : @endphp
  <section id="posts">
  @php while ($the_query ->have_posts()) : $the_query -> the_post(); @endphp
      <article class="post">@php echo get_the_title(); @endphp</article>
      @php endwhile; @endphp
  </section>
  @php if ( $the_query->max_num_pages > 1 ) : @endphp
    <nav class="load_more">
    @php paginate_links( $args ); $page_to_get ++;  @endphp
    <a href="/feature/janelle-monae-drops-grimes-produced-new-track-celebrating-the-power-of-the-pussy-2/@php echo $page_to_get; @endphp" >Load More</a>

    </nav>
    @php echo $page_to_get; @endphp
    @php endif;  @endphp
    @php endif;

    paginate_links( $args );

    @endphp


    @php if ($the_query->have_posts()) : while ($the_query->have_posts()) : the_post(); @endphp

 <a class="post-link" rel="@php the_ID(); @endphp" href="@php the_permalink(); @endphp?preview=yes">

   @php the_title(); @endphp

 </a>

 @php endwhile; endif;
 wp_reset_query();
 @endphp
 <script>
   $(document).ready(function($){

        $.ajaxSetup({cache:false});
        $(".post-link").click(function(){
            var post_link = $(this).attr("href");

            $("#single-post-container").html("content loading");
            $("#single-post-container").load(post_link);
        return false;
        });

    });
</script>
