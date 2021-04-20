<div>
@if($social_footer_items)
    @foreach($social_footer_items as $social_item)
      <a href="{{$social_item['social_channel_link']}}">
        <img src="{{$social_item['social_channel_image']['url']}}" alt="{{$social_item['social_channel_image']['alt']}}">
      </a>
    @endforeach
@endif
</div>
