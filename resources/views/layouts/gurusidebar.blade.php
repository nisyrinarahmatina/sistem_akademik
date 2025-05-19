<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- dashboard -->
                    <a class="nav-link" href="{{ url('/dashboardguru') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <!--jadwal ngajar-->
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{ url('/jadwalmengajar') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Jadwal Mengajar
                    </a>
                    <!--rekap nilai-->
                    <a class="nav-link" href="{{ url('/rekapnilai') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                        Rekap Nilai Murid
                    </a>

                    <!--presensi-->
                    <a class="nav-link" href="{{ url('/presensimurid') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user large"></i></div>
                        Presensi Murid
                    </a>
                    <!--logout-->
                    <a class="nav-link" href="{{ url('/') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket large"></i></div>
                        Logout
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>