<article @php post_class() @endphp>
  <div class="row no-gutters">
  <div class="col-sm-10 offset-sm-4">
  <header>
    <h1 class="entry-title">{!! get_the_title() !!}</h1>
    @include('partials/entry-meta')
  </header>
  </div>
</div>
<div class="row no-gutters">
  <div class="col-sm-10 offset-sm-4">

    @php the_content() @endphp
    </div>
</div>

  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
