<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    
                    <a class="nav-link" href="{{ url('/dashboardmurid') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></i></div>
                        Dashboard
                    </a>
                    <!--input jadwal-->
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{ url('/jadwalpelajaran') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                        Jadwal
                    </a>
                    <!--input nilai-->
                    <a class="nav-link" href="{{ url('/nilai') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-list large"></i></div> 
                        Nilai
                    </a>

                    <a class="nav-link" href="{{ url('/presensi') }}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Presensi
                    </a>

                    <a class="nav-link" href="{{ url('/') }}">   
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-from-bracket"></i></div>  
                    Logout       
                    </a>        
                </div>
            </div>
        </nav>
    </div>
</div>