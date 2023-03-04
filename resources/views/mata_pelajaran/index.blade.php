@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">Mata Pelajaran
                </h1>
			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
	<div class="container-fluid">

        <div class="card">
            <div class="card-header text-right">
                <a href="{{  route('createMapel')  }}" class="btn btn-primary" role="button">Tambah Mapel</a>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0" id="data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Pelajaran</th>
                            <th>Nama Jurusan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mata_pelajarans as $mata_pelajaran)
                        <tr>
                            <td>{{  $loop->index + 1  }}</td>
                            <td>{{  $mata_pelajaran->nama  }}</td>
                            <td>{{  $mata_pelajaran->jurusan ? $mata_pelajaran->jurusan->nama : '-'  }}</td>
                            <td>{{  $mata_pelajaran->deskripsi  }}</td>
                            <td>
                                <a href="{{ route('editMapel', ['id' => $mata_pelajaran->id]) }}" class="btn btn-warning btn-sm text-light" role="button">Edit</a>
                                <!-- <a href="{{ route('deleteMapel', ['id' => $mata_pelajaran->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a> -->
                                 <a onclick="confirmDelete(this)" data-url="{{ route('deleteMapel', ['id' => $mata_pelajaran->id]) }}" class="btn btn-danger btn-sm" role="button">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@section('addCss')
<link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
<script src="{{  asset('js/jquery.dataTables.min.js')  }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js')  }}"></script>
<script src="{{  asset('js/sweetalert.min.js')  }}"></script>
<script>
    $(function() {
        $("#data-table").DataTable();
    })

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
