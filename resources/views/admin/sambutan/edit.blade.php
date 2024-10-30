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
