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


<div class="container-fluid blog py-5 mb-5">
    <div class="container">
    <div class="row g-5 justify-content-center">

        @foreach ($beritas as $item)
                
           
        <div class="col-lg-6 col-xl-6 wow fadeIn" data-wow-delay=".3s">
            <div class="blog-item position-relative bg-light rounded">
                <img src="{{ asset('storage/gambar/'.$item->gambar) }}" class="img-fluid w-100 rounded-top" alt="">
                <span class="position-absolute px-4 py-3 bg-primary text-white rounded "
                                style="top: -28px; right: 0px; width:100%;border-radius:0% !important;text-align:center">{{ $item->judul}}</span>
                <div class="blog-btn d-flex justify-content-between position-relative px-3"
                    style="margin-top: -75px;">
                    <div class="blog-icon btn btn-secondary px-3 rounded-pill my-auto">
                        <a href="{{route('news.detail',['uid'=>$item->uid])}}" class="btn text-white">Read More</a>
                    </div>
                    <div class="blog-btn-icon btn btn-secondary px-4 py-3 rounded-pill ">
                        <div class="blog-icon-1">
                            <p class="text-white px-2">Share<i class="fa fa-arrow-right ms-3"></i></p>
                        </div>
                        <div class="blog-icon-2">
                            <a href="" class="btn me-1"><i class="fab fa-facebook-f text-white"></i></a>
                            <a href="" class="btn me-1"><i class="fab fa-twitter text-white"></i></a>
                            <a href="" class="btn me-1"><i class="fab fa-instagram text-white"></i></a>
                        </div>
                    </div>
                </div>
                <div class="blog-content text-center position-relative px-3" style="margin-top: -25px;">
                    <img src="img/admin.jpg" class="img-fluid rounded-circle border border-4 border-white mb-3"
                        alt="">
                    <h5 class="">By {{ $item->name}}</h5>
                    <span class="text-secondary">{{ $item->tanggal_post}}</span>
                    <p class="py-2">{{ Str::limit(strip_tags($item->isi, 100)) }}</p>
                </div>
                <div
                    class="blog-coment d-flex justify-content-between px-4 py-2 border bg-primary rounded-bottom">
                    <a href="" class="text-white"><small><i class="fas fa-share me-2 text-secondary"></i>5324
                            Share</small></a>
                    <a href="" class="text-white"><small><i class="fa fa-comments me-2 text-secondary"></i>5
                            Comments</small></a>
                </div>
            </div>
        </div>
        @endforeach


   
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
