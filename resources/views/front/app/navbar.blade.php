    <!-- Navbar Start -->
    <div class="container-fluid border-navbar">
        <div class="container">
            <nav class="navbar navbar-dark navbar-expand-lg py-0">
                <a href="index.html" class="navbar-brand">
                    <!-- <h1 class="text-white fw-bold d-block">SMKN 1 <span class="text-secondary">Sumedang</span> </h1>
                          -->
                  
                    <img src="{{ asset('storage/' . $profilnav->logo) }}" alt="" width="200vh">
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                    <div class="navbar-nav ms-auto mx-xl-auto p-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active text-secondary">Home</a>
                        <a href="{{route('profil')}}" class="nav-item nav-link ">Profil</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Devisi</a>
                            <div class="dropdown-menu rounded">
                                @foreach ($divisinav as $div)
                                <a href="{{route('divisi',['uid'=>$div->uid])}}" class="dropdown-item">{{$div->nama_divisi}}</a>
                                @endforeach
                                


                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kompetensi</a>
                            <div class="dropdown-menu rounded">
                                @foreach ($kompetensinav as $komp)
                                <a href="{{route('kompetensi',['uid'=>$komp->uid])}}" class="dropdown-item">{{$komp->nama_kompetensi}}</a>
                                @endforeach

                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Berita</a>
                            <div class="dropdown-menu rounded">
                                @foreach ($kategorinav as $kat)
                                <a href="{{route('news.kategori',['uid'=>$kat->uid])}}" class="dropdown-item">{{$kat->nama_kategori}}</a>
                                @endforeach

                            </div>
                        </div>
                        <a href="{{route('gallery')}}" class="nav-item nav-link">Galeri</a>
                        <a href="{{route('gallery')}}" class="nav-item nav-link">Kotak Saran</a>
                        <a href="{{route('download')}}" class="nav-item nav-link">Download</a>
                    </div>
                </div>
                <div class="d-none d-xl-flex flex-shirink-0">

                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->