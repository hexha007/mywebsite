@extends('admin.templet.templet')

@section('content')
<div class="pagetitle">
  <h1>Edit Pegawai</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('adminpegawai.update',$pegawai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    {{-- <div class="form-group">
        <label for="uid">UID</label>
        <input type="text" name="uid" class="form-control" value="{{ $pegawai->uid }}">
    </div> --}}

    <div class="form-group">
        <label for="nip">NIP</label>
        <input type="text" name="nip" class="form-control" value="{{ $pegawai->nip }}">
    </div>

    <div class="form-group">
        <label for="nuptk">NUPTK</label>
        <input type="text" name="nuptk" class="form-control" value="{{ $pegawai->nuptk }}">
    </div>

    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $pegawai->nama }}">
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" class="form-control">{{ $pegawai->alamat }}</textarea>
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="aktif" {{ $pegawai->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="non-aktif" {{ $pegawai->status == 'non-aktif' ? 'selected' : '' }}>Non-Aktif</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nama_pelajaran">Nama Pelajaran</label>
        <input type="text" name="nama_pelajaran" class="form-control" value="{{ $pegawai->nama_pelajaran }}">
    </div>

    <div class="form-group">
        <label for="id_kompetensi">Kompetensi</label>
        <select name="id_kompetensi" class="form-control">
            @foreach($kompetensi as $komp)
                <option value="{{ $komp->id }}" {{ $pegawai->id_kompetensi == $komp->id ? 'selected' : '' }}>
                    {{ $komp->nama_kompetensi }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="foto">Foto (opsional)</label>
        @if($pegawai->foto)
            <p>Foto saat ini: <img src="{{ asset('storage/' . $pegawai->foto) }}" alt="Foto Pegawai" width="100"></p>
        @endif
        <input type="file" name="foto" class="form-control-file">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
