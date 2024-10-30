@extends('admin.templet.templet')

@section('content')


<div class="card">
    <div class="card-header">
        <h3>Daftar Divisi</h3>
    </div>
    <div class="card-body">

          
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          
          <a href="{{ route('admindivisis.create') }}" class="btn btn-primary mb-3">Tambah Divisi</a>
          
          <div class="row">
              @foreach ($divisis as $divisi)
              <div class="col-md-4">
                  <div class="card mb-4">
                      <img src="{{ asset($divisi->img) }}" class="card-img-top" alt="{{ $divisi->nama_divisi }}">
                      <div class="card-body">
                          <h5 class="card-title">{{ $divisi->nama_divisi }}</h5>
                          <p class="card-text">{{ Str::limit($divisi->isi, 100) }}</p>
                          <a href="{{ route('admindivisis.edit', $divisi->id) }}" class="btn btn-warning">Edit</a>
                          <form action="{{ route('admindivisis.destroy', $divisi->id) }}" method="POST" style="display:inline-block;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
          
    </div>
</div>
@endsection
