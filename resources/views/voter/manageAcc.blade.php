@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('voter.sidebar')



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
                            <th>Status</th>
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
                                @php
                                    $now = now(); 
                    
                                    
                                    $start = \Carbon\Carbon::parse($election->start_date);
                                    $end = \Carbon\Carbon::parse($election->end_date);
                                   
                                @endphp
                            
                                @if($now >= $end)
                                Completed
                                @elseif($now >= $start && $now <= $end)
                                 Ongoing
                                @else
                                Upcoming
                                @endif
                            </td>
                            <td>
                                @if($now >= $end || $now >= $start && $now <= $end )
                                    <button class="btn btn-secondary btn-sm" disabled title="This election has already ended">Manage Candidacy</button>
                                @else
                                    <a href="{{ route('manageCandidacy',$election->election_id) }}" class="btn btn-info btn-sm">Manage Candidacy</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
             
                        </tbody>
                    </table>
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
