@php
global $post;
if ($post_is) {
  $post = $post_is;
}
@endphp

@php

if ( get_field( 'sponsored', get_the_ID() ) ):
          $sponsored =  (get_field('sponsored', get_the_ID()))[0];
        else: $sponsored = '';
        endif;
        if ($sponsored == 'yes') {
          @endphp
          <div class="sponsored">Partnership</div>
          @php
        }
@endphp

