<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Empresas')</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    @vite(['resources/css/layout.css', 'public/css/app.css', 'resources/css/survey.css'])
</head>
<body>
    {{-- <div class="d-flex" id="wrapper"> --}}
        <!-- Sidebar -->
        {{-- <div class="bg-light border-right" id="sidebar-wrapper"> --}}
            {{-- <div class="sidebar-heading">Empresas</div> --}}
            {{-- <div class="list-group list-group-flush">
                @foreach($enterprises as $enterprise)
                    <a href="{{ route('enterprises.show', $enterprise) }}" class="list-group-item list-group-item-action bg-light">{{ $enterprise->name }}</a>
                @endforeach
            </div>
        </div> --}}
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        {{-- <div id="page-content-wrapper"> --}}
            {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Bar</button>
            </nav> --}}
            <div class="container-fluid mt-4">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    {{-- </div> --}}
    <!-- /#wrapper -->

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for toggling the sidebar -->
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
</body>
</html>
