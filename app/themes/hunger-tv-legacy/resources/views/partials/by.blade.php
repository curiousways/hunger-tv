@php
$postauthor = get_post_field ('post_author', $post_is);
$display_name = get_the_author_meta( 'display_name' , $postauthor );
@endphp
<p class="byline author vcard text-gray">
  {{ __('Words', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ $display_name  }}
  </a>
</p>
