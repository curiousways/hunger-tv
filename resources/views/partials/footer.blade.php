<footer class="row no-gutters">
  <div class="container-footer">
    <div class="row no-gutters">
      <div class="col-md-14 order-2 order-md-1">
    <nav class="nav-secondary">
      @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'secondary_navigation', 'menu_class' => 'nav']);  !!}
      @endif
    </nav>
</div>
<div class="col-md-4 order-1 order-md-2">
    <div class="social social-footer">
      @include('partials/social-footer')
    </div>
</div>
  </div>
</footer>
