@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Tags</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Tags</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="card">
    <div class="card-header">


        <div class="pagetitle">
            <h1>Edit Profil Sekolah</h1>
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

    </div>
    <div class="card-body">

        <form action="{{ route('adminprofil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="form-group">
                <label for="nama_sekolah" class="mt-3">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" class="form-control" value="{{ $profil->nama_sekolah }}">
            </div>
        
            <div class="form-group">
                <label for="deskripsi" class="mt-3">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi">{{ $profil->deskripsi }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="alamat" class="mt-3">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ $profil->alamat }}">
            </div>
        
            <div class="form-group">
                <label for="no_telp" class="mt-3">No. Telp</label>
                <input type="text" name="no_telp" class="form-control" value="{{ $profil->no_telp }}">
            </div>
        
            <div class="form-group">
                <label for="email" class="mt-3">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $profil->email }}">
            </div>
        
            <div class="form-group">
                <label for="youtube" class="mt-3">YouTube</label>
                <input type="text" name="youtube" class="form-control" value="{{ $profil->youtube }}">
            </div>
        
            <div class="form-group">
                <label for="facebook" class="mt-3">Facebook</label>
                <input type="text" name="facebook" class="form-control" value="{{ $profil->facebook }}">
            </div>
        
            <div class="form-group">
                <label for="ig" class="mt-3">Instagram</label>
                <input type="text" name="ig" class="form-control" value="{{ $profil->ig }}">
            </div>
        
            <div class="form-group">
                <label for="twitter" class="mt-3">Twitter</label>
                <input type="text" name="twitter" class="form-control mt-8" value="{{ $profil->twitter }}" >
        
            </div>

            <div class="form-group">
                <label for="logo" class="mt-3">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control mt-8">
                <img src="{{ asset($profil->logo) }}" alt="">
            </div>

            <div class="form-group">
                <label for="gambargedung" class="mt-3">Gambar Kampus</label>
                <input type="file" name="gambargedung" id="gambargedung" class="form-control mt-8">
                <img src="{{ asset($profil->gambargedung) }}" alt="">
            </div>

            <div class="form-group">
                <label for="logo" class="mt-3">Background</label>
                <input type="file" name="background" id="background" class="form-control mt-8">
                <img src="{{ asset($profil->background) }}" alt="">
            </div>
            <button type="submit" class="btn btn-success mt-3">Update</button>

    </div>
  </div>


        @endsection

        @section('js')
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea#deskripsi',  // Replace this with your field selector
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
       toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        branding: false,
        menubar: true,
        height: 300
    });
</script>
@endsection