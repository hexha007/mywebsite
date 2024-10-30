@extends('admin.templet.templet')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Tambah Sambutan</h1>
    <form action="{{ route('adminsambutan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.sambutan.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
