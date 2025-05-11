@vite(['resources/css/app.css', 'resources/js/app.js'])

<style>
    .modal-header {
        background-color: #1A253D;
        color: white;
    }

    .modal-body h3 {
        margin-top: 15px;
        font-size: 20px;
        color: #1A253D;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .btn-save {
        background-color: #1ABC9C;
        color: white;
    }

    .btn-save:hover {
        background-color: #169f87;
    }
</style>

<div class="modal fade" id="applyModal-{{ $electionPosition->ElectionPosition_id }}" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apply for {{ $electionPosition->position->title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('candidates.store', ['electionPositionId' => $electionPosition->ElectionPosition_id]) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="bio" class="form-label">Biography</label>
                            <textarea class="form-control" id="bio" name="bio" rows="4" required 
                                    placeholder="Explain why you're qualified for this position"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>