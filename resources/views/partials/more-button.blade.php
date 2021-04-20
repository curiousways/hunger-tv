@php
    $sections = get_the_terms( $post_is, 'section' );
    if ($sections) :
      $first = true;
      foreach ($sections as $section) :
        if ($first) {
        @endphp
        <a href=" @php echo bloginfo('url') . '/' . $section->slug; @endphp" class="btn">More
        @php echo $section->name; @endphp</a>
        @php
        }
        $first = false;
      endforeach;
    endif @endphp
