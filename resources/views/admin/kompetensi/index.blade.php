@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Daftar Kompetensi</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('adminkompetensi.create') }}" class="btn btn-primary mb-3">Tambah Kompetensi</a>

<div class="row">
    @foreach ($kompetensi as $komp)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm">
            @if($komp->foto)
            <img src="{{ asset('storage/' . $komp->foto) }}" class="card-img-top" alt="{{ $komp->nama_kompetensi }}">
            @else
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $komp->nama_kompetensi }}">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $komp->nama_kompetensi }}</h5>
                <p class="card-text">{{ Str::limit($komp->deskripsi, 100) }}</p>
                <p class="card-text"><strong>Prestasi:</strong> {{ Str::limit($komp->prestasi, 100) }}</p>
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('adminkompetensi.edit', $komp->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('adminkompetensi.destroy', $komp->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
