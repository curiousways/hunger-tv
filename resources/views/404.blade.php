@extends('layouts.app')

@section('content')

    <div class="holder-white">
    <div class="">
      <div class="row">
        <div class="col-sm-16 offset-sm-1 xl-margin">

    <h5>Damn, we can't find the page you were looking for.</h5>
</div>
<div class="col-sm-14 offset-sm-4 holder-white-inner-2">
    <h4>Browse Hunger instead?</h4>
    <nav class="nav-404">
      @if (has_nav_menu('404_navigation'))
        {!! wp_nav_menu(['theme_location' => '404_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
    </div>
</div>
</div>
</div>

@endsection
