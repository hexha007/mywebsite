@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Tambah Gallery Baru</h1>
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

<form action="{{ route('admingallerys.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="nama_image">Nama Image</label>
        <input type="text" name="nama_image" class="form-control" value="{{ old('nama_image') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="file">File (Gambar)</label>
        <input type="file" name="file" class="form-control" required>
    </div>

    <div class="form-group mb-3">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3" id="deskripsi">{{ old('deskripsi') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="id_album">Album</label>
        <select name="id_album" class="form-control" required>
            <option value="">Pilih Album</option>
            <!-- Tambahkan opsi album yang ada di database -->
            @foreach ($albums as $album) <!-- Pastikan untuk mengirimkan data album ke view -->
                <option value="{{ $album->id }}">{{ $album->nama_album }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Gallery</button>
</form>
@endsection


@section('js')
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea#deskripsi',  // Replace this with your field selector
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    //    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        branding: false,
        menubar: true,
        height: 300
    });
</script>
@endsection
