@extends('layouts.back')

@section('content')
<h1 class="h3 mb-3"><strong>List</strong> Audio</h1>
<div class="row">
	<div class="col-12">
	    <div class="card">
		    <div class="card-header">
			<form action="{{ route('audios.store') }}" method="POST" enctype="multipart/form-data" class="row row-cols-md-auto align-items-center">
			    @csrf
			    <div class="mb-3">
			        <label for="formFile" class="form-label">File input audio</label>
			        <input type="file" name="file" class="form-control" required>
			    </div>
			    <div class="mb-3">
			        <label for="nama" class="form-label">Nama</label>
			        <input type="text" name="nama" class="form-control" required>
			    </div>
			    <div class="mt-3">
			        <button type="submit" class="btn btn-primary">Unggah</button>
			    </div>
			</form>
			</div>
			<div class="card-body">
				<table id="" class="table table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nama</th>
							<th>Audio</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($audios as $rows)
						<tr>
							<td>{{ $rows->id }}</td>
							<td>{{ $rows->nama }}</td>
							<td>
								<audio controls>
								    <source src="{{ asset($rows->file) }}" type="audio/mpeg">
								    <source src="{{ asset(str_replace('.mp3', '.wav', $rows->file)) }}" type="audio/wav">
								    <source src="{{ asset(str_replace('.mp3', '.ogg', $rows->file)) }}" type="audio/ogg">
								    Your browser does not support the audio element.
								</audio>
						    </td>
						    <td><a href="{{ route('audios.edit', $rows->id) }}">Edit</a></td>
						</tr>
			    		@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css" />
@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script type="text/javascript">
new DataTable('#example', {
    language: {
        pageLength: "Show _MENU_ articles per page"
    }
});
</script>
@endpush