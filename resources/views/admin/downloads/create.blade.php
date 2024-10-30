@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Tambah Download Baru</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admindownloads.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="nama_download">Nama Download</label>
        <input type="text" name="nama_download" class="form-control" value="{{ old('nama_download') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="file">File (Dokumen)</label>
        <input type="file" name="file" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="tanggal_post">Tanggal Post</label>
        <input type="date" name="tanggal_post" class="form-control" value="{{ old('tanggal_post') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Download</button>
</form>
@endsection
