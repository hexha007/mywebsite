@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Daftar Saran</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($suggestions as $suggestion)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $suggestion->name }}</td>
            <td>{{ $suggestion->email }}</td>
            <td>{{ $suggestion->message }}</td>
            <td>
                <a href="{{ route('suggestions.edit', $suggestion->id) }}" class="btn btn-primary">Balas</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
