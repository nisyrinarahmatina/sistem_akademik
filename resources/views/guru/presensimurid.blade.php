
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Presensi</title>
    
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

    <div class="ms-auto text-white pe-3">
        Selamat datang, 
    </div>
</nav>

<!-- Sidebar -->
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

    <!-- Main Content -->
    <div id="layoutSidenav_content">
    <main>
        <div class="container">
        
        <h2 class="mt-4">Rekap Presensi</h1>
            <form action="{{ url('') }}" method="GET" class="mt-5 mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>
            <div class="card mt-5 mb-5">
            <h5 class="card-header bg-primary text-white text-center">Presensi Murid</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    <tbody>
                        @foreach($presensiData as $key => $data)
                        <tr>
                            <td>{{ $data->user->id ?? '-' }}</td>
                            <td>{{ $data->user->nama ?? '-' }}</td>
                            <td>{{ $data->Tanggal }}</td>
                            <td>{{ $data->Status }}</td>
                            <td>
                                <div>  
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal{{ $data->id }}">
                                        Ubah
                                    </button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    
                </thead>
            </div>
        </div>
    </main>

    

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
