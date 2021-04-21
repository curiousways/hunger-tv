<div class="row">
  @foreach($two_more_loop as $two_more_item)
      <div class="col-sm-5 offset-1 @if (!$loop->first) offset-sm-0 @endif">

        <a href="{!! $two_more_item['link'] !!}">
        @if (!$two_more_item['old_thumbnail'] )
      {!! $two_more_item['thumbnail'] !!}
@else
      <img src="{!! $two_more_item['old_thumbnail']['url'] !!}" alt="{!! $two_more_item['old_thumbnail']['alt'] !!}" />
@endif</a>
@include('partials/categories', ['post_is' =>  $two_more_item['post_is'], ])
        <a href="{!! $two_more_item['link'] !!}"><h4 class="entry-title">{!! $two_more_item['title'] !!}</h4></a>
      </div>
  @endforeach
 </div>

