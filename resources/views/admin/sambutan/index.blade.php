@extends('admin.templet.templet')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Sambutan Kepala Sekolah</h1>
    <a href="{{ route('adminsambutan.create') }}" class="btn btn-primary mb-3">Tambah Sambutan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($sambutans as $sambutan)
        <div class="col-md-4 mb-4">
            <div class="card">
                @if($sambutan->gambar)
                    <img src="{{ asset('storage/' . $sambutan->gambar) }}" class="card-img-top" alt="Gambar {{ $sambutan->judul }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $sambutan->judul }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($sambutan->konten), 100) }}</p>
                    <a href="{{ route('adminsambutan.edit', $sambutan->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('adminsambutan.destroy', $sambutan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
