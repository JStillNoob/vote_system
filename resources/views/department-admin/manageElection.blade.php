@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('department-admin.sidebar')
@include('department-admin.modals.addPosition')


<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid " style="margin-right: 250px;">
        <p class="navbar-brand" href="#" status='disable'>Manage Election:{{$elections->title}}</p>
    </div>
</nav>

<div class="container" style="margin-top: 100px; margin-left: 250px;">
    <div class="row">
        <!-- Card 1 (Add User Type) -->
        <div class="col-md-4 mb-4">
            <div class="card ">
                <div class="card-header align-items-center d-flex justify-content-between">
                    <h5>Election Candidates</h5>
                    <button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addPositionModal" >
                        <i class="fas fa-plus me-1"></i>Add position
                    </button>
                </div>
                <div class="card-body">
                        <div class="mb-3">
                            @foreach($elections->election_positions as $electionPosition)
                            <div>
                                Position Title: {{ $electionPosition->position->title }}
            
                            </div>
                        @endforeach
                        
                            
                           
                            
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
       

        <!-- Card 2 (User Type List) -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Candidate</h5>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
