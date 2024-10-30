    <!-- Footer Start -->
    <div class="container-fluid footer bg-dark wow fadeIn shadow" data-wow-delay=".3s">
        <div class="container pt-5 pb-4">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <a href="index.html" >
                        <h1 class="text-white fw-bold d-block size_font " style="text-align: left;">SMKN 1<span class="text-secondary"> Sumedang</span> </h1>
                    </a>
                    <p class="mt-4 text-light">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta facere
                        delectus qui placeat inventore consectetur repellendus optio debitis.</p>
                        
                    <div class="d-flex hightech-link">
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                                class="fab fa-facebook-f text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                                class="fab fa-twitter text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-2"><i
                                class="fab fa-instagram text-primary"></i></a>
                        <a href="" class="btn-light nav-fill btn btn-square rounded-circle me-0"><i
                                class="fab fa-linkedin-in text-primary"></i></a>
                    </div>
                    
                </div>
                <div class="col-lg-5 col-md-6">
                    <a href="#" class="h3 text-secondary">Kompetensi Keahlian</a>
                    <div class="mt-4 d-flex flex-column short-link align_itm">
                        @foreach ($kompetensinav as $kompfooter)
                            
                        
                        <a href="" class="mb-2 text-white">
                            <i class="fas fa-angle-right text-secondary me-2"></i>
                            {{$kompfooter->nama_kompetensi}}
                            </a>

                            @endforeach

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Link Terkait</a>
                    <div class="mt-4 d-flex flex-column help-link align_itm">
                        <a href="https://guru.kemdikbud.go.id/" class="mb-2 text-white"><i
                                class="fas fa-angle-right text-secondary me-2"></i>Merdeka Mengajar</a>
                        <a href="https://paspor-gtk.simpkb.id/casgpo/login?service=https%3A%2F%2Fgtk.belajar.kemdikbud.go.id%2Fauth%2Flogin"
                            class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>SIMPKB</a>
                        <a href="https://sso.datadik.kemdikbud.go.id/app/4031C604-124C-4057-8631-99E0152C4C70"
                            class="mb-2 text-white"><i class="fas fa-angle-right text-secondary me-2"></i>SSO
                            Datadik</a>

                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <a href="#" class="h3 text-secondary">Kontak Kami</a>
                    <div class="text-white mt-4 d-flex flex-column contact-link align_itm">
                        <a href="#" class="pb-3 text-light border-bottom border-primary "><i
                                class="fas fa-map-marker-alt text-secondary me-2"></i> Jl. Mayor Abdurachman no.209 Sumedang</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i
                                class="fas fa-phone-alt text-secondary me-2"></i> (0261)202056</a>
                        <a href="#" class="py-3 text-light border-bottom border-primary"><i
                                class="fas fa-envelope text-secondary me-2"></i> smkn1smd@gmail.com</a>
                    </div>
                </div> --}}
            </div>
            <hr class="text-light mt-5 mb-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <span class="text-light"><a href="#" class="text-secondary"><i
                                class="fas fa-copyright text-secondary me-2"></i>smkn1sumedang.sch.id</a>, All right
                        reserved.</span>
                </div>
                <div class="col-md-6 text-center text-md-end">

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->