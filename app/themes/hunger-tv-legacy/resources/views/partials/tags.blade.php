@php
$posttags = get_the_tags($post_is );
if ($posttags) {
  echo '<p class="tags">';
  foreach($posttags as $tag) {
    @endphp
<a href="@php echo get_tag_link($tag->term_id); @endphp">
    @php
    echo '#' . str_replace(' ', '', $tag->name) . '</a>';
  }
  echo '</p>';
}
@endphp

