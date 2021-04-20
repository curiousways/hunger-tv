@php

if ($post_is) {
  $post = $post_is;
}
    $sections = get_the_terms( $post, 'section' );
    if ($sections) :
      $first = true;
      echo '<h2 class="post-cats">';
      foreach ($sections as $section) :
        if (!$first == true) {
          echo SECTIONS_SEPARATOR;
        }
        @endphp<a href=" @php echo bloginfo('url') . '/' . $section->slug; @endphp"> @php echo $section->name; @endphp</a> @php
        $first = false;
      endforeach;
      echo '</h2>';
    endif @endphp
