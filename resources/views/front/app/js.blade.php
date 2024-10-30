
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('front/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js')}}"></script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Koordinat gedung pertama dan kedua
        const kampusdepan = [-6.837678098202296, 107.92744655218819]; // Ganti dengan koordinat gedung 1
        const kampusbelakang = [-6.836429203368835, 107.9270099656821]; // Ganti dengan koordinat gedung 2
    
        // Membuat peta
        var map = L.map('map').setView(kampusdepan, 14); // Set pandangan awal di salah satu gedung
    
        // Menambahkan tile layer dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.google.com/maps/place/SMK+Negeri+1+Sumedang+(kampus+depan)/@-6.8376515,107.9248502,750m/data=!3m2!1e3!4b1!4m6!3m5!1s0x2e68d135ab91cee5:0xbbf00d892056f010!8m2!3d-6.8376568!4d107.9274251!16s%2Fg%2F1pzq19l_r?entry=ttu&g_ep=EgoyMDI0MTAyMS4xIKXMDSoASAFQAw%3D%3D">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        // Menambahkan marker untuk gedung pertama
        L.marker(kampusdepan).addTo(map)
            .bindPopup('kampus Depan')
            .openPopup();
    
        // Menambahkan marker untuk gedung kedua
        L.marker(kampusbelakang).addTo(map)
            .bindPopup(' Kampus Belakang')
            .openPopup();
    </script>