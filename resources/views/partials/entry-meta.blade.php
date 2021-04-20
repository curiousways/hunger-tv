@php

$posttags = get_the_tags();
if ($posttags) {
  echo '<p class="tags">';
  foreach($posttags as $tag) {
    echo '#' . $tag->name . ' ';
  }
  echo '</p>';
}
@endphp
<p class="byline author vcard text-gray">
  {{ __('Words', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
</p>
