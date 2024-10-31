@extends('admin.templet.templet')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Edit Sambutan</h1>
    <form action="{{ route('adminsambutan.update', $sambutan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.sambutan.form')
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection



@section('js')
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea#konten',  // Replace this with your field selector
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    //    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        branding: false,
        menubar: true,
        height: 300
    });
</script>
@endsection