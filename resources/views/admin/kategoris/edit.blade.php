@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Edit Kategori</h1>
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

<form action="{{ route('adminkategoris.update', $kategori->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori', $kategori->nama_kategori) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Kategori</button>
</form>
@endsection
