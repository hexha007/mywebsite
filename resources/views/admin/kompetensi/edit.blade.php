@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Edit Kompetensi</h1>
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

<form action="{{ route('adminkompetensi.update',$kompetensi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="nama_kompetensi">Nama Kompetensi</label>
        <input type="text" name="nama_kompetensi" class="form-control" value="{{ old('nama_kompetensi', $kompetensi->nama_kompetensi) }}" required>
    </div>
    <div class="form-group mb-3">
        <label for="nama_kompetensi">singkatan</label>
        <input type="text" name="singkatan" class="form-control" value="{{ old('singkatan', $kompetensi->singkatan) }}" required>
    </div>

    
    <div class="form-group mb-3">
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="4" required id="deskripsi">{{ old('deskripsi', $kompetensi->deskripsi) }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="prestasi">Prestasi</label>
        <textarea name="prestasi" class="form-control" rows="3">{{ old('prestasi', $kompetensi->prestasi) }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="logo">Logo (opsional)</label>
        <input type="file" name="logo" class="form-control-file">
        @if ($kompetensi->logo)
            <small>Logo saat ini: <img src="{{ asset('storage/' . $kompetensi->logo) }}" alt="Logo" style="width: 100px;"></small>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="foto">Foto (opsional)</label>
        <input type="file" name="foto" class="form-control-file">
        @if ($kompetensi->foto)
            <small>Foto saat ini: <img src="{{ asset('storage/' . $kompetensi->foto) }}" alt="Foto" style="width: 100px;"></small>
        @endif
    </div>

    <div class="form-group mb-3">
        <label for="video">Video (opsional)</label>
        <input type="text" name="video" class="form-control" value="{{ old('video', $kompetensi->video) }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Kompetensi</button>
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