<div class="row">
  @foreach($two_more_loop as $two_more_item)
      <div class="col-5  @if ($loop->first)  @endif gallery-more-hold">
      <div class="row no-gutters">
<div class="col-sm-14 @if ($loop->first) offset-2 @endif">
        <a href="{!! $two_more_item['link'] !!}">
        @if (!$two_more_item['old_thumbnail'] )
      {!! $two_more_item['thumbnail'] !!}
@else
      <img src="{!! $two_more_item['old_thumbnail']['url'] !!}" alt="{!! $two_more_item['old_thumbnail']['alt'] !!}" />
@endif</a>
@include('partials/categories', ['post_is' =>  $two_more_item['post_is'], ])
<a href="{!! $two_more_item['link'] !!}"><h4 class="entry-title">{!! $two_more_item['title'] !!}</h4></a>
      </div>
</div>
</div>
  @endforeach
 </div>

