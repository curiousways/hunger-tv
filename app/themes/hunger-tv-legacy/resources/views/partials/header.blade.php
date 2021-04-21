@php $post_name = get_the_title();
if ($post_name == 'Home Page') :  @endphp

<div class="home-ad" id="main-ad">
  <!-- /64193083/HERO_BILLBOARD_LEADERBOARD -->
<div id='div-gpt-ad-1529146186757-0'>
<script>
// Adds and removes body class depending on screen width.


</script>
</div>
</div>
@php
endif
@endphp
<header class="banner">
  <div class="container-header">
    <a class="brand" href="{{ home_url('/') }}">
      <img src="@php $hunger_logo = get_field('hunger_logo', 'option');  echo $hunger_logo['url']; @endphp" alt="@php echo $hunger_logo['alt']; @endphp" />
    </a>
    <a href="#main-menu"
     role="button"
     id="main-menu-toggle"
     class="menu-toggle"
     aria-expanded="false"
     aria-controls="main-menu"
     aria-label="Open main menu">

    <span class="sr-only">Open main menu</span>
    <span class="burger" aria-hidden="true"></span>
  </a>
    <nav id="main-menu" role="navigation" class="main-menu nav-primary" aria-expanded="false" aria-label="Main menu">
    <div class="nav-container">
    <a href="#main-menu-toggle"
       role="button"
       id="main-menu-close"
       class="menu-close"
       aria-expanded="false"
       aria-controls="main-menu"
       aria-label="Close main menu">

      <span class="sr-only">Close main menu</span>
      <span class="close-me" aria-hidden="true"></span>
    </a>
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
      <div class="mobile-search">
     @include('partials/searchform-2')
     </div>
</div>
    </nav>
    <a href="#main-menu-toggle"
     class="backdrop"
     tabindex="-1"
     aria-hidden="true" hidden></a>
    <img src="@asset('images/search@2x.png')" class="search" alt="Search." data-toggle="modal" data-target="#myModal" />
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <div class="closer">
    <div class="container-main">
      <div class="row">
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
</div>
</div>
      <div class="modal-header">

      </div>
      <div class="modal-body">
      <div class="container">
  <div class="row">
    <div class="col-sm-8 offset-sm-5">
      {{ get_search_form() }}
      </div>
</div>
</div>
      </div>
    </div>

  </div>
</div>
  </div>
</header>
