@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Tambah Kategori Baru</h1>
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

<form action="{{ route('adminkategoris.store') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Kategori</button>
</form>
@endsection
