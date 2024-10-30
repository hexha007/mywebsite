@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Profil Sekolah</h1>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $profil->nama_sekolah }}</h5>
        <p class="card-text">{{ $profil->deskripsi }}</p>
        <p><strong>Alamat:</strong> {{ $profil->alamat }}</p>
        <p><strong>No. Telp:</strong> {{ $profil->no_telp }}</p>
        <p><strong>Email:</strong> {{ $profil->email }}</p>
        <p><strong>Social Media:</strong></p>
        <ul>
            <li>YouTube: {{ $profil->youtube }}</li>
            <li>Facebook: {{ $profil->facebook }}</li>
            <li>Instagram: {{ $profil->ig }}</li>
            <li>Twitter: {{ $profil->twitter }}</li>
        </ul>

        <img src="{{ asset($profil->logo)}}" alt="{{$profil->twitter}}">

        <a href="{{ route('adminprofil.edit') }}" class="btn btn-primary">Edit Profil</a>
    </div>
</div>
@endsection
