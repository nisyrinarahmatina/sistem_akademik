<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Jadwal</title>
    
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
                    
                    <a class="nav-link" href="{{ url('/dashboardadmin') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                        Dashboard
                    </a>
                    <!--input jadwal-->
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseJadwal"
                        aria-expanded="false" aria-controls="collapseJadwal">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-week"></i></i></div>
                        Input Jadwal
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseJadwal" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ url('/inputjadwalguru')}}">Jadwal Guru</a>
                            <a class="nav-link" href="{{ url('/inputjadwalmurid')}}">Jadwal Murid</a>
                        </nav>
                    </div>
                    <!--input nilai-->
                    <a class="nav-link" href="{{ url('/inputnilai') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-file-import"></i></div> 
                        Input Nilai
                    </a>

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
            <h1 class="mt-4 mb-5">Edit Jadwal</h1>
            <form action="{{ route('jadwal.update', ['id' => $jadwal->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="{{ old('nama_guru', $jadwal->nama_guru) }}" required>
                </div>


                <div class="mb-4">
                    <label for="nama_guru" class="form-label">Mata Pelajaran </label>
                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" required>
                </div>

                <div class="mb-4">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $jadwal->kelas) }}" required>
                </div>

                <div class="mb-4">
                    <label for="hari" class="form-label">Hari</label>
                    <select class="form-control" id="hari" name="hari" required>
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jumat">Jumat</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                    <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai', $jadwal->waktu_mulai) }}" required>
                </div>

                <div class="mb-4">
                    <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                    <input type="time" class="form-control" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai', $jadwal->waktu_selesai) }}"required>
                </div>

                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                <a href="{{ route('jadwal.index') }}" class="btn btn-secondary mb-3">Batal</a>
            </form>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
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
