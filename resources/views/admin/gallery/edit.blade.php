@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Edit Gallery</h1>
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

<form action="{{ route('admingallerys.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $gallery->tanggal) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="nama_image">Nama Image</label>
        <input type="text" name="nama_image" class="form-control" value="{{ old('nama_image', $gallery->nama_image) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="file">File (Gambar)</label>
        <input type="file" name="file" class="form-control">
        <img src="{{ asset($gallery->file) }}" alt="{{ $gallery->nama_image }}" style="width: 100px; margin-top: 10px;">
    </div>

    <div class="form-group mb-3">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $gallery->deskripsi) }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="id_album">Album</label>
        <select name="id_album" class="form-control" required>
            <option value="">Pilih Album</option>
            @foreach ($albums as $album) <!-- Pastikan untuk mengirimkan data album ke view -->
                <option value="{{ $album->id }}" {{ $album->id == $gallery->id_album ? 'selected' : '' }}>
                    {{ $album->nama_album }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Gallery</button>
</form>
@endsection
