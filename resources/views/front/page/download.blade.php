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

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="li-product-remove">No</th>
                                                    <th class="li-product-thumbnail">File</th>
                                                    <th class="li-product-thumbnail">#</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1;?>
                                                @foreach ($download as $item_downloaddetail)


                                                <tr>
                                                    <td class="li-product-remove"><a href="{{ asset('file/'.$item_downloaddetail->file ) }}"> <?php echo $no++; ?></a></td>
                                                    <td class="li-product-thumbnail"><a href="{{ asset('file/'.$item_downloaddetail->file ) }}">{{ $item_downloaddetail->nama_download }}</a>
                                                    <p>{{ $item_downloaddetail->tanggal_post }}</p></td>
                                                    <td class="li-product-add-cart"><a href="{{ asset('file/'.$item_downloaddetail->file ) }}">Download</a></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>




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
