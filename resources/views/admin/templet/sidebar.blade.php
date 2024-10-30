  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Profil</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('adminprofil.index')}}">
              <i class="bi bi-circle"></i><span>Profil SMKN 1 Sumedang</span>
            </a>
          </li>
          <li>
            <a href="{{route('admindivisis.index')}}">
              <i class="bi bi-circle"></i><span>Divisi</span>
            </a>
          </li>
          <li>
            <a href="{{route('adminkompetensi.index')}}">
              <i class="bi bi-circle"></i><span>Kompetensi</span>
            </a>
          </li>
          <li>
            <a href="{{route('adminsambutan.index')}}">
              <i class="bi bi-circle"></i><span>Sambutan Kepala sekolah</span>
            </a>
          </li>
          <li>
            <a href="{{route('adminpegawai.index')}}">
              <i class="bi bi-circle"></i><span>Tenaga Pendidik/Kependidikan</span>
            </a>
          </li>
          
        
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Berita</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('adminberita.index')}}">
              <i class="bi bi-circle"></i><span>Berita</span>
            </a>
          </li>
          <li>
            <a href="{{ route('adminkategoris.index')}}">
              <i class="bi bi-circle"></i><span>Kategori</span>
            </a>
          </li>
          <li>
            <a href="{{ route('admintags.index')}}">
              <i class="bi bi-circle"></i><span>Tag</span>
            </a>
          </li>

        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Gallery</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('admingallerys.index')}}">
              <i class="bi bi-circle"></i><span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="{{ route('adminalbums.index')}}">
              <i class="bi bi-circle"></i><span>Album</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav --> --}}
{{-- 
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav --> --}}

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('adminusers.index')}}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('suggestions.index')}}">
          <i class="bi bi-mail"></i>
          <span>Kotak Saran</span>
        </a>
      </li><!-- End Profile Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  