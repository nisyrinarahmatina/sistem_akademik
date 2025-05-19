<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fa-solid fa-bars"></i>
    </button>

    <a class="navbar-brand ps-3" href="#">Sistem Akademik</a>

    <div class="ms-auto text-white pe-3">
        Welcome, 
        <strong>{{ Auth::user()->nama }} ({{ Auth::user()->role }})</strong>
    </div>

</nav>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let sidebarToggle = document.getElementById("sidebarToggle");
        let body = document.body;

        sidebarToggle.addEventListener("click", function (event) {
            event.preventDefault();
            body.classList.toggle("sb-sidenav-toggled");
        });
    });
</script>

