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

<div class="modal fade" id="addElectionModal" tabindex="-1" aria-labelledby="addElectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addElectionModalLabel">Create New Election</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('create-election') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <!-- Title -->
                        <div class="col-md-12">
                            <label for="title" class="form-label">Election Title*</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        
                        <!-- Dates -->
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date*</label>
                            <input type="datetime-local" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date*</label>
                            <input type="datetime-local" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        
                        <!-- Department -->
                        <div class="col-md-12">
                            <label for="department_id" class="form-label">Department*</label>
                            <select class="form-control" id="department_id" name="department_id" required>
                                <option value="" selected disabled>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="modal-footer mt-4">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-save">Create Election</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>