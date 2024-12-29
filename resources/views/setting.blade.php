@extends('layouts.back')

@section('content')
<h1 class="h3 mb-3"><strong>Main</strong> Setting</h1>
<div class="row">
	<div class="col-12 col-xl-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Pengaturan Website</h5>
			</div>
			<div class="card-body">
				<form action="{{route('settings.update', 1)}}" method="POST">
					@csrf
					@method('PUT')
					<input type="hidden" name="id" value="1">
					@foreach($settings as $rows)
					<div class="mb-3 row">
						<label class="col-form-label col-sm-2 text-sm-end">Nama Sekolah</label>
						<div class="col-sm-10">
							<input type="text" name="judul" class="form-control" value="{{ $rows->judul }}">
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-form-label col-sm-2 text-sm-end">Alamat</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="alamat" rows="2">{{ $rows->alamat }}</textarea>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-form-label col-sm-2 text-sm-end">Moto/Slogan</label>
						<div class="col-sm-10">
							<textarea class="form-control" name="slogan" rows="2">{{ $rows->slogan }}</textarea>
						</div>
					</div>
					<div class="mb-3 row">
						<label class="col-form-label col-sm-2 text-sm-end">Logo Sekolah</label>
						<div class="col-sm-10">
							<input class="form-control" name="file" type="file">
						</div>
					</div>
					<div class="mb-3 row">
						<div class="col-sm-10 ms-sm-auto">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
					@endforeach
				</form>
			</div>
		</div>

		<div class="card">
			<div class="card-header">
				<h5 class="card-title mb-3">Pengaturan Running Text</h5>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#textModal">&nbsp;Edit</button>
			</div>

			<div class="card-body">
				@foreach($texts as $rows)
				<div class="form-group" style="background-color: #491567;">
					<object><marquee style="font-size:40px;color:gold; font-weight:bold;" scrollamount="5">{{ $rows->runtext }}</marquee></object>
				</div>
				@endforeach
			</div>
		</div>
	</div>

	<div class="col-12 col-xl-6">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Video Youtube</h5>
					<i style="font-size: 10px; color: green;">* Ambil kode yang bergaris bawah hijau pada URL youtube.</i> <br>
					<img src="{{ asset('img/embed.png')}}">
				<form action="{{ route('settings.updatevideo', 1)}}" method="POST" class="row row-cols-md-auto align-items-center">
					@csrf
					<input type="hidden" name="id" value="1">
					@foreach($videos as $vid)
					<div class="col-md-4">
						<div class="input-group">
							<div class="input-group-text"><img src="{{ asset('img/youtube.png')}}" width="20px"></div>
							<input type="text" name="code_youtube" value="{{ $vid->code_youtube }}" class="form-control" placeholder="Paste kode disini..." required>
						</div>
					</div>
					<div class="col-md-3">
					    <select id="inputState" class="form-control" name="autoplay">
					        <option value="1" {{ $vid->autoplay == 1 ? "selected" : "" }}>Auto Play</option>
					        <option value="0" {{ $vid->autoplay == 0 ? "selected" : "" }}>Not Auto Play</option>
					    </select>
					</div>
					<div class="col-md-2">
					    <select id="inputState" class="form-control" name="mute">
					        <option value="0" {{ $vid->mute == 0 ? "selected" : "" }}>Not Mute</option>
					        <option value="1" {{ $vid->mute == 1 ? "selected" : "" }}>Mute</option>
					    </select>
					</div>
					@endforeach
					<div class="">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
			@foreach($videos as $vid)
			<div class="card-body">
				<iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ $vid->code_youtube }}?autoplay={{ $vid->autoplay }}&mute={{ $vid->mute }}"></iframe> 
			</div>
			@endforeach
		</div>
	
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">Pengaturan</h5>
			</div>
			<div class="card-body">
				disini
			</div>
		</div>
	</div>
	
</div>

<!-- Modal -->
<div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="font-size:28px;font-weight: bold;color: navy;">Form Edit Running Text</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('settings.updatetext', 1)}}" method="POST">
          	@csrf
          	<input type="hidden" name="id" value="1">
			     @foreach($texts as $rows)
            <div class="form-group">
              <textarea class="form-control" name="runtext" style="font-size:20px; font-weight: bold; color: black;" placeholder="Masukan Teks disini...." rows="3">{{ $rows->runtext }}
              </textarea>
            </div>
            @endforeach
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-lg" data-bs-dismiss="modal">&nbsp;Save</button>
            </div>
          </form>
        
      </div>
    </div>
  </div>
@endsection
@push('styles')
<link href="{{ asset('templates/backend/css/light.css') }}" rel="stylesheet">
@endpush