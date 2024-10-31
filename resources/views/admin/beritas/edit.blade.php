@extends('admin.templet.templet')


@section('content')
<div class="card">

    <div class="card-header">
        <div class="pagetitle">
            <h1>Edit Berita</h1>
        </div>
    </div>
    <div class="card-body">

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        
        <form action="{{ route('adminberita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
            </div>
        
            <div class="mb-3">
                <label for="tanggal_post" class="form-label">Tanggal Post</label>
                <input type="date" name="tanggal_post" class="form-control" value="{{ $berita->tanggal_post }}" required>
            </div>
        
            {{-- <div class="mb-3">
                <label for="id_user" class="form-label">User</label>
                <select name="id_user" class="form-select" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $berita->id_user == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div> --}}
        
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $berita->id_kategori == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        
            {{-- <div class="mb-3">
                <label for="tag" class="form-label">Tag</label>
                <input type="text" name="tag" class="form-control" value="{{ $berita->tag }}">
            </div>
         --}}
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
                <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" width="100" class="mt-2">
            </div>
        
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea name="isi" class="form-control" id="isi">
                    {{ $berita->isi }}
                </textarea>
            </div>

     
            <div class="col-sm-12">
                <div class="row">

                    @foreach ($tag as $tagitem)
                        
                  
                    <div class="col-sm-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="tag[]" name="tag[]" value="{{$tagitem->nama_tag}}">
                            <label class="form-check-label" for="gridCheck1">
                              {{$tagitem->nama_tag}}
                            </label>
                          </div>  
                    </div>
                    @endforeach


                </div>
              
            </div>          
        
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" name="file" class="form-control">
            </div>
        
            <div class="mb-3">
                <label for="status_publish" class="form-label">Status Publish</label>
                <select name="status_publish" class="form-select" required>
                    <option value="1" {{ $berita->status_publish ? 'selected' : '' }}>Published</option>
                    <option value="0" {{ !$berita->status_publish ? 'selected' : '' }}>Unpublished</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Update Berita</button>
        </form>        
    </div>
</div>


@endsection

@section('js')
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea#isi',  // Replace this with your field selector
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
       toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        branding: false,
        menubar: true,
        height: 300
    });
</script>
@endsection


