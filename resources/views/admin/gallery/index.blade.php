@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Daftar Gallery</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admingallerys.create') }}" class="btn btn-primary mb-3">Tambah Gallery</a>

<table class="table">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Nama Image</th>
            <th>File</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gallerys as $gallery)
        <tr>
            <td>{{ $gallery->tanggal }}</td>
            <td>{{ $gallery->nama_image }}</td>
            <td>
                <img src="{{ asset($gallery->file) }}" alt="{{ $gallery->nama_image }}" style="width: 100px;">
            </td>
            <td>{{ $gallery->deskripsi }}</td>
            <td>
                <a href="{{ route('admingallerys.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admingallerys.destroy', $gallery->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $gallerys->links('pagination::bootstrap-5') !!}
</div>
@endsection
