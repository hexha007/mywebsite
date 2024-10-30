@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
    <h1>Edit User</h1>
</div>

<form action="{{ route('adminusers.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password (Opsional)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password (Opsional)</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div class="mb-3">
        <label for="lvl_user" class="form-label">Level User</label>
        <select name="lvl_user" class="form-control" required>
            <option value="admin" {{ $user->lvl_user == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->lvl_user == 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
