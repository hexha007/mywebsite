@extends('admin.templet.templet')


@section('content')
<div class="pagetitle">
    <h1>Balas Saran</h1>
</div>

<form action="{{ route('suggestions.update', $suggestion->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="response">Balasan</label>
        <textarea name="response" class="form-control" rows="5" required id="respon">{{ $suggestion->response }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Balasan</button>
</form>
@endsection


@section('js')
<script>
    // Initialize TinyMCE
    tinymce.init({
        selector: 'textarea#respon',  // Replace this with your field selector
        plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        toolbar_mode: 'floating',
    //    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
        branding: false,
        menubar: true,
        height: 300
    });
</script>
@endsection