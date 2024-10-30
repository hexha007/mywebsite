@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Daftar User</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('adminusers.create') }}" class="btn btn-primary mb-3">Tambah User</a>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->lvl_user }}</td>
            <td>
                <a href="{{ route('adminusers.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('adminusers.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Menambahkan pagination link -->
<!-- Pagination link dengan Bootstrap style -->
<div class="d-flex justify-content-center">
    {!! $users->links('pagination::bootstrap-5') !!}
</div>
@endsection
