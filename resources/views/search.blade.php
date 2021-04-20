@extends('layouts.app')

@section('content')

  @if (!have_posts())
  <div class="holder-white">
    <div class="container">
      <div class="row">
        <div class="col-sm-16 offset-sm-1 xl-margin">
    <h5 class="xl-margin">Damn, no results for {{ $my_search }}</h5>

    {!! get_search_form(false) !!}
    </div>
<div class="col-sm-14 offset-sm-4 holder-white-inner-2">
    <h4>Try these?</h4>
    <nav class="nav-404">
      @if (has_nav_menu('404_navigation'))
        {!! wp_nav_menu(['theme_location' => '404_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    </div>
</div>
</div>
</div>
  @else
  <div class="holder-white">
  <div class="all">
      <div class="row">
        <div class="col-sm-16 offset-sm-1 holder-white-inner-1">
        <div class="row no-gutters">
        <div class="col-sm-18">
  <h5 class="xl-margin">Look what we found for ‘<span class='bold'>{{ $my_search }}</span>’</h5>
</div>
</div>
<div class="row search-again">
        <div class="col-sm-4">
  <form role="search" method="get" id="searchform" action="@php echo home_url( '/' ); @endphp">
        <input type="text" value="{{ $my_search }}" placeholder="{{ $my_search }}" name="s" id="s" />

</div><div class="col-sm-4">

        <input type="submit" id="searchsubmit" value="Search" />
</div>
</div>
    </div>
</form>

</div>


    @include('partials.content-search')
    </div>
</div>
</div>
  @endif
@endsection
