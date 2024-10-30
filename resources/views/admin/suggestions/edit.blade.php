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
        <textarea name="response" class="form-control" rows="5" required>{{ $suggestion->response }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Balasan</button>
</form>
@endsection
