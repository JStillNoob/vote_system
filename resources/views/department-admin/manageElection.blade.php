@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('department-admin.sidebar')
@include('department-admin.modals.addPosition')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid " style="margin-right: 250px;">
        <p class="navbar-brand" href="#" status='disable'>Manage Election:{{$elections->title}}</p>
    </div>
</nav>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <div id="approvalToast" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 100px; margin-left: 250px;">
    <div class="row">
        <!-- Card 1 (Add User Type) -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Election Candidates</h5>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                        <i class="fas fa-plus me-1"></i> Add Position
                    </button>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('candidates.byPosition') }}" method="GET">
                        @foreach($elections->election_positions as $electionPosition)
                            <button 
                                type="submit" 
                                name="election_position_id" 
                                value="{{ $electionPosition->ElectionPosition_id  }}" 
                                class="btn btn-outline-primary w-100 mb-2">
                                {{ $electionPosition->position->title }}
                            </button>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
       

        <!-- Card 2 (User Type List) -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Candidates</h5>
                </div>
                <div class="card-body">
                    @if(isset($candidates))
                        @if($candidates->isEmpty())
                            <div class="alert alert-info">
                                No candidates found for the selected position.
                            </div>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Bio</th>
                                        <th>Status</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($candidates as $candidate)
                                        <tr>
                                            <td>{{ $candidate->user->FirstName }} {{ $candidate->user->MiddleName }} {{ $candidate->user->LastName }}</td>
                                            <td>{{ $candidate->bio }}</td>
                                            <td>{{ $candidate->is_approve ? 'Approved' : 'Pending' }}</td>
                                            <td>
                                                @if(!$candidate->is_approve)
                                                    <form action="{{ route('candidates.approve', $candidate->candidate_id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                    </form>
                                                @endif
                                                @if($candidate->is_approve)
                                                    <form action="{{ route('candidates.disapprove', $candidate->candidate_id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-danger btn-sm">Disapprove</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @else
                        <div class="alert alert-secondary">
                            Select a position to view its candidates.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@if(session('success'))
<script>
    window.addEventListener('load', function () {
        var toastEl = document.getElementById('approvalToast');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>
@endif