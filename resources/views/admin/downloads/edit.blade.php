@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Edit Download</h1>
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

<form action="{{ route('admindownloads.update', $download->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nama_download">Nama Download</label>
        <input type="text" name="nama_download" class="form-control" value="{{ old('nama_download', $download->nama_download) }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="file">File (Dokumen)</label>
        <input type="file" name="file" class="form-control">
        <p>File saat ini: <a href="{{ asset($download->file) }}" target="_blank">{{ basename($download->file) }}</a></p>
    </div>

    <div class="form-group mb-3">
        <label for="tanggal_post">Tanggal Post</label>
        <input type="date" name="tanggal_post" class="form-control" value="{{ old('tanggal_post', $download->tanggal_post) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Download</button>
</form>
@endsection
