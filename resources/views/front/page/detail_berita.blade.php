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
        <!-- Page Header End -->






        
            <!-- Begin Li's Main Blog Page Area -->
            <div class="container-fluid py-5 my-5">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Blog Sidebar Area -->
                        <div class="col-lg-3 ">
                            <div class="container p-3 my-3 border">
                                <div class="col-md-12">
                                    <div class="col-md-12 py-2 my-2">
                                        <form action="{{ route('news.search') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <div class="input-group-append">
                                                  <button class="btn btn-dark" type="submit" ><i class="fas fa-search"></i></button>
                                                </div>
                                              </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-12 py-2 my-2">
                                    <h4 class="title-left">Categories</h4>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($kategori as $item)
                                            <li class="list-group-item"><a href="{{ route('news.kategori', ['uid' => $item->uid]) }}">{{ $item->nama_kategori }}</a></li>
                                        @endforeach


                                    </ul>
                                </div>
                                <div class="col-12 py-2 my-2">
                                    <h4 class="li-blog-sidebar-title">Blog Archives</h4>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($archives as $archive)
                                        <li class="list-group-item">

                                            <a href="{{ route('news.archive', ['date' => $archive->month_year]) }}">
                                                {{ $archive->month_year }} ({{ $archive->count }})
                                            </a>
                                        </li>

                                        @endforeach

                                    </ul>
                                </div>
                                <div class="col-12 py-2 my-2">
                                    <h4 class="li-blog-sidebar-title">Download</h4>

                                    @foreach($download as $itemdownload)
                                    <div class="list-group-item">
                                        <div class="list-group-item">
                                            <a href="blog-details-left-sidebar.html">
                                                <img class="img-full" src="{{ asset('asset/file/file.jpg') }}" alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="li-recent-post-des">
                                            <span><a href="{{asset('file/'.$itemdownload->file)}}">{{ $itemdownload->nama_download  }}</a></span>
                                            <span class="li-post-date">{{ $itemdownload->tanggal_post  }}</span>
                                        </div>
                                    </div>
                                    @endforeach

                                     <a href="{{ route('download') }}">Lihat Selengkapnya</a>
                                </div>
                                <div class="col-12 py-2 my-2" style="padding-top: 20px">
                                    <h4 class="li-blog-sidebar-title">Tags</h4>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($tag as $item_tag)
                                            <li class="list-group-item"><a href="{{ route('news.tag', ['id' => $item_tag->nama_tag]) }}">{{ $item_tag->nama_tag }}</a></li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Blog Sidebar Area End Here -->
                        <!-- Begin Li's Main Content Area -->




                        <div class="col-lg-9 order-lg-2 order-1">
                            <div class="row li-main-content">
                                <div class="col-lg-12">

{{--  --}}

<div class="container-fluid py-2 my-2">
    <div class="container py-2">
        <div class="row g-5">
            <div class="col-lg-12 col-md-12 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                <h5 class="text-primary">{{$beritas->tanggal_post}}</h5>
                <h1 class="mb-4">{{ $beritas->judul}}</h1>
                <div class="col-lg-12 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ asset('storage/gambar/'.$beritas->gambar) }}" class="img-fluid w-80 rounded" alt="" style="margin-bottom: 25%;">
                        <!-- <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="img/2019-01-17.jpg" class="img-fluid w-100 rounded" alt="">
                        </div> -->
                    </div>
                </div>

                {!! $beritas->isi !!}
                {{-- <p class="mb-4">Pellentesque aliquam dolor eget urna ultricies tincidunt. Nam volutpat libero sit amet leo cursus, ac viverra eros tristique. Morbi quis quam mi. Cras vel gravida eros. Proin scelerisque quam nec elementum viverra. Suspendisse viverra hendrerit diam in tempus.</p> --}}
                {{-- <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a> --}}
            </div>


        </div>
    </div>
</div>

{{--  --}}


                                </div>


                                <div class="d-flex justify-content-center">
                                    {!! $download->links('pagination::bootstrap-5') !!}
                                </div>

                            </div>
                        </div>

                        <!-- Li's Main Content Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Main Blog Page Area End Here -->


@endsection