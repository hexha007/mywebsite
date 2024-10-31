@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Edit Album</h1>
</div>

<form action="{{ route('adminalbums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_album" class="form-label">Nama Album</label>
        <input type="text" name="nama_album" class="form-control" value="{{ $album->nama_album }}" required>
    </div>

    <div class="mb-3">
        <label for="tahun" class="form-label">Tahun</label>
        <input type="number" name="tahun" class="form-control" value="{{ $album->tahun }}" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" id="deskripsi">{{ $album->deskripsi }}</textarea>
    </div>

    <div class="mb-3">
        <label for="cover" class="form-label">Cover</label>
        <input type="file" name="cover" class="form-control" accept="image/*">
        @if ($album->cover)
            <img src="{{ asset($album->cover) }}" alt="{{ $album->nama_album }}" width="100" class="mt-2">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Album</button>
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