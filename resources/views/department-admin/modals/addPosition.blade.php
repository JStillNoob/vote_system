@vite('app.css', 'app.js')

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



<div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPositionModalLabel">Add Position to Election</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('save', ['election_id' => $elections->election_id]) }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <!-- Position Selection -->
                        <div class="col-md-12">
                            <label for="position_id" class="form-label">Position</label>
                            <select class="form-select" id="position_id" name="position_id" required>
                                <option value="" disabled selected hidden>Select a position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->position_id }}">{{ $position->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Description -->
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                    
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-save">Add Position</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>