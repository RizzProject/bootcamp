@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Jurusan</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Jurusan</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->


		{{-- main content here --}}
		<div class="card">
	<div class="card-body">

		<div class="card">
			<div class="card-header text-right">
				<a href="{{ route('createJurusan') }}" class="btn btn-primary" role="button">Tambah jurusan</a>
			</div>
			<div class="card-body p-0">
			</div>
		</div>

	  <table class="table table-hover mb-0" id="data-table">
  <thead>
    <tr>
      <th>no</th>
      <th>nama jurusan</th>
      <th>deskripsi</th>
      <th>aksi</th>
    </tr>
  </thead>
  <tbody>
	@foreach ($jurusans as $jurusan)
    <tr>
      <td>{{ $loop->index + 1 }}</td>
      <td>{{ $jurusan->nama }}</td>
      <td>{{ $jurusan->deskripsi }}</td>
      <td>
	   		<a href="{{route('editJurusan',['id' => $jurusan->id]) }}" class="btn btn-warning btn-sm" role="button">edit</a>
	   		<a onclick="confirmDelete(this)" data-url="{{ route('deleteJurusan', ['id' => $jurusan->id])}}" class="btn btn-danger btn-sm" role="button">hapus</a>
	  </td>
		</tr>
		@endforeach
   
  </tbody>
</table>
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}"
@endsection

@section('addJavascript')
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })
</script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>


    confirmDelete = function(button) {
        var url = $(button).data('url');
        swal({
            'title': 'Konfirmasi Hapus',
            'text': 'Apakah kamu yakin ingin menghapus data ini?',
            'dangerMode': true,
            'buttons': true
        }).then(function(value) {
            if (value) {
                window.location = url;
            }
        })
    }
</script>
@endsection 

@endsection