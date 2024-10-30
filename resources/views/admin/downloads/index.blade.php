@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Daftar Downloads</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('admindownloads.create') }}" class="btn btn-primary mb-3">Tambah Download</a>

<table class="table">
    <thead>
        <tr>
            <th>Nama Download</th>
            <th>File</th>
            <th>Tanggal Post</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($downloads as $download)
        <tr>
            <td>{{ $download->nama_download }}</td>
            <td>
                <a href="{{ asset($download->file) }}" target="_blank">{{ basename($download->file) }}</a>
            </td>
            <td>{{ $download->tanggal_post }}</td>
            <td>
                <a href="{{ route('admindownloads.edit', $download->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admindownloads.destroy', $download->id) }}" method="POST" style="display:inline-block;">
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
    {!! $download->links('pagination::bootstrap-5') !!}
</div>
@endsection
