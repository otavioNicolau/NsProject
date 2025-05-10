<!DOCTYPE html>
<html>

<head>
    <title>Projetos e Tarefas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <span class="h5 text-dark">Olá, {{ Auth::user()->name }}</span>

                <div>
                    <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-sm me-2">
                        <i class="bi bi-person-fill-gear me-1"></i> Atualizar Perfil
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>



    <div class="container mt-4">

        <div aria-live="polite" aria-atomic="true" class="position-fixed top-0 end-0 p-3" style="z-index: 9999">
            @if (session('success'))
            <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
            @endif
        </div>
        @yield('content')

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successToastEl = document.getElementById('successToast');
            const errorToastEl = document.getElementById('errorToast');

            if (successToastEl) {
                const toast = new bootstrap.Toast(successToastEl, {
                    delay: 3000
                });
                toast.show();
            }

            if (errorToastEl) {
                const toast = new bootstrap.Toast(errorToastEl, {
                    delay: 3000
                });
                toast.show();
            }
        });
    </script>
</body>

</html>