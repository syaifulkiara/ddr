@foreach($videos as $vid)
 <iframe width="100%" height="520"
src="https://www.youtube.com/embed/{{ $vid->code_youtube }}?autoplay={{ $vid->autoplay }}&mute={{ $vid->mute }}">
</iframe> 
@endforeach