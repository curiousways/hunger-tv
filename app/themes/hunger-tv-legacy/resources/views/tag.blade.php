@extends('layouts.app')
@section('content')
<div class="all">
<div class="row no-gutters">
    <div class="col-sm-16 offset-sm-1">
<h1 class="lg-margin">#{{ single_tag_title() }}</h1>
</div>
</div>
    @if (!have_posts())
    <div>
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif


    @include('partials.content-index')
</div>
@endsection
