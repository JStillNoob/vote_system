<!DOCTYPE html>
<html>
<head>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    @yield('content')

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    
    <!-- Show success message if it exists -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 3000,
                draggable: true,
                position: 'center'
            });
        });
    </script>
    @endif
</body>
</html>