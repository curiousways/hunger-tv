

<div class="holder-white">
    <div class="wrap container-main">
    <div class="row no-gutter">
      <div class="col-md-10 offset-1 col-16">
<div id="content" class="clearfix">
<h1 class="xxl-margin"><?php the_title(); ?></h1>
<div class="listing">

<div class="md-margin">{{ the_field('first_column')}}</div>
@php the_content() @endphp

</div>
</div>
</div>
</div>

<div class="row">
            <div class="col-sm-16 offset-sm-1">
              <div class="social social-margin">
                 @include('partials/social')
              </div>
            </div>
          </div>
{!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
</div>
</div>
