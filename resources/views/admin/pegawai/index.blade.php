@extends('admin.templet.templet')

@section('content')


<div class="card">
    <div class="card-header">

        <div class="pagetitle">
            <h1>Daftar Pegawai</h1>
          </div>
          
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          
          <a href="{{ route('adminpegawai.create') }}" class="btn btn-primary mb-3">Tambah Pegawai</a>
          

    </div>
    <div class="card-body">



        <table class="table">
            <thead>
                <tr>
                    <th>UID</th>
                    <th>NIP</th>
                    <th>NUPTK</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $pgw)
                <tr>
                    <td>{{ $pgw->uid }}</td>
                    <td>{{ $pgw->nip }}</td>
                    <td>{{ $pgw->nuptk }}</td>
                    <td>{{ $pgw->nama }}</td>
                    <td>{{ ucfirst($pgw->status) }}</td>
                    <td>{{ $pgw->nama_pelajaran }}</td>
                    <td>
                        <a href="{{ route('adminpegawai.edit', $pgw->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('adminpegawai.destroy', $pgw->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        

    </div>
</div>

<div class="d-flex justify-content-center">
    {!! $pegawai->links('pagination::bootstrap-5') !!}
</div>

@endsection
