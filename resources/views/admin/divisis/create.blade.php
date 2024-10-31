@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Tambah Divisi Baru</h1>
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

<form action="{{ route('admindivisis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-3">
        <label for="nama_divisi">Nama Divisi</label>
        <input type="text" name="nama_divisi" class="form-control" value="{{ old('nama_divisi') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="isi">Isi</label>
        <textarea name="isi" class="form-control" rows="3" required id="isi">{{ old('isi') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="img">Gambar (Image)</label>
        <input type="file" name="img" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Divisi</button>
</form>
@endsection



@section('js')
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea#isi',  // Replace this with your field selector
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    //    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        branding: false,
        menubar: true,
        height: 300
    });
</script>
@endsection