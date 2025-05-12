@vite(['resources/css/app.css', 'resources/css/department-admin.css', 'resources/js/app.js'])

@include('voter.sidebar')

<!-- DataTables & Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<!-- Page-specific Styles -->
<style>
    li a.active-elections,
    li a:hover,
    .logout-button:hover {
        background-color: #ffffff;
        color: #1A73E8;
    }

    .row {
        margin-top: 10px;
    }

    .text {
        margin-top: 5px;
        font-weight: bold;
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
</style>

<!-- Navbar -->
<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid" style="margin-right: 250px;">
        <p class="navbar-brand">Manage Election</p>
    </div>
</nav>

<!-- Main Container -->
<div class="container-fluid mt-5" style="margin-left: 250px; padding-top: 70px;">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="mb-0">Election List</h3>
                </div>
                <div class="col-md-6 text-end">
                    <!-- Optional buttons or filters can go here -->
                </div>
            </div>
        </div>

        <div class="card-body">
            <table id="UsersTable" class="table table-bordered">
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
                    @foreach ($elections as $election)
                        <tr>
                            <td>{{ $election->title ?? 'N/A' }}</td>
                            <td>{{ $election->start_date ?? 'N/A' }}</td>
                            <td>{{ $election->end_date ?? 'N/A' }}</td>
                            <td>{{ $election->department->department_name ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('vote-election', $election->election_id) }}" class="btn btn-info btn-sm">Vote</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function () {
        $('#UsersTable').DataTable({
            responsive: true
        });
    });
</script>