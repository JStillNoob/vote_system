@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('voter.sidebar')



    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    
    
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    
    <!-- DataTables Buttons CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.min.css">
    
    
    <div class="container-fluid mt-5" style="margin-left: 250px; padding-top: 70px;">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">{{ $election->title ?? 'Election Voting Form' }}</h3>
        </div>

        <div class="card-body">
            @if ($election && $election->election_positions)
                <form method="POST" action="{{ route('submit-vote') }}">
                    @csrf

                    <div id="position-steps">
                        @foreach ($election->election_positions as $index => $position)
                            <div class="position-step" style="{{ $index === 0 ? '' : 'display:none;' }}">
                                <h5>{{ $position->position->title }}</h5>

                                @if ($position->candidates->count() > 0)
                                    @foreach ($position->candidates as $candidate)
                                        <div class="form-check">
                                            <input 
                                                class="form-check-input" 
                                                type="radio" 
                                                name="votes[{{ $position->ElectionPosition_id }}]" 
                                                value="{{ $candidate->candidate_id }}" 
                                                id="candidate-{{ $candidate->candidate_id }}"
                                                required
                                            >
                                            <label class="form-check-label" for="candidate-{{ $candidate->user->id }}">
                                                {{ $candidate->user->FirstName }}  {{ $candidate->user->MiddleName }}  {{ $candidate->user->LastName }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">No candidates available for this position.</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary" id="prevBtn" disabled>Previous</button>
                        <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
                        <button type="submit" class="btn btn-success" id="submitBtn" style="display: none;">Submit Vote</button>
                    </div>
                </form>
            @else
                <p>No election or positions found.</p>
            @endif
        </div>
    </div>
</div>

<script>
    let currentStep = 0;
    const steps = document.querySelectorAll('.position-step');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    function showStep(index) {
        steps.forEach((step, i) => {
            step.style.display = i === index ? '' : 'none';
        });

        prevBtn.disabled = index === 0;
        nextBtn.style.display = index === steps.length - 1 ? 'none' : '';
        submitBtn.style.display = index === steps.length - 1 ? '' : 'none';
    }

    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    nextBtn.addEventListener('click', () => {
        if (currentStep < steps.length - 1) {
            currentStep++;
            showStep(currentStep);
        }
    });

    // Initialize first step
    showStep(currentStep);
</script>
