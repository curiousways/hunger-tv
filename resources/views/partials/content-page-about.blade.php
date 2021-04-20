    <div class="wrap container-main">
    <div class="holder-white">
    <div class="content">
    <div class="row no-gutter">
      <div class="col-sm-16 offset-sm-1">
<section id="content" class="clearfix">
<div class="listing">
@include('partials.issue')
</div>
</section>
</div>
</div>
<div class="newsletter">
    <div class="row no-gutter">
      <div class="col-sm-16 offset-sm-1">
@include('partials/newsletter')
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

