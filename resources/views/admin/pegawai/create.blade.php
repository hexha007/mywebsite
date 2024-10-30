@extends('admin.templet.templet')

@section('content')


<div class="card">
    <div class="card-header">
        <div class="pagetitle">
            <h1>Tambah Pegawai Baru</h1>
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

    </div>
    <div class="card-body">

        <form action="{{ route('adminpegawai.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label for="uid">UID</label>
                <input type="text" name="uid" class="form-control" value="{{ old('uid') }}">
            </div> --}}
        
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip') }}">
            </div>
        
            <div class="form-group">
                <label for="nuptk">NUPTK</label>
                <input type="text" name="nuptk" class="form-control" value="{{ old('nuptk') }}">
            </div>
        
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
        
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
            </div>
        
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="tenaga pendidik" {{ old('status') == 'tenaga pendidik' ? 'selected' : '' }}>tenaga pendidik</option>
                    <option value="tenaga kependidikan" {{ old('status') == 'tenaga kependidikan
                    
                    
                    ' ? 'selected' : '' }}>tenaga kependidikan</option>
                </select>
            </div>
        
            <div class="form-group">
                <label for="nama_pelajaran">Nama Pelajaran</label>
                <input type="text" name="nama_pelajaran" class="form-control" value="{{ old('nama_pelajaran') }}">
            </div>
        
            <label for="id_kompetensi">Kompetensi</label>
            <select name="id_kompetensi" class="form-control">
                @foreach($kompetensi as $komp)
                    <option value="{{ $komp->id }}">{{ $komp->nama_kompetensi }}</option>
                @endforeach
            </select>
        
            <div class="form-group">
                <label for="foto">Foto (opsional)</label>
                <input type="file" name="foto" class="form-control-file">
            </div>
        
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
        
        

    </div>

    .
</div>


@endsection

