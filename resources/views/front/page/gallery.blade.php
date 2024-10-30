@extends('front.app.template')

@section('content')

        
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-5">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4 animated slideInDown">{{ $title }} </h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("download") }}">{{ $title }}</a></li>
                     </ol>
                </nav>
            </div>
        </div>    
   
        
    <!-- Project Start -->
    <div class="container-fluid project py-5 mb-5">
        <div class="container">
            <div class=" pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <ul class="nav nav-tabs">
                    @foreach ($album as $item)
                    <li class="nav-item">
                        <a class="nav-link active" href="#">{{$item->nama_album}}</a>
                      </li>                       
                    @endforeach

                    
                  </ul>
                {{-- <h5 class="text-primary">Galeri</h5>
                <h1>Foto Kegiatan SMKN 1 Sumedang</h1> --}}
            </div>
            <div class="row g-5">

                @foreach ($gallerys as $gallery)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=" {{ $gallery->id % 2 == 0 ? '.3s' : '.5s' }}">
                    <div class="project-item">
                        <div class="project-img">
                            <img src="{{ asset($gallery->file) }}" class="img-fluid w-100 rounded" alt="">
                            <div class="project-content">
                                <a href="{{ asset($gallery->file) }}" class="text-center">
                                    <h4 class="text-secondary">{{$gallery->nama_image}}</h4>
                                    <p class="m-0 text-white">{{$gallery->tanggal}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


                @endforeach
                
            </div>
        </div>
    </div>
    <!-- Project End -->


    
@endsection
