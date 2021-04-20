@if($gallery)
  <ul>
    @foreach($gallery as $image)
      <li><img src="{{$image['sizes']['thumbnail']}}" alt="{{$image['alt']}}"></li>
    @endforeach
  </ul>
@endif
