@extends('layouts.back')

@section('content')
<h1 class="h3 mb-3"><strong>Jadwal</strong> Bell</h1>
<div class="row">
	<div class="col-12">
	    <div class="card">
		    <div class="card-header">
		    	<form action="{{ route('bells.store') }}" method="POST" class="row row-cols-md-auto align-items-center">
		    		@csrf
					<div class="col-md-2">
					    <select id="inputState" class="form-control" name="id_day" required>
					    	<option value="" disabled selected>Pilih Hari</option>
					    	@foreach($days as $rows)
					        <option value="{{ $rows->id }}">{{ $rows->name }}</option>
		    			    @endforeach
					    </select>
					</div>
					<div class="col-md-2">
						<div class="input-group">
							<input type="time" name="jam" class="form-control" placeholder="Jam ( mm:ss )" maxlength="5" size="5" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="input-group">
							<input type="text" name="jadwal" class="form-control" placeholder="Deskripsi" required minlength="3">
						</div>
					</div>
					<div class="col-md-2">
					    <select id="inputState" class="form-select" name="id_audio" required>
					        <option value="" disabled selected>Pilih Audio</option>
					        @foreach($audios as $rows)
			    			<option value="{{ $rows->id }}">{{ $rows->nama }}</option>
			    			@endforeach
					    </select>
					</div>
					<div class="">
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>

			</div>
			<div class="card-body">

			 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
				  <li class="nav-item" role="presentation">
				    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
				  </li>
				  <li class="nav-item" role="presentation">
				    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
				  </li>
				</ul>
				<div class="tab-content" id="pills-tabContent">
				  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
				  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
				  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
				</div>
				
				<table id="" class="table table-bordered table-hover" style="width:100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Hari</th>
							<th>Jam</th>
							<th>Deskripsi</th>
							<th>Audio</th>
							<th>Diperbaharui</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($bells as $rows)
						<tr>
							<td>{{ $rows->id }}</td>
							<td>{{ $rows->day->name ?? 'N/A' }}</td>
							<td>{{ $rows->jam }}</td>
							<td>{{ $rows->jadwal }}</td>
							<td>{{ $rows->audio->nama ?? 'N/A' }}</td>
							<td>{{ $rows->created_at }}</td>
							<td><a href="{{ route('bells.edit', $rows->id) }}">Edit</a></td>
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
<script type="text/javascript">
function validateTime() {
    var data = document.getElementById("txt_jam").value;
    if (data != null || data != "") {
        var res = data.split(':');
        if (res.length == 2) {
            var hh = res[0];
            var mm = res[1];
            if (hh >= 0 && hh <= 23) {
                if (mm >= 0 && mm <= 59) {
                    return true;
                } else {
                    alert("Isian menit belum benar.");
                    return false;
                }
            } else {
                alert("Isian jam  belum benar.");
                return false;
            }
        } else {
            alert("Isian jam  belum benar.");
            return false;
        }
    } else {
        alert("Isian jam  belum benar.");
        return false;
    }
}
</script>
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