@extends('layouts.back')

@section('content')
<div class="mb-3">
	<h1 class="h3 d-inline align-middle">Data User</h1><a class="badge bg-danger ms-2" href="">Hanya Admin <i class="fas fa-fw fa-external-link-alt"></i></a>
</div>
<div class="row">
	<div class="col-12">
	    <div class="card">
		    <div class="card-header">
			<h5 class="card-title">DataTables Ajax Sourced Data</h5>
			<h6 class="card-subtitle text-muted">DataTables has the ability to read data from virtually any JSON data source that can be
				obtained by Ajax. See official documentation <a href="https://datatables.net/examples/data_sources/ajax.html"
				target="_blank" rel="noopener noreferrer nofollow">here</a>.</h6>
			</div>
			<div class="card-body">
				<table id="example" class="display" style="width:100%">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<th>{{ $user->name }}</th>
							<th>{{ $user->email }}</th>
							<th>{{ $user->password }}</th>
							<th>Edit</th>
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