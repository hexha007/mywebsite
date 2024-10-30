@extends('admin.templet.templet')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="pagetitle">
            <h1>Daftar Berita</h1>
        </div>

                
        <a href="{{ route('adminberita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>
    </div>

    <div class="card-body">


        
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        
        <div class="row">
            <?php $no=0;?>
            @foreach ($beritas as $berita)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header">{{ $berita->judul }}</div>
                    @if($berita->gambar)
                    <img src="{{ asset('storage/gambar/' . $berita->gambar) }}" class="card-img-top" alt="Gambar {{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                @else
                    <img src="{{ asset('img/default.jpg') }}" class="card-img-top" alt="Gambar Default" style="height: 200px; object-fit: cover;">
                @endif

                    <div class="card-body">
                        <h5 class="card-title"><?=$no++;?>. {{ $berita->judul }}</h5>
                        <p class="card-text">{{ Str::limit(strip_tags($berita->isi, 100)) }}</p>
                        
                        <a href="{{ route('adminberita.edit', $berita->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('adminberita.destroy', $berita->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="card-text"><small class="text-muted">Posted on: {{ $berita->tanggal_post }}</small></p>
                        <p class="card-text">
                            <strong>Kategori:</strong> {{ $berita->kategori->nama_kategori }}
                        </p>
                        
                        <!-- Tags -->
                        <p class="card-text">
                            <strong>Tags:</strong>
                            @if($berita->tag!=null)

                            @foreach($berita->tag as $tag)
                            <span class="badge bg-secondary">{{ $tag->nama_tag }}</span>
                            @endforeach
                            @endif

                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center">
            {!! $beritas->links('pagination::bootstrap-5') !!}
        </div>        
    </div>
</div>


@endsection
