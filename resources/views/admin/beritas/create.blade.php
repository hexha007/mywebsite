@extends('admin.templet.templet')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="pagetitle">
            <h1>Tambah Berita</h1>
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
        
        <form action="{{ route('adminberita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
        
            <div class="mb-3">
                <label for="tanggal_post" class="form-label">Tanggal Post</label>
                <input type="date" name="tanggal_post" class="form-control" required>
            </div>
        
            {{-- <div class="mb-3">
                <label for="id_user" class="form-label">User</label>
                <select name="id_user" class="form-select" required @readonly(true)>
                    <!-- Ganti dengan daftar user -->
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div> --}}
        
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        

        
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control" accept="image/*">
            </div>
        
            <div class="form-group">
                <label for="isi">Isi</label>
                <textarea name="isi" id="isi" rows="10" class="form-control">{{ old('isi') }}</textarea>
            </div>

     
                <div class="col-sm-12">
                    <div class="row">

                        <div class="mb-3">
                            
                            {{-- <label for="tag">Tag</label> --}}

                                @foreach ($tags as $tag)
                                    {{-- <option value="{{ $tag->id }}">{{ $tag->nama_tag }}</option> --}}
                                    <input type="checkbox" name="tag[]" value="{{ $tag->nama_tag }}">{{ $tag->nama_tag }}
                                @endforeach

                        </div>



                    </div>
                  
                </div>
                <div class="mb-3">
                    <label for="background">Background</label>
                    <input type="file" name="background" class="form-control">
                </div>



                  
          

        
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input type="file" name="file[]" class="form-control" multiple>
            </div>
        
            <div class="mb-3">
                <label for="status_publish" class="form-label">Status Publish</label>
                <select name="status_publish" class="form-select" required>
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        
                
    </div>
</div>
@endsection
