@vite(['resources/css/app.css', 'resources/js/app.js',  'resources/css/admin.css'])
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@include('voter.sidebar' )

<style>
    li a.active, li a:hover, .logout-button:hover {
        background-color: #ffffff;
        color: #1A73E8;
        
    }
    .department-section{
        background-color: #e3e4e4;
        color: white;
        padding: 10px 5px; 
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(14, 13, 13, 0.2);
        margin-top: 100px;
        text-align: left; 
        position: relative; 
        
    }
    .department-container {
    margin-top: 20;
    padding-top: 0;
}
.add-btn {
    margin-top: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  
}

.add-btn:hover {
    background-color: #0056b3;
}

.text {
    color: #1A253D;
    margin-left: 5px;
    margin-top: 10px;
}

</style>

@auth





<div class="content-wrapper">
<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid" style="margin-right: 250px;">
        <p class="navbar-brand" href="#" status='disable'>Manage Position</p>
    </div>
</nav>
    
<div class="container-fluid department-section">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text">Available Position</h1>
        </div>
     
    </div>
    @if ($election->election_positions->count())
    @foreach ($election->election_positions as $electionPosition)
        <div class="department-container border p-3 mb-3" style="background-color: #F8FAFF; border-color: #D6E4FF;">
            <div class="d-flex justify-content-between align-items-center">
                <h3 style="color: #2C3E50;">
                    {{ $electionPosition->position->title }}    
                </h3>
                <h5>{{ $electionPosition->description }}</h5>
                <div>
                    <button type="button" class="btn btn-primary add-btn" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#applyModal-{{ $electionPosition->ElectionPosition_id }}">
                                <i class="fas fa-plus me-1"></i>Apply
                            </button>
                    </form>
                </div>
            </div>
        </div>

        @include('voter.modals.showApply', ['electionPosition' => $electionPosition])
    @endforeach
@else
    <div class="alert alert-info">
        No positions available for this election.
    </div>
@endif




@endauth