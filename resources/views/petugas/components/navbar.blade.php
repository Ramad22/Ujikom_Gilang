
    <nav class="nabvar position-sticky top-0 bg-white shadow-lg mb-3">
        <div class="d-flex justify-content-between align-items-center w-100">
            <i onclick="hide()" class="fa fa-bars ms-2 my-3"></i>
          <div class="dropdown open">
            <a
                style="text-decoration: none;"
                class="dropdown-toggle text-secondary me-4"
                type=""
                id="triggerId"
                data-bs-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
            >
                Petugas
            </a>
            <div class="dropdown-menu" aria-labelledby="triggerId">
                <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                <a class="dropdown-item" href="petugas.profile">Profile</a>
            </div>
          </div>

    </nav>

    <script>
        function hide(){
            document.getElementById('sidebar').classList.toggle('d-none');
        }
        </script>
