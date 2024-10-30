@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Tambah Album</h1>
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


<form action="{{ route('adminalbums.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nama_album" class="form-label">Nama Album</label>
        <input type="text" name="nama_album" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="number" name="tahun" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="cover" class="form-label">Cover</label>
        <input type="file" name="cover" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
