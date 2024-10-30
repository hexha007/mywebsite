@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Daftar Album</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('adminalbums.create') }}" class="btn btn-primary mb-3">Tambah Album</a>

<div class="row">
    @foreach ($albums as $album)
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="{{ asset($album->cover) }}" class="card-img-top" alt="{{ $album->nama_album }}">
            <div class="card-body">
                <h5 class="card-title">{{ $album->nama_album }}</h5>
                <p class="card-text">{{ Str::limit($album->deskripsi, 100) }}</p>
                <p><strong>Tahun:</strong> {{ $album->tahun }}</p>
                <a href="{{ route('adminalbums.edit', $album->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('adminalbums.destroy', $album->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">
    {!! $albums->links('pagination::bootstrap-5') !!}
</div>
@endsection
