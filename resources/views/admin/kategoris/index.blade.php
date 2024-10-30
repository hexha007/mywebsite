@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Daftar Kategori</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('adminkategoris.create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

<table class="table">
    <thead>
        <tr>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kategoris as $kategori)
        <tr>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>
                <a href="{{ route('adminkategoris.edit', $kategori->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('adminkategoris.destroy', $kategori->id) }}" method="POST" style="display:inline-block;">
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
    {!! $kategoris->links('pagination::bootstrap-5') !!}
</div>
@endsection
