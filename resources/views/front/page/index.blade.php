<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Smkn1sumedang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    @include('front.app.css')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <!-- <div class="container-fluid bg-dark py-2 d-none d-md-flex">
            <div class="container">
                <div class="d-flex justify-content-between topbar">
                    <div class="top-info">
                        <small class="me-3 text-white-50"><a href="#"><i class="fas fa-map-marker-alt me-2 text-secondary"></i></a>23 Ranking Street, New York</small>
                        <small class="me-3 text-white-50"><a href="#"><i class="fas fa-envelope me-2 text-secondary"></i></a>Email@Example.com</small>
                    </div>
                    <div id="note" class="text-secondary d-none d-xl-flex"><small>Note : We help you to Grow your Business</small></div>
                    <div class="top-link">
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-twitter text-primary"></i></a>
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
                        <a href="" class="bg-light nav-fill btn btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in text-primary"></i></a>
                    </div>
                </div>
            </div>
        </div> -->
    <!-- Topbar End -->

@include('front.app.navbar')

    <!-- Carousel Start -->
    <div class="container-fluid px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               
                <?php $no_berita=0; ?>
                @foreach ($berita as $slideberita)
                <div class="carousel-item <?php if($no_berita==1){ echo'active';} $no_berita++;?>">
                    <img src="{{ asset('storage/background/' . $slideberita->background) }}" class="img-fluid" alt="First slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">{{ $slideberita->tanggal_post }}</h6>
                            <h2 class="text-white display-1 mb-4 animated fadeInRight" style="font-size: 3vmax">{{ $slideberita->judul }}
                            </h2>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">{{ Str::limit(strip_tags($slideberita->isi), 100) }}</p>
                            <a href="{{route('news.detail',['uid'=>$slideberita->uid])}}" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read
                                    More</button></a>
                            {{-- <a href="" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact
                                    Us</button></a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
{{-- 
                <div class="carousel-item">
                    <img src="img/carousel-2.jpg" class="img-fluid" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="container carousel-content">
                            <h6 class="text-secondary h4 animated fadeInUp">Best IT Solutions</h6>
                            <h1 class="text-white display-1 mb-4 animated fadeInLeft">Quality Digital Services You
                                Really Need!</h1>
                            <p class="mb-4 text-white fs-5 animated fadeInDown">Lorem ipsum dolor sit amet elit. Sed
                                efficitur quis purus ut interdum. Pellentesque aliquam dolor eget urna ultricies
                                tincidunt.</p>
                            <a href="" class="me-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn1 animated fadeInLeft">Read
                                    More</button></a>
                            <a href="" class="ms-2"><button type="button"
                                    class="px-4 py-sm-3 px-sm-5 btn btn-primary rounded-pill carousel-content-btn2 animated fadeInRight">Contact
                                    Us</button></a>
                        </div>
                    </div>
                </div>
             --}}
            
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <style>

        .cardheader{
            border: 1px solid rgb(202, 202, 202);
            border-radius: 30px;
            background:white;
            padding: 5px;
            box-shadow: 1px 1px rgb(42, 140, 253);
            margin: 10px;

        }

    </style>

    <!-- Fact Start -->
    <div class="container-fluid bg-secondary py-5 ">
        <div class="container">
            <div class="row center">
                <div class="col-lg-3 wow fadeIn cardheader" data-wow-delay=".1s">
                    <div class="d-flex counter center">
                        <a href="">
                            <h5 class="text-info mt-1" style="line-height: 0px;"><i class="fa fa-users fa-2x mb-4 "></i></h5>
                            <h5 class="text-info mt-1">Direktori Siswa</h5>
                        </a>

                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn cardheader" data-wow-delay=".3s">
                    <div class="d-flex counter center">
                        <a href="">
                            <h5 class="text-info mt-1"><i class="fa fa-user fa-2x mb-4 "></i></h5>
                            <h5 class="text-info mt-1">Direktori Guru</h5>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn cardheader" data-wow-delay=".5s">
                    <div class="d-flex counter center">
                        <a href="">
                            <h5 class="text-info mt-1"><i class="fa fa-file fa-2x mb-4 "></i></h5>
                            <h5 class="text-info mt-1">PPDB</h5>
                        </a>
                    </div>
                </div>
                <!-- <div class="col-lg-3 wow fadeIn" data-wow-delay=".7s">
                    <div class="d-flex counter">
                        <h1 class="me-3 text-primary counter-value">5</h1>
                        <h5 class="text-white mt-1">Stars reviews given by satisfied clients</h5>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- About Start -->
    <div class="container-fluid py-5 my-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="h-100 position-relative">
                        <img src="{{ asset('storage/' . $profilnav->background) }}" class="img-fluid w-75 rounded" alt="" style="margin-bottom: 25%;">
                        <div class="position-absolute w-75" style="top: 25%; left: 25%;">
                            <img src="{{ asset('storage/' . $profilnav->gambargedung) }}" class="img-fluid w-100 rounded" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                    <h1 class="text-primary"> <span class="txtorange">Tentang </span>SMKN 1 Sumedang </h1>
                    <h1 class="mb-4"></h1>
                    <p>{{$profilnav->deskripsi}}</p>
                    
                    <a href="" class="btn btn-secondary rounded-pill px-5 py-3 text-white">More Details</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <div class="container-fluid services py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Kompetensi Keahlian</h5>
                <h1> SMKN 1 Sumedang</h1>
            </div>
            <div class="row g-5 services-inner">

                @foreach ($kompetensi as $kompdata)
                    
                
 
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="services-item bg-light">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                {{-- <i class="fa fa-code fa-7x mb-4 text-primary"></i> --}}
                                <img src="{{ asset('storage/' . $kompdata->logo) }}" alt="" class=" img-thumbnail " style="height: 10rem !important">
                                <h4 class="mb-3 hov" style="padding-top: .9rem">{{ $kompdata->singkatan}}</h4>
                                <p class="mb-4">{{ $kompdata->nama_kompetensi}}</p>
                                <a href="{{route('kompetensi',['uid'=>$kompdata->uid])}}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Services End -->

    <div class="container-fluid blog py-5 mb-5 background_img" style="padding: 0px !important;">
        <div class="bg-transparent_sambutan">
            <div class="container ">
                <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                    <h5 class="txtorange">Sambutan Kepala Sekolah</h5>
                    <!-- <h1>SMKN 1 SUMEDANG</h1> -->
                    <img src="img/admin.jpg" class="img-fluid rounded-circle border border-4 border-white mb-3" alt="">
                    <p class="py-2">Lorem ipsum dolor sit amet elit. Sed efficitur quis purus ut interdum.
                        Aliquam dolor eget urna ultricies tincidunt libero sit amet</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Blog Start -->
    <div class="container-fluid blog py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Berita Kami</h5>
                <h1>Berita / Informasi Terbaru</h1>
            </div>
            <div class="row g-5 justify-content-center">
                @foreach ($berita as $item)
                
           
                <div class="col-lg-6 col-xl-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="blog-item position-relative bg-light rounded">
                        <img src="{{ asset('storage/gambar/' . $item->gambar) }}" class="img-fluid w-100 rounded-top" alt="">
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
    <!-- Blog End -->





    <!-- Project Start -->
    <div class="container-fluid project py-5 mb-5">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Galeri</h5>
                <h1>Foto Kegiatan SMKN 1 Sumedang</h1>
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


    <!-- Team Start -->
    <div class="container-fluid py-5 mb-5 team">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Wakil Kepala Sekolah </h5>
                <!-- <h1>Meet our expert Team</h1> -->
            </div>
            <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-1.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-2.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-3.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="img/team-4.jpg" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">Full Name</h4>
                                <p class="m-0">Designation</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-instagram"></i></a>
                                <a class="btn btn-square btn-secondary text-white rounded-circle m-1" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->



    <!-- Contact Start -->
    <div class="container-fluid py-5 mb-5 ">
        <div class="container">
            {{-- <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h5 class="text-primary">Get In Touch</h5>
                <h1 class="mb-3">Contact for any query</h1>
                <p class="mb-2">The contact form is currently inactive. Get a functional and working contact form with
                    Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a
                        href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
            </div> --}}
            <div class="contact-detail position-relative p-5">
                <div class="row g-5 mb-5 justify-content-center">
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Alamat</h4>
                                <a href="https://maps.app.goo.gl/reSLYg4r9f15aEPQ7" target="_blank" class="h5">Jl.Mayor Abdurachman No.209 Sumedang</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-phone text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Hubungi Kami</h4>
                                <a class="h5" href="tel:+0123456789" target="_blank">(0261)202056</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 wow fadeIn" data-wow-delay=".7s">
                        <div class="d-flex bg-light p-3 rounded">
                            <div class="flex-shrink-0 btn-square bg-secondary rounded-circle"
                                style="width: 64px; height: 64px;">
                                <i class="fa fa-envelope text-white"></i>
                            </div>
                            <div class="ms-3">
                                <h4 class="text-primary">Email</h4>
                                <a class="h5" href="mailto:smkn1smd@gmail.com" target="_blank">smkn1smd@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <div class="p-5 h-100 rounded contact-map">
                            <div id="map" style="height: 400px; width: 100%;z-index:1 !important"  class="rounded w-100 h-100"></div>
                            {{-- <iframe class="rounded w-100 h-100"
                                
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <div class="p-5 rounded contact-form">
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Your Name">
                            </div>
                            <div class="mb-4">
                                <input type="email" class="form-control border-0 py-3" placeholder="Your Email">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border-0 py-3" placeholder="Project">
                            </div>
                            <div class="mb-4">
                                <textarea class="w-100 form-control border-0 py-3" rows="6" cols="10"
                                    placeholder="Message"></textarea>
                            </div>
                            <div class="text-start">
                                <button class="btn bg-default  py-3 px-5 bgtombol" type="button">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-square rounded-circle back-to-top"><i
            class="fa fa-arrow-up text-white"></i></a>


</body>
@include('front.app.footer')
@include('front.app.js')
</html>