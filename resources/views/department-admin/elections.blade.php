@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('department-admin.sidebar')

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>



<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">


<style>
    li a.active-elections, li a:hover, .logout-button:hover {
    background-color: #ffffff;
    color: #1A73E8;
    }
  

    .row{
        margin-top: 10px;
      
    }
    .text{

        margin-top: 5px;
        font: bold;
    }



    .dataTables_filter input {
    border-radius: 20px !important; /* Make it rounded */
    border: 1px solid #ccc;
    padding: 8px 15px;
    outline: none;
    width: 200px;
    transition: all 0.3s ease;
    margin-bottom: 10px;
}
    

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
