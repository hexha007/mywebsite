@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Tambah Kompetensi Baru</h1>
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

<form action="{{ route('adminkompetensi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="nama_kompetensi">Nama Kompetensi</label>
        <input type="text" name="nama_kompetensi" class="form-control" value="{{ old('nama_kompetensi') }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="nama_kompetensi">Singkatan</label>
        <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan') }}" required>
    </div>


    
    <div class="form-group mb-3">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="prestasi">Prestasi</label>
        <textarea name="prestasi" class="form-control" rows="3">{{ old('prestasi') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="logo">Logo (opsional)</label>
        <input type="file" name="logo" class="form-control-file">
    </div>

    <div class="form-group mb-3">
        <label for="foto">Foto (opsional)</label>
        <input type="file" name="foto" class="form-control-file">
    </div>

    <div class="form-group mb-3">
        <label for="video">Video (opsional)</label>
        <input type="text" name="video" class="form-control" value="{{ old('video') }}">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Kompetensi</button>
</form>
@endsection