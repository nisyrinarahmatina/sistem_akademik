<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pelajaran</title>
    
    <!-- SB Admin CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <style>
        body {
            padding-top: 56px; /* Adjust based on navbar height */
        }

        #content-wrapper {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 250px; /* Default sidebar width */
            padding: 20px; /* Space for content */
        }

        .sb-sidenav-toggled #content-wrapper {
            margin-left: 80px; /* Adjust when sidebar is collapsed */
        }

        @media (max-width: 768px) {
            #content-wrapper {
                margin-left: 80px; /* Smaller margin on mobile */
            }
        }

        #layoutSidenav_content {
            padding-left: 1rem;
            padding-right: 1rem;
            margin-left: 250px; /* Adjust based on sidebar width */
            transition: margin-left 0.3s ease-in-out;
        }

        .sb-sidenav-toggled #layoutSidenav_content {
            margin-left: 80px;
        }
    </style>
</head>
<body class="sb-nav-fixed">

@php
    $user = null;
    $role = null;

    if (Auth::guard('admin')->check()) {
        $user = Auth::guard('admin')->user();
        $role = 'Admin';
    } elseif (Auth::guard('guru')->check()) {
        $user = Auth::guard('guru')->user();
        $role = 'Guru';
    } elseif (Auth::guard('murid')->check()) {
        $user = Auth::guard('murid')->user();
        $role = 'Murid';
    }
@endphp

<!-- Navbar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>

    <a class="navbar-brand ps-3" href="#">Sistem Akademik</a>

</nav>

<!-- Sidebar -->
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

    <!-- Main Content -->
    <div id="layoutSidenav_content">
    <main>
        <div class="container">
            <form action="{{ url('/jadwalpelajaran') }}" method="GET" class="mt-5 mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama guru, mata pelajaran, atau kelas..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>
            <div class="card mt-3">
                <h5 class="card-header bg-primary text-white text-center">Jadwal Murid</h5>
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Guru</th>
                                <th>Mata Pelajaran</th>
                                <th>Kelas</th>
                                <th>Hari</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwal as $key => $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_murid }}</td>
                                <td>{{ $data->nama_mapel }}</td>
                                <td>{{ $data->Kelas }}</td>
                                <td>{{ $data->Hari }}</td>
                                <td>{{ $data->waktu_mulai }}</td>
                                <td>{{ $data->waktu_selesai }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">@lang('Jadwal tidak tersedia.')</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    </div>

<!-- SB Admin JS -->
<script src="{{ asset('js/sb-admin.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let navLinks = document.querySelectorAll(".nav-link.collapsed");

        navLinks.forEach(link => {
            link.addEventListener("click", function () {
                let arrow = this.querySelector(".sb-sidenav-collapse-arrow i");

                if (this.classList.contains("collapsed")) {
                    arrow.classList.remove("fa-angle-down");
                    arrow.classList.add("fa-angle-right");
                } else {
                    arrow.classList.remove("fa-angle-right");
                    arrow.classList.add("fa-angle-down");
                }
            });
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.getElementById('sidebarToggle').addEventListener('click', function () {
    document.body.classList.toggle('sb-sidenav-toggled');
});
document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('sidebar-toggle') === 'true') {
            document.body.classList.add('sb-sidenav-toggled');
        }
});
</script>


</body>
</html>
