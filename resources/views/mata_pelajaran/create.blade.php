@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">MataPelajaran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card">
    <div class="card-body">
        <form action="{{ route('storeMapel') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="id_jurusan">Nama Jurusan</label>
                <select class="form-control" name="id_jurusan" id="id_jurusan" required="required">
                    @foreach ($jurusans as $jurusan)
                        <option value="{{$jurusan->id}}">{{$jurusan->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nama">Nama Pelajaran</label>
                <input type="text" name="nama" id="nama" class="form-control" required="required" placeholder="Masukkan nama mata pelajaran">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required="required" placeholder="Masukkan deskripsi mata pelajaran"></textarea>
            </div>
             <div class="text-right">
                <a href="{{ route('daftarJurusan') }}" class="btn btn-outline-secondary mr-2"
                    role="button">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection