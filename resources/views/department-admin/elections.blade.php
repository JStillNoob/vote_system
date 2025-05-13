@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@include('department-admin.sidebar')

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>



<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">


@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('department-admin.sidebar')

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<!-- Custom Style -->
<style>
    li a.active-elections, li a:hover, .logout-button:hover {
        background-color: #ffffff;
        color: #1A73E8;
    }

    .row {
        margin-top: 10px;
    }

    .text {
        margin-top: 5px;
        font: bold;
    }

    .dataTables_filter input {
        border-radius: 20px !important;
        border: 1px solid #ccc;
        padding: 8px 15px;
        outline: none;
        width: 200px;
        transition: all 0.3s ease;
        margin-bottom: 10px;
    }

    /* Clean Table Styles */
    #UsersTable {
        border-collapse: separate;
        border-spacing: 0 10px;
        width: 100%;
    }

    #UsersTable thead th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
        padding: 12px 15px;
        font-weight: 600;
        color: #343a40;
    }

    #UsersTable tbody tr {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    #UsersTable tbody td {
        padding: 12px 15px;
        vertical-align: middle;
        border-top: none;
        background-color: #ffffff;
    }

    #UsersTable tbody tr td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    }

    #UsersTable tbody tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    #UsersTable .btn-sm {
        padding: 5px 10px;
        border-radius: 6px;
    }
</style>
    

</style>
@include('department-admin.modals.addElection')

<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid" style="margin-right: 250px;">
        <p class="navbar-brand" href="#" status='disable'>Manage Election</p>
    </div>

</nav>

<div class="container-fluid mt-5" style="margin-left: 250px; padding-top: 70px;">
    <div class="card ">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-0">Election List</h3>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addElectionModal" >
                            <i class="fas fa-plus me-1"></i>Create Election
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
         
           
            <table id="UsersTable" class="table table-bordered ">
                <thead>
   
                    <tr>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $elections as $election)
                    <tr>
                        <td>{{$election->title ?? 'N/A'}}</td>
                        <td>{{$election->start_date ?? 'N/A'}}</td>
                        <td>{{$election->end_date ?? 'N/A'}}</td>
                        <td>{{$election->department->department_name ?? 'N/A'}}</td>
                        <td>
                            <a href="{{ route('manage-election', $election->election_id) }}" class="btn btn-info btn-sm">Manage</a>
                            <a href="{{ route('view-results', $election->election_id) }}" class="btn btn-success btn-sm mb-1">View Results</a>
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                           
                        </td>
                    </tr>
                    @endforeach
         
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#UsersTable').DataTable(); 
    });

    
</script>

@if (session('error') || $errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var modal = new bootstrap.Modal(document.getElementById('addElectionModal'));
            modal.show();
        });
    </script>
@endif


@if(session('success'))
<script>
    window.addEventListener('load', function () {
        var toastEl = document.getElementById('approvalToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>
@endif

@extends('layout.app') <!-- Assuming you use a layout -->

@section('content')
    <!-- Your page content -->
@endsection

@push('scripts')
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                draggable: true
            });
        });
    </script>
    @endif
@endpush
